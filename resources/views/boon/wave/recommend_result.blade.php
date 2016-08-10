<?php use App\Lib\sk; ?>
{{--위에꺼 지우고 자동로드하고 싶은데, composor.json에
    "autoload": {
    "classmap": [
    "database"
    ],
    "psr-4": {
    "App\\": "app/"
    },
    "files": [
    "app/Lib/skHelper.php"
    ]
해도 안되네..--}}


@extends('layouts.master') {{--master를 상속받음--}}

@section('title', '집단소송 - 분제로')

@section('sidebar')
    @parent

    <p>권익지원단 </p>

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

        <div class="row p-b" style="margin-bottom:30px;background-color:white;">
            <div class="col-md-10 col-md-offset-1 ">
                <h2 class="fh5co-heading wow fadeInUp" data-wow-duration="1s" data-wow-delay="0">소비자 권리지킴이 활동</h2>
                <p></p>
                <p class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">

                </p>
                <div id="" style="display:block;">
                    <div class="col-sm-6">
                        <p>가. 미국식 집단소송제가 도입되기 전까지 국내에서 대기업들의 소비자에 대한 횡포는 지속될 것입니다.
                            <br><small>현재 이슈가 되는 사건들은 경험상 1년 후에는 거의 기억되지 않습니다.
                                이후 2년이 더 경과하면 시효가 완성되어 기업은 금전배상책임까지 없게됩니다.</small>
                        <p>나. 현재 소비자권리를 보호받는 방법은 단체소송이 가장 현실적입니다. 단체소송의 법리는 일반소송과 크게 다르지는 않습니다.
                            다만 수백~수천 소송인단을 이끌고 수년을 버티기가 힘들어 어느 로펌도 쉽게 시작하지 않을 뿐입니다.
                            <br /><br />힘을 보태 주십시오. <br />
                            법무법인 예율 단체소송팀과 함께 마땅히 누려야 할 소비자들의 권리를 지켜 주십시오.
                            긴 싸움에서 소송팀도 지치지 않도록 마음을 모아 주십시오.
                            <br>
                            <small>
                                ※ 예율은 소비자소송에서 얻은 수익을 소비자 권익운동에 활용합니다.
                                <a href="/wave/probono">활동 살펴보기</a>
                            </small>
                        </p>
                    </div>
                    <div class="col-sm-6">
                        <p>
                            아래 링크를 카카오톡/블로그/페이스북 등에 공유해 많은 분들이 소송에 참여할 수 있도록 독려해 주시기 바랍니다. <br><br>
                            적극적인 노력으로 다수의 소송 참여자를 모집한 분들께는 법무법인 예율에서 ‘소비자 권리지킴이’ 공로상을 수여할 예정입니다.
                            또한 모든 참여자분들께도 예율이 드릴 수 있는 최대한의 서비스를 제공드립니다. 감사합니다.
                            <br><small>※ 본 페이지에서 개인별 링크 활용내역을 확인할 수 있습니다.</small>

                            <script src="//developers.kakao.com/sdk/js/kakao.min.js"></script>
                            <?php
                            if(Auth::check()){
                            $kakao_link = 'http://boonzero.com/wave/0/recom/'.Auth::user()->id;
                            $txt_personal_link = 'http://boonzero.com/wave/0/recom/'.Auth::user()->id;
                            $txt_normal_link = 'http://boonzero.com/wave';
                            }else{
                            $kakao_link = 'http://boonzero.com/wave';
                            $txt_personal_link = '로그인 후 개인별링크 제공됩니다.';
                            $txt_normal_link = 'http://boonzero.com/wave';
                            }
                            $txt_suit_name = '소비자 권리찾기';
                            $txt_btn_name = '단체소송 살펴보기';
                            $src_image = 'http://wave.boonzero.com/img/wave/wave-main.png';
                            ?>


                            <div class="well">개인별 추천링크 <small>/ 이력확인이 가능합니다.</small><br>
                                <?=$txt_personal_link?>
                            </div>
                            <div class="well">
                                일반 링크 : <?=$txt_normal_link?>
                            </div>
                            <p>
                                <a id="kakao-link-btn" href="javascript:;">
                                    <img src="//dev.kakao.com/assets/img/about/logos/kakaolink/kakaolink_btn_medium.png"/>
                                </a>
                            </p>
                            <script type='text/javascript'>
                                //<![CDATA[
                                Kakao.init('fa482b7c7beafe607ce137cd563f02b5'); // // 사용할 앱의 JavaScript 키를 설정해 주세요.
                                Kakao.Link.createTalkLinkButton({ // // 카카오톡 링크 버튼을 생성합니다. 처음 한번만 호출하면 됩니다.
                                    container: '#kakao-link-btn',
                                    label: '<?=$txt_suit_name?>',
                                    image: {
                                        src: '<?=$src_image?>',
                                        width: '300',
                                        height: '184'
                                    },
                                    webButton: {
                                        text: '<?=$txt_btn_name?>',
                                        url: '<?=$kakao_link?>' // 앱 설정의 웹 플랫폼에 등록한 도메인의 URL이어야 합니다.
                                    }
                                });
                                //]]>
                            </script>
                        </p>
                    </div>

                </div>
            </div>
        </div>





    <div class="row text-center" style="padding:0 10px 10px 10px;">
        <div class="">
            <div class="col-sm-5" style="white-space:normal;">
                <div class="bigbox">
                <h4>방문자{{--<small>+등록</small>--}}</h4>
                    <table class="table table-bordered table-condensed">
                        <tr><th></th><th>IP</th><th>방문일</th></tr>
                        @foreach ($recommend_click as $key=> $recommend_val)
                            <tr>
                                <!--<td><?=$recommend_val->cate_number?></td>-->
                                <td><?=(1+$key)?></td>
                                <td><?=$recommend_val->ip_addr?></td>
                                <td><?=substr($recommend_val->created_at, 5, 11)?></td>
                                <?php


                                ?>

                            </tr>
                        @endforeach
                    </table>
                    {!! $recommend_click->render() !!}
                </div>
            </div>

            <div class="col-sm-7" style="white-space:normal;">
                <div class="bigbox">
                    <h4>신청서 작성자</h4>
                    <table class="table table-bordered table-condensed">
                        <tr><th></th><th>소송</th><th>성함</th><th>IP</th><th>접수일</th></tr>
                        @foreach ($recommend_join as $key=> $recommend_val)
                            <tr>
                                <td><?=(1+$key)?></td>
                                <td><?=$recommend_val->cate_number?></td>
                                <td><?=sk::hide_kname($recommend_val->name)?></td> {{--* 익명 처리해야--}}
                                <td><?=$recommend_val->ip_addr?></td>
                                <td><?=substr($recommend_val->user_created_at, 5, 11)?></td>
                                <?php


                                ?>

                            </tr>
                        @endforeach
                    </table>
                    {!! $recommend_join->render() !!}


                </div>
                <div class="bigbox">
                    <h4>실제 참여자</h4>
                    <table class="table table-bordered table-condensed">
                        <tr><th></th><th>소송</th><th>성함</th><th>IP</th><th>접수일</th></tr>
                        @foreach ($recommend_pay as $key=> $recommend_val)
                            <tr>
                                <td><?=(1+$key)?></td>
                                <td><?=$recommend_val->cate_number?></td>
                                <td><?=sk::hide_kname($recommend_val->name)?></td> {{--* 익명 처리해야--}}
                                <td><?=$recommend_val->ip_addr?></td>
                                <td><?=substr($recommend_val->created_at, 5, 11)?></td>
                                <?php


                                ?>

                            </tr>
                        @endforeach
                    </table>
                    {!! $recommend_pay->render() !!}


                </div>
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