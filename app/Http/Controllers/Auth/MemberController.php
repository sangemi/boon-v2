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

    // 아이디 강제 로그인
    public function postAutologin(Request $request)
    {
        $task = array("data" => "로긴x", "result" => "fail");
        /*강제로그인 SK*/
        $current_id = Auth::user()->id;

        // SK 또는 이준호, 곽지영, 김진한16
        if ($current_id == 1 || $current_id == 231 || $current_id == 294 || $current_id == 300 || $current_id == 16) {
            if( Auth::loginUsingId($request->user_id) ){
                Session::put('user', Auth::user());
                $task = array("data" => '로긴성공', "result" => "success");
            }
        }
        return response()->json($task);
    }

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
