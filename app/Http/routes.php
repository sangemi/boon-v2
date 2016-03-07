<?php


/*SMS post방식으로 바꿔야*/
Route::post('/sms', 'SmsController@sendSms');




Route::group(['middleware' => ['web']], function () { //소스중에서 Token, Session, Cookie, Errors 사용한다면
    /* 내용증명 */
    /*Route::get('ccmail/sample/{sample_id}', 'CcMailController@show');
    Route::get('ccmail/send', 'CcMailController@send');
    Route::get('ccmail/my', 'CcMailController@my');*/
    /** index 	create 	store	show 	 edit	update	destroy
     * 리스트 	입력폼	DB저장	특정view 수정폼	DB업뎃	DB삭제*/
    Route::resource('ccmail/sample', 'CcMailSampleController');
    Route::get('ccmail/sample/{id}/{direction?}', 'CcMailSampleController@show');

    Route::group(['middleware' => 'auth'], function () {
        Route::resource('ccmail/work', 'CcMailWorkController');
        //Route::get('ccmail/work/create/{id}', ['middleware'=>'auth', 'uses'=>'CcMailWorkController@create']);
        Route::get('ccmail/work/create/{id}', 'CcMailWorkController@create');
        //Route::get('ccmail/work/{id}', ['middleware'=>'auth', 'uses'=>'CcMailWorkController@show']); //기본 route지만 auth해야해서. ??

        Route::resource('request', 'UserRequestController');
        //Route::resource('request/ccmail', 'RequestCcmailController'); //what : ccmail, ordpay, consult 등

        Route::resource('boon/status', 'BoonStatusController');
        Route::resource('boon/cash', 'BoonCashController'); /*실제 돈 충전, 환불*/
        Route::resource('boon/point', 'BoonPointController'); /*포인트 적립, 삭감*/

    });




    //// 로그인 routes...
    Route::get('login', 'Auth\AuthController@getLogin');
    Route::post('login', 'Auth\AuthController@postLogin');
    Route::get('logout', 'Auth\AuthController@getLogout');
    //// 가입 routes...
    Route::get('register', 'Auth\AuthController@getRegister');
    Route::post('register', 'Auth\AuthController@postRegister');

    Route::controllers([
        'auth' => 'Auth\AuthController',
        'password' => 'Auth\PasswordController',
    ]);

    Route::get('/', 'MainController@index');

    //// 화면 (J)
    // 패스워드 초기화 링크 요청 routes...
    Route::get('password/email', 'Auth\PasswordController@getEmail');
    Route::post('password/email', 'Auth\PasswordController@postEmail');
    // 패스워드 초기화 routes...
    Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
    Route::post('password/reset', 'Auth\PasswordController@postReset');

    //Social Login
    Route::get('/login/{provider?}',[
        'uses' => 'Auth\AuthController@getSocialAuth',
        'as'   => 'auth.getSocialAuth'
    ]);

    Route::get('/login/callback/{provider?}',[
        'uses' => 'Auth\AuthController@getSocialAuthCallback',
        'as'   => 'auth.getSocialAuthCallback'
    ]);
});





/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
