@extends('layouts.master') {{--master를 상속받음--}}

@section('title', '분쟁제로 - 분노 이력')

@section('sidebar')
    @parent

@stop

@section('content')


    <link rel="stylesheet" href="{{URL::asset('/css/boon/ccMail.css')}}">

    <style>
    </style>

    {{--세부페이지 네비바--}}
    <nav class="navbar navbar-default">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::to('boon/list') }}">분노 내역</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('boon/charge') }}">분노 충전</a></li>
            </ul>
            <ul class="nav navbar-nav" style="float: right">
                <li><a href="#" class="navbar-nav pull-right"></a></li>
            </ul>
        </div>
    </nav>






    {{--    <div class="corner-ribbon top-left sticky red shadow">New</div>
        <div class="corner-ribbon top-right sticky blue">Updated</div>
        <div class="corner-ribbon bottom-left sticky orange">Popular</div>
        <div class="corner-ribbon bottom-right sticky green shadow">Hello</div>

        <h1>Corner Ribbons</h1>
        <h2>(with custom settings and all...)</h2>--}}

   <!-- 세션에 메세지 있으면 보여주기 -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    {{--내용증명 리스트 간략 박스형태--}}
    <div class="">

        <div class="container">
            <div class="jumbotron">
                <h1>분노 충전<span class="glyphicon glyphicon-fire text-red"></span> </h1>
                <p> <small></small></p>
            </div>
            {{--<p>분노게이지를 충전하는 방법은 여러가지입니다.</p>--}}
        </div>

        @if (empty($list))

            <div class="row alert alert-info">
                현재 분노게이지는 0입니다.
            </div>

        @else
            <div class="row">
            @foreach($list as $row)
                        <div class="col-sm-6">
                            <div class="panel panel-default divCcMailBox ">{{--ribon_new--}}
                                {{--

                                        <div class="panel-body divCcMailBoxBody">
                                            <div class="corner-ribbon top-right blue" style="opacity:0.5;">추 천
                                                <span class="badge">{{ $ccMail->used_cnt }}</span>
                                            </div>
                                            {!! nl2br(e($ccMail->content)) !!}
                                        </div>
                                --}}

                                <div class="panel-body clearfix " style="">
                                    <b><i class="small">{{ $row->id }}</i>.

                                        {{--{{ $ccMail->cate3 }}--}}
                                        {{ $row->ask_origin or ''}}
                                        {{ $row->create_at or ''}}

                                    </b>

                                    <form method="get" action="{{URL::to('/request/'.$row->id)}}" class="" style="position:absolute;bottom:10px;right:10px;">
                                        <button type="submit" class="btn btn-default">
                                            <span class="glyphicon glyphicon-menu-right"></span>
                                        </button>
                                    </form>



                                </div>
                            </div>
                        </div>
                @endforeach
            </div>

                        <!--페이징-->

                <div class="text-center">
                    {!! $list->appends( Request::input() )->render() !!}
                    {{--{!! $list->appends( compact('cate1', 'cate2'))->links('ddddddd') !!} links는 안씀이제? --}}
                    {{--
                    < ?php $cate1 = Input::get('cate1');
                    $cate2 = Input::get('cate2');
                    $q = Input::get('q'); ? >
                    {!! $list->appends( compact('cate1', 'cate2', 'q') )->render() !!} 넘길 변수 제한하려면. --}}
                </div>
                @endif
    </div>






    {{--{{SKHelper::p($list)}}--}}



@stop


{{--@if ($ccMail->done == 1)
<span style="text-decoration: line-through;">
@endif--}}
{{--@if ($ccMail->done == 1)
    </span>
@endif--}}