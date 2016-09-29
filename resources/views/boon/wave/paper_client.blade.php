@extends('layouts.master') {{--master를 상속받음--}}

@section('title', '단체소송 - 분제로')

@section('sidebar')
    @parent

    <p>단체소송 </p>

@stop

@section('content')


<link rel="stylesheet" href="{{URL::asset('/css/boon/ccMail.css')}}">


{{--페이지 작은 네비바 대체--}}
<style>

    .breadcrumb > li + li.pull-right:last-child:before {
        content: " "; /* breadcrumb 특정슬래시 없애기. 공백이면안됨*/
    }
</style>

<ol class="breadcrumb">
    <li><a href="{{ URL::to('wave') }}">
        <span class="glyphicon glyphicon-list" aria-hidden="true"></span> 단체소송 상황실</a></li>

    <li class="pull-right"><a href="{{ URL::to('wave/client/create') }}">
        <span class="btn btn-xs btn-default" aria-hidden="true">신규 <span class="fa fa-pencil"></span></span></a>
    </li>


</ol>




<?php
/*$prev_url = parse_url(URL::previous());
$now_url = parse_url(URL::current());
\App\Lib\skHelper::p($prev_url );
\App\Lib\skHelper::p($now_url);
//echo $prev_url['path'] .'='. $now_url['path'];
if( $prev_url['host'] != $now_url['host']){ //타사이트에서 유입. 아마 키워드광고
echo "ddddddd다름";
}*/
?>

<style>
    .btnCate1s {padding:8px 10px;}
    .btnCate1s span.fa {font-size:2.0em;}
    .cate1_text {font-size:0.8em;font-family:'맑은 고딕';}

    .bigbox {width:100%;border:1px solid white;background-color:#fff;float:left;margin-bottom:5px;
        border-radius:10px;
    }
    .bigbox h4 {border-bottom:1px solid tomato;padding:8px 0 3px 0;color:tomato;margin-top:0px;border-top-left-radius:10px;border-top-right-radius:10px;}
    h1 { color: #00BFFF; }

    .tb_file_status {font-size:0.7em;}
</style>

<h2><?=$wave_suit['title']?></h2>
<a href="/wave/admin/paper/clientlist/5">코웨이</a>
<a href="/wave/admin/paper/clientlist/6">인터파크</a>

    <div class="row " style="padding:0 10px 10px 10px;">

        <div class="">

            {{--접수 상태--}}
            <div class="col-sm-12" style="white-space:normal;">
                <div class="bigbox">
                <h4 class="text-center">원고목록{{--<small>+등록</small>--}}</h4>

                @if (empty($wave_client))
                    <div class="col-sm-12">
                        자료없음
                    </div>
                @else


                    <div class="col-sm-12" style="text-align: left;">

                        <h3></h3>
                        @if($wave_suit['suit_id'] == 5)
                            <table class="table table-condensed table-bordered  tb_file_status" >
                                <tr><th>순번</th><th>성명</th><th>주민등록번호</th><th>주소</th><th>연락처</th></tr>
                                @foreach($wave_client as $key => $each_client)
                                    @if( !$each_client->withdraw )
                                        <tr>
                                            <td><?=($key + 1)?></td>
                                            <td><?=$each_client->name?></td>
                                            <td><?=$each_client->jumin?></td>
                                            <td>(<?=$each_client->postcode?>) <?=$each_client->addr?> <?=$each_client->addr2?></td>
                                            <td><?=\App\Lib\skHelper::tel_html($each_client->phone)?></td>

                                        </tr>
                                    @endif
                                @endforeach
                            </table>

                            <table class="table table-condensed table-bordered  tb_file_status" >
                                <tr><th>순번</th><th>성명</th><th>사용기간</th><th>모델명</th><th>입증자료</th></tr>
                                @foreach($wave_client as $key => $each_client)
                                    @if( !$each_client->withdraw )
                                        <tr>
                                            <td><?=($key + 1)?></td>
                                            <td><?=$each_client->name?></td>
                                            <td><?=$each_client->data02?></td>
                                            <td><?=$each_client->data01?></td>
                                            <td>??</td>

                                        </tr>
                                    @endif
                                @endforeach
                            </table>
                        @elseif($wave_suit['suit_id'] == 6)
                            <table class="table table-condensed table-bordered  tb_file_status" >
                            <tr><th>순번</th><th>성명</th><th>주민등록번호</th><th>주소</th><th>연락처</th></tr>
                            @foreach($wave_client as $key => $each_client)
                                @if( !$each_client->withdraw )
                                    <tr>
                                        <td><?=($key + 1)?></td>
                                        <td><?=$each_client->name?></td>
                                        <td><?=$each_client->jumin?></td>
                                        <td>(<?=$each_client->postcode?>) <?=$each_client->addr?> <?=$each_client->addr2?></td>
                                        <td><?=\App\Lib\skHelper::tel_html($each_client->phone)?></td>

                                    </tr>
                                @endif
                            @endforeach
                            </table>
                        @else
                            wave_suit 선택안됨
                        @endif




                     </div>



                @endif
            </div>
        </div>

    </div>

</div>

<div class="row" style="padding:0 10px 10px 10px;">



</div>



{{-- 세션에 메세지 있으면 보여주기 --}}
@if (Session::has('message'))
<div class="alert alert-info" style="margin:10px 0;">{{ Session::get('message') }}</div>
@endif



{{--{{SKHelper::p($ccMails)}}--}}



@stop


