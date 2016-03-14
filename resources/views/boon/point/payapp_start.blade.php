@extends('layouts.popup')

@section('title', '포인트 결제')

@section('top')

    <style>
        #top-area {font-family:'Noto Sans', sans-serif;
            background-color:#195F91;color:white;padding:10px;}
        #top-area h1{font-size:1.8em;}
        #top-area small{color:white;}

        #box결제액확인 {
            border:4px solid #eee;padding:10px;margin-bottom:10px;
        }
        #box결제액확인 label{font-weight: bold;};

    </style>
    <div id="top-area" style="">
        <h1>Boonzero 결제확인 <small style="">(주) 모이어</small></h1>
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

<div class="alert alert-info">결제액을 확인 후 다음 버튼을 눌러주세요.</div>

    <div id="box결제액확인" style="">
    {!! BootForm::open(['method' => 'POST'])->action('/boon/payment/payapp-pay') !!}
        {!! BootForm::hidden('goodname')->value( 'Boon(분제로) 포인트' ) !!} {{----}}

        {!! BootForm::text('결제액','price')->value( \app\Lib\skHelper::number_format( Request::get('price') ) ) !!}
        {!! BootForm::text('휴대폰번호','recvphone')
            ->value( \app\Lib\skHelper::tel_html( Auth::user()->userInfo->phone) )
            ->required()->helpBlock('문자발송용. <small>회원정보가 함께 업데이트됩니다.</small>') !!}

        {!! BootForm::button('취소')->addClass('pull-left')->onclick('window.close()') !!}
        {!! BootForm::submit('다 음')->addClass('pull-right btn-primary') !!}
        {!! BootForm::close() !!}
        <div class="row"></div>
    </div>




        {{--<div class="alert alert-info">
        </div>--}}

@stop

@section('bottom')
    <div class="" style="position:absolute;bottom:0px;width:100%;background-color:#e2e2e2;text-align:center;font-size:1em;margin-top:10px;padding:20px;">
        (주)모이어<small> / 기술문의 : <a href="tel:070-7525-2370">070-7525-2370</a></small>
        <br><small>서울 강남구 테헤란로 207, A&Company 빌딩 7층</small>

    </div>
@stop

{{--@if ($ccMail->done == 1)
<span style="text-decoration: line-through;">
@endif--}}
{{--@if ($ccMail->done == 1)
    </span>
@endif--}}