
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



{{--세부페이지 네비바 대체--}}
<style>
    .breadcrumb > li + li.pull-right:last-child:before {
        content: " "; // breadcrumb 특정슬래시 없애기. 공백이면안됨
    }
</style>
<ol class="breadcrumb">
    <li><a href="{{ URL::to('ccmail/sample') }}">
        <span class="glyphicon glyphicon-list" aria-hidden="true"></span> 전체</a></li>
    <li><a href="{{ URL::to('ccmail/cate/'.$ccMail->cate1) }}">{{ $ccMail->cate1 }}</a></li>
    @if($ccMail->cate2)
        <li><a href="{{ URL::to('ccmail/cate/'.$ccMail->cate1.'/'.$ccMail->cate2) }}">{{ $ccMail->cate2 }}</a></li>
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

{{-- 세션에 메세지 있으면 보여주기 --}}
@if (Session::has('message'))
    <div class="alert alert-info" style="margin:10px 0;">{{ Session::get('message') }}</div>
@endif

<div class="row">{{--내용증명 리스트 간략 박스형태--}}
    <div class=" col-sm-10 col-sm-push-1">

        <div class="panel panel-default divCcMailBox ">


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
                    <input type="submit" class="btn btn-link" value="샘플 적용하기">
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
                {{--<span>{{ $ccMail->create_id }}</span>--}}

                <form method="get" action="{{URL::to('/ccmail/work/create/'.$ccMail->id)}}" class="pull-right">
                    <input type="submit" class="btn btn-primary" value="샘플 적용하기">
                </form>



                @if(Auth::check() && (Auth::user()->name == '김상겸' || Auth::user()->name == '정지혜' ) )
                    ※ 권한관리해야!


                    <a class="pull-left btn btn-xs btn-link" href="{{ URL::to('ccmail/sample/' . $ccMail->id . '/edit') }}">Edit</a>
                    <a class="pull-left btn btn-xs btn-link" href="{{ URL::to('ccmail/sample/create') }}">새 양식 추가</a>

                    <form method="post" action="/public/todo/{{$ccMail->id}}" class="pull-left">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token()  }}">
                        <input type="submit" value="Del" class="btn btn-link btn-xs">
                    </form>
                @endif

                <div class="clearfix"></div>
            </div>

        </div>

        {{--다른 카테고리 리스트

                작업하자

        --}}
        {{--본 카테고리 예제--}}
        <div class="" style="padding:20px;">
            <h5><a href="/ccmail/cate/{{ $ccMail->cate1 }}">{{ $ccMail->cate1 }}</a> 카테고리</h5>
            <ul style="list-style:none ;line-height:180%;">
            @foreach( $lists as $list )
                <li style="border-bottom:1px solid #ccc;">
                    <a href="/ccmail/sample/{{ $list->id }}" style="color:;"><small>{{ $list->id }}.</small> {{ $list->cate3 }}</a>
                </li>
            @endforeach
            </ul>
        </div>


        {{--안되는게 더 많아.. "사기에 대한 피해보상을 청구할때-최고장. 이것도 안됨 ㅎㅎ--}}
        <div class="" style="padding:20px;font-size:0.9em;color:#777;">
            이 페이지의 다른 주소 :
            <a href="/ccmail/sample/{{ str_replace(' ', '-', $ccMail->cate3) }}" style="color:gray;;">
                {{Request::server ("HTTP_HOST")}}/ccmail/sample/{{ str_replace(' ', '-', $ccMail->cate3) }}
            </a>
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
