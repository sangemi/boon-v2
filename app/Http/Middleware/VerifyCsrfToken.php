<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     * 'orders/*' :orders 로 시작하는 url 의 모든 요청 제외
     */
    protected $except = [
        'boon/payment/payapp-feedback',
    ];
}
