@extends('layouts.popup')

@section('title', '분노 충전')

@section('top')

    <style>
        h1 {font-size:1.4em;font-family:'Noto Sans', sans-serif}
    </style>
    <div style="background-color:#195F91;color:white;padding:10px;">
        <h1>Boon - 결제확인</h1>
    </div>

    <!-- 세션에 메세지 있으면 보여주기 -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

@stop

@section('content')
<style>
    #content {padding:10px;}
</style>
{{--<link rel="stylesheet" href="{{URL::asset('/css/boon/ccMail.css')}}">--}}


    <div style="border:4px solid #eee;padding:10px;margin-bottom:10px;">
    {!! BootForm::open(['method' => 'POST'])->action('/boon/payment/payapp-pay') !!}
        {!! BootForm::hidden('goodname')->value( '포인트 충전' ) !!} {{----}}

        {!! BootForm::text('결제액','price')->value( \app\Lib\skHelper::number_format( Request::get('price') ) ) !!}
        {!! BootForm::text('휴대폰번호','recvphone')
            ->value( \app\Lib\skHelper::tel_html( Auth::user()->userInfo->phone) )
            ->required()->helpBlock('문자발송용. 회원정보가 함께 업데이트됩니다.') !!}

        {!! BootForm::button('취소')->addClass('pull-left')->onclick('window.close()') !!}
        {!! BootForm::submit('다 음')->addClass('pull-right btn-primary') !!}
        {!! BootForm::close() !!}
        <div class="row"></div>
    </div>




        {{--<div class="alert alert-info">
        </div>--}}

    <div class="" style="font-size:0.8em;margin-top:30px;">


    </div>
@stop


{{--@if ($ccMail->done == 1)
<span style="text-decoration: line-through;">
@endif--}}
{{--@if ($ccMail->done == 1)
    </span>
@endif--}}