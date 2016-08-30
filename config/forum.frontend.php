<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Controllers
    |--------------------------------------------------------------------------
    |
    | Here we specify the namespace and controllers to use for the frontend.
    | Change these if you want to override default behaviour.
    |
    */

    'controllers' => [
        /*'namespace' => 'Riari\Forum\Frontend\Http\Controllers',*/
        'namespace' => 'App\Http\Controllers\Forum',
        'category'  => 'CategoryController',
        'thread'    => 'ThreadController',
        'post'      => 'PostController'
    ],

    /* ForumFrontendServiceProvider.php에 보니까 라우터도 개별 설정이 가능하네!!

     * if (config('forum.frontend.routes')) {
        $this->loadRoutes($router);
    }*/
    /* 이렇게 한번 해볼까?
    'routes' =>  .......class,
    */



    /*
    |--------------------------------------------------------------------------
    | Utility Class
    |--------------------------------------------------------------------------
    |
    | Here we specify the namespace of the class to use for various utility
    | methods. This is automatically aliased to 'Forum' for ease of use in
    | views.
    |
    */

    'utility_class' => Riari\Forum\Frontend\Support\Forum::class,

    /*
    |--------------------------------------------------------------------------
    | Middleware
    |--------------------------------------------------------------------------
    |
    | Here we specify middleware to apply to the routes. For multiple values,
    | use arrays or pipe notation.
    |
    */

    'middleware' => 'web' //null

];
