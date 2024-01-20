<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\AuthenticLogup;
use App\Models\Information;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Mail;
use App\Mail\ForgetPass;


class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }


    public function saveLogin(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        $rememberMe = $request->has('rememberMe');

        if (Auth::attempt($data, $rememberMe)) {
            if (Auth::user()->token !== NULL) {
                $token = rand() . time();
                Auth::user()->update(['token' => $token]);
                $link = route('auth.authentic', ['id' => Auth::user()->id, 'token' => $token]);
                $mail = new AuthenticLogup($link);
                Mail::to(Auth::user()->email, Auth::user()->name)->queue($mail);
                Alert::info("Xác thực", 'Mail đã được gửi! Vui lòng xác thực tài khoản!');
                return $this->out();
            }
            Auth::user()->update(['last_session_login' => session()->getId()]);
            return redirect(route('home'));
        } else {
            Alert::error("Lỗi", 'Thông tin tài khoản không chính xác!');
            $request->flash();
            return back();
        }
    }

    public function logup()
    {
        return view('auth.logup');
    }

    public function saveLogup(Request $request)
    {
        $request->flash();
        if (!$request->has('checkInput')) {
            return back()->with('msg', "Vui lòng đồng ý với điều khoản của chúng tôi!");
        }

        $rules = [
            'name' => ['required', 'min:8', 'max:20', 'regex:/^[\p{L}\d\s\p{P}]+$/u'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:8', 'max:20'],
            'rePassword' => ['required', 'same:password']
        ];

        $message = [
            'unique' => ':attribute đã tồn tại',
            'alpha' => 'Vui lòng nhập đúng tên',
            'required' => ':attribute bắt buộc nhập!',
            'min' => ':attribute phải lớn hơn hoặc bằng :min ký tự',
            'max' => ':attribute phải nhỏ hơn hoặc bằng :max ký tự',
            'email' => ':attribute phải là Email',
            'same' => ':attribute không khớp',
        ];

        $attribute = [
            'name' => 'Tên',
            'email' => 'Email',
            'password' => 'Mật khẩu',
            'rePassword' => 'Mật khẩu'
        ];

        $validation = Validator::make($request->all(), $rules, $message, $attribute);

        if ($validation->fails()) {
            return back()->withErrors($validation);
        }

        $password = Hash::make($request->password);

        $token = rand() . time();

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $password,
            'token' => $token
        ];


        $user = User::create($data);
        Information::create(['user_id' => $user->id]);


        Alert::info('Thông báo', "Mail xác thực đã được gửi! Vui lòng xác thực tại khoản.");


        $link = route('auth.authentic', ['id' => $user->id, 'token' => $token]);
        $mail = new AuthenticLogup($link);
        Mail::to($request->email, $request->name)->queue($mail);

        return redirect(route('auth.login'));
    }

    public function authentic()
    {
        $id = $_GET['id'] ?? null;
        $token = $_GET['token'] ?? null;
        if ($id && $token) {
            $user = User::find($id);
            if (!empty($user) && ($user->token == $token)) {
                $user->token = NULL;
                $user->save();
                Alert::success('Chúc mừng', "Bạn đã xác thực tài khoản thành công!");
            } else {
                Alert::error('Lỗi', 'Xác thực tài khoản không thành công. Mail đã hết hạn!');
            }
        } else {
            Alert::error('Lỗi', 'Thiếu thông tin cần thiết để xác thực tài khoản!');
        }
        return redirect(route('auth.login'));
    }

    public function logout()
    {
        Alert::info("Thông báo", "Đã đăng xuất thành công!");
        return $this->out();
    }

    public function out()
    {
        Auth::logout();
        return redirect(route('auth.login'));
    }

    public function forgot()
    {

        return view('auth.forget');
    }

    public function searchEmail(Request $request)
    {
        if ($request->has('email')) {
            $email = $request->email;
            $rules = [
                'email' => ['required', 'email', 'exists:users,email']
            ];
            $messages = [
                'email.required' => "Vui lòng nhập email",
                'email.email' => 'Email không đúng định dạng!',
                'email.exists' => 'Email không tồn tại. vui lòng kiểm tra lại email'
            ];
            $validate = Validator::make($request->all(), $rules, $messages);

            if ($validate->fails()) {
                return $validate->validate();
            }

            $user = User::where('email', $email)->first();
            if (!$user->image) {
                $user->image = asset("images/pt-1.jpg");
            } else {
                $user->image = asset('storage/' . $user->image);
            }
            return $user;
        }
        Alert::warning('Thông báo', "Vui lòng kiểm tra lại thông tin!");
        return redirect(route('auth.forget'));
    }

    public function sendMailRePass(Request $request)
    {
        if ($request->has('id_user')) {
            $id = $request->id_user;
            $token = rand() . time();
            $user = User::find($id);
            $user->update(['email_token_repass' => $token]);
            $link = route('auth.changePassword', ['id' => $user->id, 'token' => $token]);
            $mail = new ForgetPass($link);
            Mail::to($user->email, $user->name)->queue($mail);
            Alert::info('Thông báo', 'Mail đặt lại mật khẩu đã được gửi về mail của bạn!');
        } else {
            Alert::warning('Thông báo', "Vui lòng kiểm tra lại thông tin!");
        }
        return redirect(route('auth.forget'));
    }

    public function changePassword(Request $request)
    {
        $check = true;
        $id = $_GET['id'] ?? null;
        $token = $_GET['token'] ?? null;
        if ($id && $token) {
            $user = User::find($id);
            if (!empty($user) && ($user->email_token_repass == $token)) {
                $check = false;
            }
        }
        if (!$check) {
            return view('auth.changePassword', ['id' => $id]);
        } else {
            Alert::error('Lỗi', "Lỗi xác thực, vui lòng kiểm tra lại thông tin");
            return redirect(route('auth.login'));
        }
    }

    public function saveChangePassword(Request $request)
    {
        $rules = [
            'password' => ['required', 'min:8', 'max:20'],
            'rePassword' => ['required', 'same:password']
        ];
        $messages = [
            'required' => 'Mật khẩu không hợp lệ',
            'min' => 'Tối thiểu :min kí tự',
            'max' => 'Không quá :max kí tự',
            'same' => 'Mật khẩu không khớp'
        ];

        $validate = Validator::make($request->all(), $rules, $messages);
        if ($validate->fails()) {
            $validate->validate();
        }
        $user = User::find($request->id);
        $password = Hash::make($request->password);
        $user->update(['password' => $password, 'email_token_repass' => NULL]);
        Alert::success('Chúc mừng', "Cập nhật mật khẩu thành công");
        return response()->json([
            'redirect' => route('auth.login')
        ]);
    }

}
