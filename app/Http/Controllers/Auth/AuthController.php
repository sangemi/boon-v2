<?php

namespace App\Http\Controllers\Auth;

use App\BoonStatus;
use App\Lib\skHelper;
use App\User;
use App\UserInfo;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Laravel\Socialite\Facades\Socialite;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';
    //protected $redirectPath = '/adda'; //redirectTo, redirectPath 둘가 있으면 Path우선
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('guest', ['except' => 'getLogout']); //원래 5.2 버전은 except => logout 이었음.

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
        ]); /*confirmed| 삭제함*/
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
        $user_id = $user->id;

        // 회원가입할 때 hasOne인것들은 자동 추가 / SK 추가
        UserInfo::create([
            'user_id' => $user_id
        ]);

        // 최초 500 포인트 공짜
        BoonStatus::create([
            'user_id' => $user_id,
            'boon_point' => 500
        ]);

        Session::flash('message', 'Boon 계정이 생성되었습니다. ');
        Session::flash('tip', '내용증명을 미리 작성해두고, 나중 보관함에서 꺼내어 보낼 수도 있습니다. ');

        /*메일 보내는 방법
        $data['message'] = '김수로님';
        Mail::send('emails.welcome', $data, function($message)
        {
            $message->to('sangemi@daum.net', 'John Smith')->subject('[분쟁제로] 사이트 이용방법');
        });*/

        return $user;
    }



    // 쇼설로긴? // 그냥 하니까 AuthenticatesAndRegistersUsers.php 덮어쓰네..
    public function getLogin()
    {
        /* 로그인전 화면으로 되돌아가기 1단계 */
        $prev_url = parse_url(URL::previous());
        Session::put('return_url', $prev_url['path']);
        //echo $prev_url['path'];
        return view('auth.login');
    }
    /** 덮어씀. trait AuthenticatesUsers의 postLogin()
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
        /* 로그인전 화면으로 되돌아가기 2단계 */
        if(Session::has('return_url'))
            $this->redirectTo = Session::pull('return_url');

        return $this->login($request);
    }



    public function getRegister()
    {
        /* 로그인화면에서 가입버튼 클릭시, 로그인전 화면으로 되돌아가기 1단계 */
        $prev_url = parse_url(URL::previous());
        if(  $prev_url['path'] != '/auth/login' && $prev_url['path'] != '/login' )
            Session::put('return_url', $prev_url['path']);
        //echo $prev_url['path']. '=='. Session::get('return_url');
        return view('auth.register');
    }
    public function postRegister(Request $request)
    {
        /* 로그인전 화면으로 되돌아가기 2단계 */
        if(Session::has('return_url'))
            $this->redirectTo = Session::pull('return_url');
        //echo $this->redirectTo;
        return $this->register($request);
    }


    public function getSocialAuth($provider=null)
    {
        if(!config("services.$provider")) abort('404'); //just to handle providers that doesn't exist

        return Socialite::with($provider)->redirect();
    }

    public function getSocialAuthCallback($provider=null)
    {
        if($user = Socialite::with($provider)->user()){
            dd($user);
        }else{
            return 'something went wrong';
        }
    }

}
