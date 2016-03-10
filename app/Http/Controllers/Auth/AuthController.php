<?php

namespace App\Http\Controllers\Auth;

use App\BoonStatus;
use App\User;
use App\UserInfo;
use Laravel\Socialite\Facades\Socialite;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

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
        //$data = Session::all();
        //\SKHelper::p($data);
        return view('auth.login');
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
