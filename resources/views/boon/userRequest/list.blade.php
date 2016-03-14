@extends('layouts.master') {{--master를 상속받음--}}

@section('title', '분쟁제로 - 내용증명')

@section('sidebar')
    @parent
    <p>내용증명 </p>
@stop

@section('content')


    <link rel="stylesheet" href="{{URL::asset('/css/boon/ccMail.css')}}">

    <style>
    </style>

    {{--세부페이지 네비바--}}
    <nav class="navbar navbar-default">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::to('request') }}">신청내역</a>
        </div>
        <div class="collapse navbar-collapse">

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

        {{--n개씩 정렬하는 방법--}}
        @if (empty($tasks))

            <div class="container">
                <div style="text-align:center;padding:140px;">
                    <p>내역이 없습니다. <small></small></p>
                </div>
            </div>

        @else

            <ul class="list-group">
            @foreach( $tasks as $userReq)

                    <li class="list-group-item">
                            <i class="small">{{ $userReq->id }}</i>.
                            <b><a href="{{URL::to('/request/'.$userReq->id)}}">
                                {{ $userReq->title or ''}}

                            {{ $userReq->ask_origin or ''}}
                                </a></b>
                            <small><i>{{ substr($userReq->created_at, 5, 11)}}</i></small>
                            {{--{!!  $userReq->worked_paper or '' !!}--}}

                    </li>

            @endforeach
            </ul>

            <!--페이징-->

            <div class="text-center clearfix">
                {!! $tasks->appends( Request::input() )->render() !!}
                {{--{!! $tasks->appends( compact('cate1', 'cate2'))->links('ddddddd') !!} links는 안씀이제? --}}
                {{--
                < ?php $cate1 = Input::get('cate1');
                $cate2 = Input::get('cate2');
                $q = Input::get('q'); ? >
                {!! $tasks->appends( compact('cate1', 'cate2', 'q') )->render() !!} 넘길 변수 제한하려면. --}}
            </div>
        @endif
    </div>






    {{--{{SKHelper::p($tasks)}}--}}



@stop


{{--@if ($ccMail->done == 1)
<span style="text-decoration: line-through;">
@endif--}}
{{--@if ($ccMail->done == 1)
    </span>
@endif--}}