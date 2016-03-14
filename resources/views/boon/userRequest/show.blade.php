
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
        location.href='/request/{!! $id !!}/prev';
    });
    $(".btnNext").click(function(){
        location.href='/request/{!! $id !!}/next';
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
    <li><a href="{{ URL::to('request') }}">
            <span class="glyphicon glyphicon-list" aria-hidden="true"></span> 전체</a></li>
    <li class="active">{{ $task->id }}</li>

    <li style="" class="pull-right">{{--이전 샘플 / 다음 샘플--}}

        <a href="javascript:history.back();" class="btn btn-xs btn-default glyphicon glyphicon-menu-left"></a>
        {{--<span class="btn btn-xs btn-default btnPrev glyphicon glyphicon-menu-left" aria-hidden="true"></span>
        <span class="btn btn-xs btn-default btnNext glyphicon glyphicon-menu-right" aria-hidden="true"></span>--}}

    </li>

</ol>


<div class="">{{--내용증명 리스트 간략 박스형태--}}


        <div class="panel panel-default">


            <div class="panel-heading">
                <b><i class="small">{{ $task->id }}</i>.

                    {{ $task->title }}

                </b>
            </div>




            <table class="table">
                <tr>
                    <td>
                        상태
                    </td>
                    <td><span class="label label-info">{!! $task->status_show !!}</span></td>
                </tr>
                <tr>
                    <td>
                        요청사항
                    </td>
                    <td>
                        {!! $task->ask_origin !!}
                    </td>
                </tr>
            </table>
            <div class="panel-body ">

                <div class="">


                </div>
                <div class="">
                    <div class=" col-sm-6">
                        <b>신청 내용</b>
                        <div class="panel panel-default">
                            <div class="panel-body ">
                                {!! $task->worked_paper !!}
                            </div>
                        </div>
                    </div>
                    <div class=" col-sm-6">
                        <b>발송 내용</b>
                        <div class="panel panel-default">
                            <div class="panel-body ">
                                @if( !isset( $ccmail_history) )

                                    결과물이 아직 업로드 되지 않았습니다.
                                    작업 후 문자 및 이메일로 안내드리오니 기다려주시기 바랍니다.
                                    <p>문의 : 02-6925-0017</p>

                                @endif
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div class="panel-footer">

                @if(Auth::check() && (Auth::user()->name == '김상겸' || Auth::user()->name == '정지혜' ) )
                    ※ 권한관리해야!

                    <a class="pull-left btn btn-xs btn-link" href="{{ URL::to('request/' . $task->id . '/edit') }}">Edit</a>
                    <a class="pull-left btn btn-xs btn-link" href="{{ URL::to('ccmail/sample/create') }}">새 양식 추가</a>

                <form method="post" action="/public/todo/{{$task->id}}" class="pull-left">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token()  }}">
                    <input type="submit" value="Del" class="btn btn-link btn-xs">
                </form>
                @endif
            </div>

        </div>


</div>


@stop


    {{--@if ($task->done == 1)
    <span style="text-decoration: line-through;">
    @endif--}}
    {{--@if ($task->done == 1)
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
