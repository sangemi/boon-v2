<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /** https://laravel.kr/docs/5.2/authorization
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     * 인증된 사용자가 없거나 특정 사용자가 forUser 메소드로 명시되지 않았을 경우, Gate는 모든 ability에 대해 자동으로 false를 반환함
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        // SK 코딩시작. 특정 사용자에게 모든 ability를 부여
        $gate->before(function ($user, $ability) {
            /*if ($user->isSuperAdmin()) {
                return true;
            }*/
        });
        // 글 수정권한
        $gate->define('update-post', function ($user, $post) {
            return $user->id === $post->user_id;
        });
    }
}
