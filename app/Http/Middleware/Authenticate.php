<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('auth.login');
    }

    protected function authenticate($request, array $guards)
    {
        if (empty($guards)) {
            $guards = [null];
        }

        foreach ($guards as $guard) {
            if ($this->auth->guard($guard)->check()) {
                $checkDevice = $this->checkDevice($request);
                if($checkDevice){
                    Alert::warning("Thông báo","Tài khoản này đã được đăng nhập ở thiết bị khác!");
                    $this->unauthenticated($request, $guards);
                }
                return $this->auth->shouldUse($guard);
            }
        }

        $this->unauthenticated($request, $guards);
    }

    public function checkDevice($request){
        $sessionId = $request->session()->getId();
        $user = $request->user();
        $last_session_login = $user->last_session_login;
        if($last_session_login !== $sessionId){
            Auth::logout();
            return true;
        }
    }

}
