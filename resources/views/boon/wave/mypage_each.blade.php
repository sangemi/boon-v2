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
    <div class="row " style="padding:0 10px 10px 10px;">

        <div class="">

            {{--접수 상태--}}
            <div class="col-sm-12" style="white-space:normal;">
                <div class="bigbox">
                <h4 class="text-center">접수 상태{{--<small>+등록</small>--}}</h4>

                @if (empty($wave_client))
                    <div class="col-sm-12">
                        진행중 소송이 없습니다.
                    </div>
                @else


                        <div class="col-sm-12" style="text-align: left;">
                            <p style="font-weight:bold;">
                                <?=$wave_client['name']?>
                                <a href="{{ URL::to('wave/client/'.$wave_client['id'].'/edit') }}">
                                    <span class="btn btn-xs btn-link" aria-hidden="true">서류수정<span class="fa fa-pencil"></span></span>
                                </a>
                                <a class="btn btn-sm btn-link" href="/wave/file/create?client_id=<?=$wave_client['id']?>">증거제출</a>

                            </p>

                            <h3>소송 진행상태</h3>
                            <p>
                                <b><?=$wave_status['title']?></b>
                                <?=$wave_status['status_show']?>
                                <?=$wave_status['explain']?>
                            </p>{{--신청확인중--}}


                            {{--증거제출여부 테이블--}}
                            <h3>증거제출 관리</h3>
                            <table class="table table-condensed table-bordered  tb_file_status" >

                                <?php // DB에 있는 file 제목들을 json으로 변환 후
                                   $file_title_json = json_decode($wave_suit['file_title_json']);

                                ?>

                                    @if($file_title_json)
                                        <tr><th>증거번호</th><th>서류명</th><th>비고</th><th>파일</th><th>확인</th></tr>
                                        @foreach($file_title_json as $key3 => $file_title)
                                            <tr>
                                                <td><?=$file_title->title_no?></td>
                                                <td><?=$file_title->title?></td>
                                                <td><?=$file_title->type?></td>
                                                <td>
                                                @foreach($uploaded_files as $uploaded_file)
                                                    @if($file_title->title_no == $uploaded_file->title_no)
                                                        <a href="<?=$uploaded_file->uploaded_filename?>" target="_blank">[<?=$uploaded_file->source_filename?>]</a>
                                                    @endif
                                                @endforeach
                                                </td>
                                                <td></td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr><td>업로드한 자료가 없습니다.</td></tr>
                                    @endif

                            </table>

                            @if( $wave_client['chk_proof'] == '')

                            @endif

                            <h3>비용</h3>
                            @if( $wave_client['chk_payment'] == '입금대기')
                                <?php
                                $chk_payment = true;
                                    ?>
                                <div>
                                    <p class="bg-warning">입금대기 상태입니다</p>

                                </div>
                            @else
                                <div class="bg_warning">
                                    <p><?=$wave_client['chk_payment']?></p>
                                </div>
                            @endif



                         </div>



                @endif
            </div>
        </div>

    </div>

</div>

<div class="row" style="padding:0 10px 10px 10px;">

{{--공지사항--}}
<div class="col-sm-6" style="white-space:normal;">
    <div class="bigbox">

        {{--forum 글 읽어오기--}}
        <h4 class="text-center">공지사항</h4>
        <div id="category" class="text-left " style="margin-left:25px;">

            <ul>
            @foreach($forum_threads as $categori)
                <li>
                <a href="/forum/{{ $categori->category_id }}/{{ $categori->id }}">{{ $categori->title }}</a>
                </li>
            @endforeach
            </ul>
        </div>


    </div>
</div>

<div class="col-sm-6" style="white-space:normal;">
    <div class="bigbox">
        <h4 class="text-center">개인별 전달사항</h4>
        @if(isset($chk_payment))
            <div class="" style="padding:10px;">
            <h5 class="">비용 미입금 상태</h5>  (입금확인은 일괄적으로 진행하니 조금 기다려주세요)
            <p>입금계좌 : <b style="font-size:1.2em;">신한 100-029-697933 법무법인 예율</b></p>
            </div>
        @endif
    </div>

    @if( $wave_client['event_result'] )
        <div class="bigbox">
            <h4 class="text-center">환급이벤트 선정결과</h4>
            <?php
            $wave_event_history = DB::table('wave_event_history')->where('id', $wave_client['event_result'])->first();
            ?>
            <div style="margin:20px;padding-left:20px;">
                <p><b>환급대상자에 선정되셨습니다.</b></p>
            @if( count($wave_event_history))
                <p><?=$wave_event_history->title?></p>
                <p><?=$wave_event_history->explain?></p>
            @endif
            </div>
        </div>
    @endif


</div>

</div>

{{--<div class="text-center" style="overflow-x:scroll;white-space: nowrap;padding:0 10px 10px 10px;">
{{dd( Request::input(), http_build_query (Request::input()) ) }}
</div>--}}

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

{{--내용증명 리스트 간략 박스형태--}}
<div class="" style="margin-top:30px;">

</div>






{{--{{SKHelper::p($ccMails)}}--}}



@stop


{{--@if ($ccMail->done == 1)
<span style="text-decoration: line-through;">
@endif--}}
{{--@if ($ccMail->done == 1)
</span>
@endif--}}