<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Policies
    |--------------------------------------------------------------------------
    |
    | Here we specify the policy classes to use. Change these if you want to
    | extend the provided classes and use your own instead.
    |
            Riari\Forum\Models\Category::class  => Riari\Forum\Policies\CategoryPolicy::class,
    */

    /*'policies' => [
        'forum' => Riari\Forum\Policies\ForumPolicy::class,
        'model' => [
            Riari\Forum\Models\Category::class  => Riari\Forum\Policies\CategoryPolicy::class,
            Riari\Forum\Models\Thread::class    => Riari\Forum\Policies\ThreadPolicy::class,
            Riari\Forum\Models\Post::class      => Riari\Forum\Policies\PostPolicy::class
        ]
    ],*/
    'policies' => [
        'forum' => App\Policies\Forum\ForumPolicy::class,
        'model' => [
            Riari\Forum\Models\Category::class  => App\Policies\Forum\CategoryPolicy::class,
            Riari\Forum\Models\Thread::class    => App\Policies\Forum\ThreadPolicy::class,
            Riari\Forum\Models\Post::class      => App\Policies\Forum\PostPolicy::class
        ]
    ],

    'category' => [
        'groups' => [
            'notice' => [4, 5, 6],
            'for_member' => [4, 5, 6],   /*로그인한 사람만 볼수있음*/
        ]
    ],
    /*
    |--------------------------------------------------------------------------
    | Application user model
    |--------------------------------------------------------------------------
    |
    | Your application's user model.
    |
    */

    'user_model' => App\User::class,

    /*
    |--------------------------------------------------------------------------
    | Application user name
    |--------------------------------------------------------------------------
    |
    | The attribute to use for the username.
    |
    */

    'user_name' => 'name',

];
