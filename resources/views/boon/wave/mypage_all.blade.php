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


{{-- 검색부분 시작 --}}
<style>
    .cf:before, .cf:after{
        content:"";
        display:table;
    }
    .cf:after{ clear:both; }

    .cf{ zoom:1; }

    /* Form wrapper styling */
    .search-wrapper {
        width: 75%;
        margin: 45px auto 50px auto;
    }

    /* Form text input */
    .search-wrapper input {
        width: 87%;
        height: 20px;
        padding: 20px 15px;
        float: left;
        font: normal 16px 'Arial', 'Tahoma';
        border: 0;
        background: #fff;
        border-radius: 5px 0 0 5px;
    }
    .search-wrapper input:hover + .search-wrapper button {
        background: #ccc
    }
    .search-wrapper input:focus {
        outline: 0;
        background: #fff;
    }
    .search-wrapper input::-webkit-input-placeholder {
        color: #c6c7c6;
        font-weight: normal;
    }
    .search-wrapper input:-moz-placeholder {
        color: #999;
        font-weight: normal;
        font-style: italic;
    }
    .search-wrapper input:-ms-input-placeholder {
        color: #999;
        font-weight: normal;
        font-style: italic;
    }

    /* Form submit button */
    .search-wrapper button {
        overflow: visible;
        position: relative;
        float: right;
        border: 0;
        padding: 0;
        cursor: pointer;
        height: 40px;
        width: 13%;
        font: bold 18px 'Arial', 'Tahoma';
        color: white;
        background: #c1c1c1;
        border-radius: 0 5px 5px 0;
        transition: all 2.0s linear;
        -webkit-transition: all 0.2s linear;
        -moz-transition: all 0.2s linear;
        -ms-transition: all 0.2s linear;
        -o-transition: all 0.2s linear;
    }

    .search-wrapper button:hover{
        background: #5cc924;
        transition: all 2.0s linear;
        -webkit-transition: all 0.2s linear;
        -moz-transition: all 0.2s linear;
        -ms-transition: all 0.2s linear;
        -o-transition: all 0.2s linear;
    }

    .search-wrapper button:active,
    .search-wrapper button:focus{
        background: #329400;
        outline: 0;
        transition: all 0s linear;
        -webkit-transition: all 0s linear;
        -moz-transition: all 0s linear;
        -ms-transition: all 0s linear;
        -o-transition: all 0s linear;
    }

    .search-wrapper button:hover:before{
        border-right-color: #e54040;
    }

    .search-wrapper button:focus:before,
    .search-wrapper button:active:before{
        border-right-color: #c42f2f;
    }
    .search-wrapper button::-moz-focus-inner { /* remove extra button spacing for Mozilla Firefox */
        border: 0;
        padding: 0;
    }
</style>
<script>
    $(document).ready(function(){
        $(".search-wrapper input").mouseenter(function(){
            $(".search-wrapper button").css("background-color", "#4aba10");


        });
        $(".search-wrapper input").mouseout(function(){
            $(".search-wrapper button").css("background-color", "" );
        });
    });
</script>

<form name="srch_sample_f" method="get" action="{{Request::url()}}" no-error-return-url="true"
      class="search-wrapper cf">
    {{--<input type="hidden" name=cate1 value="{!! Request::input('cate1') !!}" />
    <input type="hidden" name=cate2 value="{!! Request::input('cate2') !!}" />--}}
    <input type=text name="q" value="<?=htmlspecialchars(stripslashes(Request::input('q')))?>"
           placeholder="검색" maxlength="80" />
    <button type=submit id="btn_srch_sample" style="" alt="검색" title="검색" >
        <i class="fa fa-search"></i>
    </button>
</form>
{{-- 검색부분 끝 --}}


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

    }
</style>

    <div class="row text-center" style="padding:0 10px 10px 10px;">
        <div class="">
            <div class="col-sm-6" style="white-space:normal;">
                <div class="bigbox">
                <h4>참가중인 소송{{--<small>+등록</small>--}}</h4>

                @if (empty($wave_client))
                    <div class="col-sm-12">
                        진행중 소송이 없습니다.
                    </div>
                @else
                    <div style="text-align:center ;margin:15px;">
                        상세 내용을 보시려면 클릭해주세요.
                    </div>
                    @foreach ($wave_client as $key=> $waveclient)
                        <div class="col-sm-12" style="text-align:left ;margin-bottom:15px;">

                            <a class="btn btn-lg btn-default" href="/wave/mypage/<?=$waveclient['id']?>">
                                <?=($key+1)?>. <?=$my_suits[$key]['title']?> - <?=$waveclient['name']?>
                            </a>

                        </div>
                    @endforeach


                @endif
                </div>
            </div>

            <div class="col-sm-6" style="white-space:normal;">
                <div class="bigbox">

                    {{--forum 글 읽어오기--}}
                    <h4>1차 환급 프로보노</h4>
                    <div id="category" class="text-left " style="margin-left:25px;">

                        <p>
                        2016. 8. 19. 100명 환급대상자 선정하였습니다. 상세 상황실에 들어가시면 확인가능합니다. 환급절차는 순차적으로 진행됩니다.
                            <small style="color:gray">(공지사항에 적힌 리스트가 확정본입니다. 프로그램 오류가 있을 수 있으니 많은 양해 바랍니다)</small>
                            감사합니다.
                        </p>
                        <p>
                            <a href="mms://wm-005.cafe24.com/boonzero/wave/event/probono-event1-20160818-1.wmv">선정절차 확인(동영상1)</a>
                            <a href="mms://wm-005.cafe24.com/boonzero/wave/event/probono-event1-20160818-2.wmv">(동영상2)</a>
                        </p>
                        {{--<video src="mms://wm-005.cafe24.com/boonzero/wave/event/probono-event-20160818.wmv"></video>
                        <embed src="mms://wm-005.cafe24.com/boonzero/probono-event-20160818.wmv"></embed>--}}


                        <div class="text-right" style="margin:10px;">

                        </div>
                    </div>
                </div>
                <div class="bigbox">

                    {{--forum 글 읽어오기--}}
                    <h4>응원게시판</h4>
                    <div id="category" class="text-left " style="margin-left:25px;">
                        <ul>
                            @foreach($forum_threads as $categori)
                                <li>
                                    <a href="/forum/{{ $categori->category_id }}/{{ $categori->id }}">{{ $categori->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="text-right" style="margin:10px;">
                            <a class="btn btn-xs btn-default" href="/forum/7/thread/create?category_slug=응원게시판">쓰기</a>
                        </div>
                    </div>
                </div>



            </div>
        </div>

</div>


@if(isset($chk_payment))
    <div class="well bg-warning">
    <h4>비용 미입금 상태</h4>  (입금확인은 일괄적으로 진행하니 조금 기다려주세요)
    <p>입금계좌 : <b style="font-size:1.2em;">신한 100-029-697933 법무법인 예율</b></p>
    </div>
@endif

<div class="well bg-warning">
    <h4>이용안내</h4>
    <p>
        <b style="font-size:1.2em;">은행계좌번호 관련</b>  신청서 상 은행계좌는 1~2년 후 승소판결금을 입금해드리기 위해 필요합니다.
        따라서 신청서에는 비워두셨다가 1년 내에만 계좌번호를 입력해주셔도 됩니다.
    </p>
    <p>
        <b style="font-size:1.2em;">증거자료 업로드 관련</b> 업로드 오류시 하단 메일로 내용을 보내주세요. 빠르게 수정하겠습니다.
        이메일로 증거자료를 보내시면 시스템에 반영되지 않습니다. 유의바랍니다.
    </p>
    {{--<p>
        <b style="font-size:1.2em;">주민등록관련</b> : 소장 접수 후 생년월일을 제외한 자료를 모두 파기조치할 예정입니다.
    </p>--}}
    <p>사이트 오류신고 : <b style="font-size:1.2em;">help@moior.com</b></p>
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