
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

    $(".btnPrev").click(function(){
        location.href='/ccmail/sample/{!! $id !!}/prev';
    });
    $(".btnNext").click(function(){
        location.href='/ccmail/sample/{!! $id !!}/next';
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
        content: " "; // breadcrumb 특정슬래시 없애기. 공백이면안됨
    }
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
                <b><i class="small">{{ $ccMail->id }}</i>.

                    {{ $ccMail->cate3 }}

                </b>
            </div>
            <div class="panel-body ">
                <div class="pull-left">
                    {{--Up Down Voting 툴 && 댓글 업 다운. 심자! 이런게 나중 확산장치임!--}}
                </div>

                <form method="get" action="{{URL::to('/ccmail/work/create/'.$ccMail->id)}}" class="pull-right">
                    <input type="submit" class="btn btn-primary"
                           value="샘플 적용하기">
                </form>
            </div>





            <div class="panel-body divCcMailBoxBody">
                <div class="corner-ribbon top-right blue" style="opacity:0.5;">
                    <?php if( $ccMail->used_cnt ){ ?>
                    추 천
                    <span class="badge">+{{ $ccMail->used_cnt }}</span>
                    <?php } ?>
                </div>

                {!! nl2br(e($ccMail->content)) !!}
            </div>
            <div class="panel-footer">
                <span>{{ $ccMail->create_id }}</span>

                <a class="pull-left btn btn-xs btn-link" href="{{ URL::to('ccMail/sample/' . $ccMail->id . '/edit') }}">Edit</a>

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
