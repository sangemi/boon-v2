
@extends('layouts.master') {{--master를 상속받음--}}

@section('title', '분쟁제로 - 내용증명')

@section('sidebar')
    @parent

    <p>내용증명</p>

@stop

@section('content')


<link rel="stylesheet" href="{{URL::asset('/css/boon/ccMail.css')}}">
<script>
$(document).ready(function(){
    /*입력버튼 눌렀을때. xxxx 그냥 하나하나 눌렀을때 자동저장하자! 앱처럼*/
    $( '#form-내용증명' ).on( 'submit', function() {

        /*$.post(
                $( this ).prop( 'action' ),
                {
                    "_token": $( this ).find( 'input[name=_token]' ).val(),
                    "setting_name": $( '#setting_name' ).val(),
                    "setting_value": $( '#setting_value' ).val()
                },
                function( data ) {
                    alert(data);
                    //do something with data/response returned by server
                },
                'json'
        );*/

        //.....
        //do anything else you might want to do
        //.....

        //prevent the form from actually submitting in browser
        //return false;
    } );


    $("#btn-ccmail-save").click(function(){
        $.post(
                $( this ).prop( 'action' ),
                {
                    "_token": $( this ).find( 'input[name=_token]' ).val(),
                    "setting_name": $( '#setting_name' ).val(),
                    "setting_value": $( '#setting_value' ).val()
                },
                function( data ) {
                    //do something with data/response returned by server
                },
                'json'
        );
    });

})

</script>
<style>
    .btnPrev, .btnNext {cursor:pointer;height:100%}
    .btnPrev:hover {font-weight:bold;cursor:pointer}
    .vcenter { /*상하 가운데 정렬*/
        display: inline-block;
        vertical-align: middle;
        float: none;
    } /*버티컬센터 http://stackoverflow.com/questions/20547819/vertical-align-with-bootstrap-3/25517025#25517025*/
</style>

<style>
    .breadcrumb > li + li.pull-right:last-child:before {
        content: " "; // 상단 현재위치(breadcrumb) 특정슬래시 없애기. 공백이면안됨
    }
    .ccmail-content {min-height:300px;}
</style>


{{--세부페이지 네비바--}}
<ol class="breadcrumb">
    <li><a href="{{ URL::to('ccmail') }}">
            <span class="glyphicon glyphicon-list" aria-hidden="true"></span> 전체</a></li>
    <li><a href="{{ URL::to('ccmail?cate1='.$ccMail->cate1) }}">{{ $ccMail->cate1 }}</a></li>
    @if($ccMail->cate2)
    <li><a href="{{ URL::to('ccmail?cate2='.$ccMail->cate2) }}">{{ $ccMail->cate2 }}</a></li>
    @endif
    <li class="active">{{ $ccMail->id }}</li>

    <li style="" class="pull-right">{{--이전 샘플 / 다음 샘플--}}
        <span class="btn btn-xs btn-default btnPrev glyphicon glyphicon-menu-left" aria-hidden="true"></span>
        <span class="btn btn-xs btn-default btnNext glyphicon glyphicon-menu-right" aria-hidden="true"></span>

    </li>

</ol>
{{--    <div class="corner-ribbon top-left sticky red shadow">New</div>
    <div class="corner-ribbon top-right sticky blue">Updated</div>
    <div class="corner-ribbon bottom-left sticky orange">Popular</div>
    <div class="corner-ribbon bottom-right sticky green shadow">Hello</div>

    <h1>Corner Ribbons</h1>
    <h2>(with custom settings and all...)</h2>--}}


<div class="">{{--내용증명 리스트 간략 박스형태--}}
    <div class="row">

        <div class="panel panel-default divCcMailBox ribon_new">


            <div class="panel-heading">

                    <div class="row text-center">

                        <h1>내 용 증 명</h1>


                    </div>

            </div>

            {!! Form::open(array('id' => 'form-내용증명', 'url'=>'/ccmail/work')) !!}
            {!! Form::email('ddd', null, ['class' => 'form-control']) !!}

            {!! Form::close() !!}

            {!! BootForm::open()->id('form-내용증명')->action('/ccmail/work') !!}
            {!! BootForm::hidden('sample_id')->value( $ccMail->id ) !!}
            {!! BootForm::hidden('create_id')->value( Auth::user()->id ) !!}

            <div class="panel-body ">
                <div class="pull-left">
                    {{--Up Down Voting 툴 && 댓글 업 다운. 심자! 이런게 나중 확산장치임!--}}
                </div>
                <div class="row">
                    <div  class="col-xs-6">

                        <p>
                        <a class="btn btn-primary">
                            <span class="glyphicon glyphicon-send" aria-hidden="true"></span>
                            보내는 사람
                        </a>
                        </p>
                        {!! BootForm::text('이름', 'sender_name')->defaultValue( Auth::user()->name )->hideLabel()->placeholder('이름')->required() !!}
                        {!! BootForm::text('주소', 'sender_addr')->placeholder('주소')->hideLabel() !!}
                        {!! BootForm::text('휴대폰', 'sender_phone')->placeholder('휴대폰번호 (진행상황 문자안내드림)')->hideLabel() !!}


                        {{--{!! BootForm::bind($CcMail) !!}--}}
                    </div>

                    <div  class="col-xs-6">
                        <p>
                        <a class="btn btn-primary">
                            <span class="glyphicon glyphicon-fire" aria-hidden="true"></span>
                            받는 사람
                        </a>
                        </p>

                        {!! BootForm::text('이름', 'receiver_name')->placeholder('이름')->defaultValue('')->hideLabel()->required() !!}
                        {!! BootForm::text('주소', 'receiver_addr')->placeholder('주소. 익일 특급으로 등기발송됩니다.')->hideLabel()->required() !!}
                        {!! BootForm::text('휴대폰', 'receiver_phone')->placeholder('휴대폰번호')->hideLabel() !!}
                        {!! BootForm::button('인맥에서 불러오기')->addClass('btn-sm') !!}

                        <?php /*$builder2 = new AdamWathan\Form\FormBuilder; // */?>
                        <?php /* $builder->open()->action('/ccmail'); */?>

                    </div>
                </div>

            </div>





            <div class="panel-body divCcMailBoxBody ">

                <div class=" col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">

                    <div class="">
                        <h4>제목 : {{$ccMail->cate3}}의 건</h4>

                    </div>

                    <textarea name="content" class="form-control ccmail-content">{{ $ccMail->content }}</textarea>
                </div>

                <div class=" col-sm-12 text-center alert">
                    <button class="btn btn-default btn-lg btn-ccmail-save" type="submit">내용저장</button>

                    @if(Auth::user())

                    @endif
                </div>

            </div>

            {!! BootForm::close() !!}

            <div class="panel-footer">
                <span>{{ $ccMail->create_id }}</span>

                <a class="pull-left btn btn-xs btn-link" href="{{ URL::to('ccMail/sample/' . $ccMail->id . '/edit') }}">
                    저  장
                </a>

                <form method="post" action="/public/todo/{{$ccMail->id}}" class="pull-left">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token()  }}">
                    <input type="submit" value="Del" class="btn btn-link btn-xs">
                </form>
            </div>

        </div>

    </div>
</div>


@stop


    {{--@if ($ccMail->done == 1)
    <span style="text-decoration: line-through;">
    @endif--}}
    {{--@if ($ccMail->done == 1)
        </span>
    @endif--}}

{{-- 상하 가운데정렬 CSS
<div class="row">
    <div class="col-xs-11 vcenter">
        내용1
    </div><!-- inline-block add extra space between blocks..
--><div class="col-xs-1 vcenter">
        내용2
    </div>
</div>--}}
