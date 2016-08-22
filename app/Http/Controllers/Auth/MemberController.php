<?php

namespace App\Http\Controllers\Auth;

use App\BoonStatus;
use App\Lib\skHelper;
use App\User;
use App\UserInfo;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Laravel\Socialite\Facades\Socialite;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Session;

class MemberController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    |
    */

    // 계정명, 포인트, 탈퇴기능 등
    public function getMypage()
    {
        if(!Auth::check()) {
            Session::put('return_url', '/member/mypage');
            return redirect()->to('/auth/login');
        }
        return view('auth.mypage');
    }


    // 계정명, 포인트, 탈퇴기능 등
    public function getDropout(Request $request, $token = null)
    {
        $email = Auth::user()->email;

        return view('auth.dropout')->with(compact('token', 'email'));

    }
    // 계정명, 포인트, 탈퇴기능 등
    public function postDropout(Request $request)
    {
        // 토큰체크
        // 어려워서..... 지금 못하겠음.ResetsPasswords.php 파일따라 분석해야함

    }
    // 계정명, 포인트, 탈퇴기능 등
    private function postDropoutProcess(Request $request)
    {
        $user = User::find($request->user_id);
        //$user->delete();
    }

}
