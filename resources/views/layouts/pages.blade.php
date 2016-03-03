@extends('layouts.master') {{--master를 상속받음--}}

@section('title', 'Page Title')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@stop

@section('content')

    <p class="title">This is my 바디 컨텐츠.
        {{$page_id}}
        <?
            echo "jhahaha";
        ?>
    </p>


@stop