<?php
/** index 	create 	store	show 	 edit	update	destroy
 * 리스트 	입력폼	DB저장	특정view 수정폼	DB업뎃	DB삭제*/





Route::group(['middleware' => ['web']], function () { // Session, CSRF 등 기본

    Route::get('/','MainController@index');

    //Route::post('/sms/send', 'SmsController@send'); /*Get방식은 절대X*/
    Route::controller('/sms', 'SmsController'); /*Get방식은 절대X*/

    /* 내용증명 */
    Route::get('ccmail','MainController@ccmail');
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

    Route::controller('boon/payment', 'PaymentController'); /*pg사와 결제*/



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

# Admin routes 베껴봤음ㅋ
/*Route::when('admin/*', 'admin'); # Route filters
Route::group([ 'prefix' => 'admin', 'namespace' => 'Controllers\Admin' ], function () {
    Route::controller('tags', 'TagsController', [
        'getIndex' => 'admin.tags.index',
        'getView'  => 'admin.tags.view'
    ]);
    Route::controller('categories', 'CategoriesController', [
        'getIndex' => 'admin.categories.index',
        'getView'  => 'admin.categories.view'
    ]);
    Route::controller('users', 'UsersController');
});*/

//Route::get('/moior/email', 'contactController'); // 7500명 로스쿨러들 모두 연락 가능 이메일... 한명이 구조(어느학교 120명..등 칸을 만듬)를 입력하면 십시일반 메우는 방식
// 약관 : 나는 이 조합에 가입하며, 내가 알고있는 신규조합원에게 가입권유(이메일, 문자)하는 것을 위임한다.
// 스팸용도로 쓰는 것은 절대 안되기 때문에.. 가입메일은 1주당 1개만 가능? 등의 제한.

