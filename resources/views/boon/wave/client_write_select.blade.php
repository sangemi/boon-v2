
@extends('layouts.master') {{--master를 상속받음--}}

@section('title', '단체소송 - 분제로')

@section('sidebar')
    @parent
    <p>단체소송</p>
@stop
@section('content')

    <div style='text-align:center;margin:30px;'>
        <h1>현재 접수중 사건</h1>
        <p class='well'><a href='?suit_id=5' style="font-size:1.2em;">5. 코웨이 중금속 사건</a></p>
        <p class='well'><a href='?suit_id=6' style="font-size:1.2em;">6. 인터파크 정보유출 사건</a></p>

    </div>
@stop