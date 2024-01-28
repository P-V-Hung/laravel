<?php

namespace App\Http\Controllers\Accounts;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\Information;
use RealRashid\SweetAlert\Facades\Alert;

class AccountController extends Controller
{
    public function information(){
        $user = Auth::user();
        $user->image = 'storage/'.$user->image;
        $information = Information::where('user_id', auth()->user()->id)->first();
        return view('accounts.account-information',['user' => $user,'information' => $information]);
    }

    public function saveInformation(Request $request){
        $roles = [
            'firstName' => ['required','max:20', 'regex:/^[\pL\s\pP]+$/u'],
            'lastName' => ['required','max:20', 'regex:/^[\pL\s\pP]+$/u'],
            'phone' => ['required','regex:/^(\+?84|0)([3|5|7|8|9])+([0-9]{8})$/'],
            'from' => ['required','max:150'],
            'address' => ['required','max:150'],
            'age' => ['required'],
            'relationStatus' => ['required','max:50', 'regex:/^[\pL\s\pP]+$/u'],
        ];

        $messages = [
            'required' => ':attribute bắt buộc nhập',
            'max' => ':attribute không lớn hơn :max kí tự!',
            'min' => ':attribute không nhỏ hơn :min kí tự!',
            'regex' => ':attribute không hợp lệ!',
            'from.max' => ':attribute không lớn hơn :max kí tự!',
            'address.max' => ':attribute không lớn hơn :max kí tự!',
            'relationStatus.max' => 'Vui lòng không nhập quá :max kí tự',
        ];

        $attributes = [
            'firstName' => 'Tên',
            'lastName' => 'Họ',
            'phone' => 'Số điện thoại',
            'from' => 'Nơi sinh',
            'address' => 'Địa chỉ',
            'age' => 'Tuổi',
            'relationStatus' => 'Tình trạng quan hệ',
        ];


        $validate = Validator::make($request->all(),$roles,$messages,$attributes);
        if($validate->fails()){
            $request->flash();
            return back()->withErrors($validate);
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->store('uploads/images', 'public');
            $imagePath = Auth::user()->image;
            if (($imagePath!=='uploads/images/avatar-user.png') &&Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }
            Auth::user()->update(['image' => $path]);
        }

        $data = [
            'user_id' => auth()->user()->id,
            'first_name' => $request->firstName,
            'last_name' => $request->lastName,
            'birthday' => $request->birthday,
            'phone'  => $request->phone,
            'from' => $request->from,
            'address' => $request->address,
            'age' => $request->age,
            'relation_status' => $request->relationStatus,
            'desc' => trim($request->desc) ?? "",
        ];

        $information = Information::where('user_id', auth()->user()->id)->first();
        if(!empty($information)){
            $information->update($data);
        }else{
            Information::create($data);
        }
        Alert::success('Thông báo','Cập nhật thông tin thành công');
        return redirect(route('account-information'));
    }

    public function authorProfile($id = 0){
        $user = User::find($id);
        $user->image = asset('storage/'.$user->image);
        return view('accounts.profile',['user' => $user]);
    }
}
