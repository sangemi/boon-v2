@extends('layouts.master') {{--master를 상속받음--}}

@section('title', '집단소송 - 분제로')

@section('sidebar')
    @parent

    <p>공익활동 </p>

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
        <span class="glyphicon glyphicon-list" aria-hidden="true"></span> 상황실</a></li>

    {{--<li class="pull-right"><a href="{{ URL::to('wave/client/create') }}">
        <span class="btn btn-xs btn-default" aria-hidden="true">신규 <span class="fa fa-pencil"></span></span></a>
    </li>--}}


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
        outline: 0;  background: #fff;
    }
    .search-wrapper input::-webkit-input-placeholder {
        color: #c6c7c6;  font-weight: normal;
    }
    .search-wrapper input:-moz-placeholder {
        color: #999;  font-weight: normal;  font-style: italic;
    }
    .search-wrapper input:-ms-input-placeholder {
        color: #999;  font-weight: normal;  font-style: italic;
    }
    /* Form submit button */
    .search-wrapper button {
        overflow: visible;  position: relative;  float: right;
        border: 0;  padding: 0;  cursor: pointer;
        height: 40px;  width: 13%;
        font: bold 18px 'Arial', 'Tahoma';  color: white;
        background: #c1c1c1;  border-radius: 0 5px 5px 0;
        transition: all 2.0s linear;
        -webkit-transition: all 0.2s linear;  -moz-transition: all 0.2s linear;  -ms-transition: all 0.2s linear;  -o-transition: all 0.2s linear;
    }
    .search-wrapper button:hover{
        background: #5cc924;  transition: all 2.0s linear;
        -webkit-transition: all 0.2s linear;  -moz-transition: all 0.2s linear;  -ms-transition: all 0.2s linear;  -o-transition: all 0.2s linear;
    }
    .search-wrapper button:active,
    .search-wrapper button:focus{
        background: #329400;  outline: 0;  transition: all 0s linear;
        -webkit-transition: all 0s linear;  -moz-transition: all 0s linear;  -ms-transition: all 0s linear;  -o-transition: all 0s linear;
    }
    .search-wrapper button:hover:before{
        border-right-color: #e54040;
    }
    .search-wrapper button:focus:before,
    .search-wrapper button:active:before{
        border-right-color: #c42f2f;
    }
    .search-wrapper button::-moz-focus-inner { /* remove extra button spacing for Mozilla Firefox */
        border: 0;  padding: 0;
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
    h1 { color: #; }

    }
</style>

<div class="row" style="padding:0 10px 10px 10px;">
    <div class="">
        <h1>1. 소비자 권익증진기금 지원</h1>
        <blockquote class="">
            <h5>여러분이 내신 소송비용 일부는 소비자보호운동에 쓰여집니다.</h5>
        </blockquote>

        <div class="col-sm-5  text-center" style="height:250px;background-repeat:no-repeat;background-image:url('/img/wave/wave-probono-1.jpg');background-size:contain;">
            {{--<br />
            <b>2016. 소비자 권익증진지금</b>--}}
        </div>
        <div class="col-sm-7" style="">
            <p>
                소비자권익을 찾기 위한 소비자보호운동은 헌법에서도 명시적으로 규정되어 있습니다.

                <blockquote>
                    <b>헌법 제 124조</b>
                    <p>국가는 건전한 소비행위를 계도하고 생산품의 품질향상을 촉구하기 위한 소비자보호운동을 법률이 정하는 바에 의하여 보장 한다</p>
                </blockquote>
                <p></p> 대부분의 국민들은 ‘소비자보호운동’이 헌법에 명시될 정도로 중요한 ‘권리’임을 알지 못합니다.

                <p>2016년 '소비자기본법'을 통해서 제정되는 본 기금은,
                1. 소비자들의 권리의식을 고취
                2. 소비자주권의식의 함양
                등을 실질적으로 이루어 내는 것을 목적으로 합니다.</p>

                <p>현재까지 소비자단체는 재정자립도가 낮고 ‘생계형’으로 운영하며 제목소리를 내지 못해 예산다툼만을 하게 되는 기형적 구조로 운영되어 왔기 때문에,
                공정거래위원회가 주도하여 기금구축에 나서게 된 것입니다.</p>

                <p>법무법인 예율은 소비자주권을 이루어내기 위해서 소비자 권익증진기금에 매출의 1%이상을 후원합니다.
                작은 행동을 통해 소비자주권 회복에 일조하겠습니다.</p>
            <p>
                <b>관련뉴스</b>
                <ul style="margin-left:20px;">
                    <li><a href="http://www.sobilife.com/news/articleView.html?idxno=5725" target="_blank">'소비자권익증진기금조성' 소비자운동의 전기로 삼자!</a> <small>2014</small></li>
                    <li><a href="http://www.nocutnews.co.kr/news/4602771" target="_blank">소비자권익증진기금 신설 담은 '소비자기본법' 입법예고</a> <small>2016.6.</small></li>
                    <li><a href="http://biz.chosun.com/site/data/html_dir/2016/06/04/2016060400024.html" target="_blank">기업 상대 소송 등 지원하는 소비자권익증진 기금 신설</a> <small>2015</small></li>
                    <li><a href="http://www.ebn.co.kr/news/view/833944" target="_blank">소비자 피해구제 ‘소비자권익증진기금’ 신설된다</a> <small>2016.6.</small></li>
                    <li><a href="http://www.consumernews.co.kr/?mod=news&act=articleView&idxno=511398" target="_blank">소비자 집단 소송, 징벌적 손해배상 '까마득'</a> <small>2016.6.</small></li>
                    {{--<li><a href="" target="_blank"></a> <small>2016.6.</small></li>--}}
                </ul>

            </p>

        </div>
    </div>
</div>


<div class="row" style="padding:0 10px 10px 10px;">
    <div class="">
        <h1>2. 소송비용 직접 지원</h1>
        <blockquote class="">
            <h5>납부하신 착수금을 환급드립니다. 돌려받으신 금원은 소비자권익운동에 써주세요.</h5>
        </blockquote>

        <div class="col-sm-5  text-center" style="height:250px;background-repeat:no-repeat;background-image:url('/img/wave/wave-probono-2.jpg');background-size:contain;">
            {{--<br />
            <b>2016. 소비자 권익증진지금</b>--}}
        </div>
        <div class="col-sm-7" style="">
            <p>
                변호사비용의 부담으로 소송절차를 홀로 진행하는 경우가 80%가 넘습니다.
                집단소송비용은 비교적 저렴하나, 그것마저 부담일 수 있습니다.

                <blockquote>
                    {{--억울합니다. 손해만 보고 피해를 보상받을지도 확실히 모르는데 소송비용을 또 내야합니까.--}}
                    분쟁제로에서 진행하는 모든 소송에 대해서, 소송인단이 1000명일때마다 그 중 100명의 소송비용을 환급드리겠습니다.
                </blockquote>
            </p>
            <p></p>

            <p>
                법무법인 예율은 집단소송으로 인한 이익의 일부를 소비자주권 성장에 아낌없이 쓰도록 하겠습니다.
                <small>※ 환급명단은 공지 및 개별로 알려드립니다.</small>
            </p>
            <p>
                <b>관련뉴스</b>
                <ul style="margin-left:20px;">
                    <li><a href="http://www.asiae.co.kr/news/view.htm?idxno=2014040712223260616" target="_blank">겁나는 변호사 수임료, 소액사건 ‘나홀로 소송’ 는다</a> <small>2014.4.</small></li>
                    <li><a href="http://news1.kr/articles/?1836953" target="_blank">민사 소액사건 '나홀로 소송' 82%…변호사 비용 부담 때문</a> <small>2014.8.</small></li>
                    <li><a href="http://shindonga.donga.com/3/all/13/110512/2" target="_blank">집단소송은 변호사 배만 불린다?</a> <small>2011.9.</small></li>

                </ul>

            </p>
        </div>
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