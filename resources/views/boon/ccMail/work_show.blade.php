<?php use App\Lib\skHelper; ?>
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

@section('title', '분쟁제로 - 내용증명')

@section('sidebar')
    @parent

    <p>내용증명</p>

@stop

@section('content')


<link rel="stylesheet" href="{{URL::asset('/css/boon/ccMail.css')}}">
<script>
$(document).ready(function(){
    /*입력버튼 눌렀을때. xxxx 그냥 하나하나 눌렀을때 자동저장하자! 앱처럼*/
    $( '#form-내용증명' ).on( 'submit', function() {

        /*$.post(
                $( this ).prop( 'action' ),
                {
                    "_token": $( this ).find( 'input[name=_token]' ).val(),
                    "setting_name": $( '#setting_name' ).val(),
                    "setting_value": $( '#setting_value' ).val()
                },
                function( data ) {
                    alert(data);
                    //do something with data/response returned by server
                },
                'json'
        );*/

        //.....
        //do anything else you might want to do
        //.....

        //prevent the form from actually submitting in browser
        //return false;
    } );


    $("#btn-ccmail-save").click(function(){
        $.post(
                $( this ).prop( 'action' ),
                {
                    "_token": $( this ).find( 'input[name=_token]' ).val(),
                    "setting_name": $( '#setting_name' ).val(),
                    "setting_value": $( '#setting_value' ).val()
                },
                function( data ) {
                    //do something with data/response returned by server
                },
                'json'
        );
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
        content: " "; // 상단 현재위치(breadcrumb) 특정슬래시 없애기. 공백이면안됨
    }
    .ccmail-content {min-height:300px;}
</style>


{{--세부페이지 네비바--}}
<ol class="breadcrumb">
    <li><a href="{{ URL::to('ccmail/work') }}">
            <span class="glyphicon glyphicon-list" aria-hidden="true"></span> 전체</a></li>

    <li class="active">{{ $ccMail->id }}</li>

    <li style="" class="pull-right">{{--이전 샘플 / 다음 샘플--}}
        <span class="btn btn-xs btn-default btnPrev glyphicon glyphicon-menu-left" aria-hidden="true"></span>
        <span class="btn btn-xs btn-default btnNext glyphicon glyphicon-menu-right" aria-hidden="true"></span>

    </li>

</ol>
{{--    <div class="corner-ribbon top-left sticky red shadow">New</div>
    <div class="corner-ribbon top-right sticky blue">Updated</div>
    <div class="corner-ribbon bottom-left sticky orange">Popular</div>
    <div class="corner-ribbon bottom-right sticky green shadow">Hello</div>

    <h1>Corner Ribbons</h1>
    <h2>(with custom settings and all...)</h2>--}}


<div class="">{{--내용증명 리스트 간략 박스형태--}}
    <div class="row">

        <div class="panel panel-default divCcMailBox ribon_new">


            <div class="panel-heading">

                    <div class="row text-center">

                        <h1>내 용 증 명</h1>
                        <p class="text-info"></p>



                    </div>

            </div>

            <?php
            $post_amt = array(4000, 12000, 64900, 97900);
            //                 4400 33000 97900 195800
            $post_silbi = 4500;
            ?>
            <style>
                #div_ccmail_pay_amount {border-top:0px solid tomato;box-shadow: 6px 0px 5px -5px #999, -6px 0px 5px -5px #999;}
                #div_post_type_wrap {background-color:#efefef;overflow-x:scroll;white-space: nowrap;}
                .div_ccmail_type {margin:5px;display: inline-block;}
                .btn_post_type {margin:10px 0px 10px 0px;padding:10px;text-align:left;cursor:pointer;}
                .btn_post_type:hover {}
                .btn_post_pay {clear:both;padding:20px 0px 20px 0px;text-align:center;cursor:pointer;}
                .btn_post_pay:hover {}
                .txt_money {color:tomato;font:bold 2.0em}
                .txt_post_pay_amt {margin:20px 0px 30px 0px;font-size:2.0em;color:#f05634;letter-spacing:-2px;font-weight:800;}
                .btn_post_title {font-size:1.4em;color:#504b49;letter-spacing:-2px;font-weight:600;}
                #btn접수하기 {text-align:center; padding:11px 0;border:0px;font-size:1.4em;background-color:#ed1b23;color:#fff;letter-spacing:-2px;font-weight:600;}
                #btn포인트구매 {display:none;text-align:center; padding:11px 0;border:0px;font-size:1.3em;background-color:tomato;color:#fff;letter-spacing:-2px;font-weight:600;}
                #btn포인트사용 {display:none;text-align:center; padding:11px 0;border:0px;font-size:1.3em;background-color:#2e6da4;color:#fff;letter-spacing:-2px;font-weight:600;}
                .small {margin-bottom:10px;font-size:0.9em;color:#888;letter-spacing:-1px;font-weight:300;}
                .small2 {margin:0px 0px 10px 0px;font-size:1.2em;color:#555555;letter-spacing:-1px;font-weight:400;}
                .btn_post_blue {text-align:center;width:150px; background-color:#14abc0;color:#fff;font-size:1.2em;padding:4px;letter-spacing:-1px;}


                /* Post Title list */
                #post_preview_wrap {clear:both;max-width:500px;margin:40px auto;padding:10px;}
                #post_wrap		{margin:0px auto;width:100%;padding-top:40px;}
                #post_preview	{overflow:hidden;border:1px solid #e1e1e1;border-radius:5px;background-color:#efefef;padding:10px;margin:0px auto;background-color:#ffffff;}
                #post_preview .post_title {max-width:600px;font-weight:bold;font-size:1.2em;}
                #post_preview .post_content {margin-left:20px;}
                #post_preview .c {text-align:center;}
                #post_preview .r {text-align:right;}

                #preview_top		{height:70px;background:url('/img/v1/post_top.png') no-repeat;background-size:contain;}
                #preview_cen		{height:260px;background:url('/img/v1/post_cen.png') no-repeat;background-size:contain;        margin-left:30px;}
                #preview_btm		{height:90px;background:url('/img/v1/post_btm.png') no-repeat;background-size:contain;box-shadow:none;border:0px solid gray;}
                #preview_btm2		{height:50px;background:url('/img/v1/post_btm2.png') no-repeat;background-size:contain;box-shadow:none;border:0px solid gray;}

                #preview_title		{padding:20px 20px;font:bold 2em '맑은 고딕';}
                #preview_sender		{padding:0 20px;}
                #preview_receiver	{padding:0 20px;}
                #preview_clname		{padding:0 20px;}
                #preview_claddr		{padding:0 20px;}
                #preview_clhp		{padding:0 20px;}
                #preview_defenname	{padding:0 20px;}
                #preview_defenaddr	{padding:0 20px;}
                #preview_defenhp	{padding:0 20px;}
                #preview_subject	{padding:10px 10px 0 10px;}
                #preview_content	{padding:20px 0px;}
                #preview_date		{text-align:center;padding:20px;}
                #preview_signature	{padding-right:130px;text-align:right;}

                #work_icon1 {margin-top:-100px;height:100px;background:url('/img/v1/post_readingglasses.png') no-repeat;background-size:100px;background-position-y:5%;background-position-x:97%;}
                #work_icon2 {margin-top:-220px;height:200px;background:url('/img/v1/post_edit_pencel.jpg') no-repeat;background-size:100px;background-position-y:5%;background-position-x:97%;}

                #type3_txt1 {color:red;margin-top:0px;padding:0 20px 0 40px;display:none;}
                #type4_txt1 {color:red;margin-top:20px;padding:0 20px 0 40px;display:none;}


            </style>
<script>
$(document).ready(function(){

    var flag_clicked_btn = 0;
    var flag_clicking_btn = 0;
    $(".btn_post_type").click(function(){
        reset_btn_post_type($(".btn_post_type"));
        $("#preview_top, #preview_cen, #preview_btm, #preview_btm2").show();
        $("#preview_top").css("background-url", "/sangdam/images/post_top.png");
        $("#preview_cen").css("background-url", "/sangdam/images/post_cen.png");
        $("#preview_btm").css("background-url", "/sangdam/images/post_btm.png");
        $("#preview_btm").css("background-url", "/sangdam/images/post_btm2.png");
        $("#type3_txt1, #type4_txt1").hide();

        $(".work_icon").hide();

        if( $(this).attr("id") == "btn_post_type1" ){
            flag_clicking_btn = 1; // 1번 클릭한 것으로 만들어
        }else if( $(this).attr("id") == "btn_post_type2" ){
            flag_clicking_btn = 2; // 2번 클릭한 것으로 만들어
            if( flag_clicked_btn == 2) flag_clicking_btn = 1; //하지만 2번 누른상태서 2번누르면 1번 클릭상태로 만들어
        }else if( $(this).attr("id") == "btn_post_type3" ){
            flag_clicking_btn = 3; // 3번 클릭한 것으로 만들어
            if( flag_clicked_btn == 3) flag_clicking_btn = 2;
        }else if( $(this).attr("id") == "btn_post_type4" ){
            flag_clicking_btn = 4;
            if( flag_clicked_btn == 4) flag_clicking_btn = 3;
        }
        //a(flag_clicked_btn + ' - ' + flag_clicking_btn);
        if( flag_clicking_btn == 1 ){
            flag_clicked_btn = 1;
            $("#preview_top, #preview_cen, #preview_btm, #preview_btm2").hide();
            $("input[name=consult_cate]").val("[내용증명]발송대행");
            $("input[name=goodname]").val("내용증명 발송대행");
            change_btn_post_type($("#btn_post_type1"));
        }else if( flag_clicking_btn == 2 ){
            flag_clicked_btn = 2;
            $("#preview_btm").hide();
            $("#work_icon1").show();
            $("input[name=consult_cate]").val("[내용증명]법인명의");
            $("input[name=goodname]").val("내용증명 법인발송");
            change_btn_post_type($("#btn_post_type1"));
            change_btn_post_type($("#btn_post_type2"));
        }else if( flag_clicking_btn == 3 ){
            flag_clicked_btn = 3;
            $("#work_icon1, #work_icon2").show();
            change_btn_post_type($("#btn_post_type1"));
            change_btn_post_type($("#btn_post_type2"));
            change_btn_post_type($("#btn_post_type3"));
            $("input[name=consult_cate]").val("[내용증명]내용검토");
            $("input[name=goodname]").val("내용증명 변호사검토");
            $("#type3_txt1").show();
        }else if( flag_clicking_btn == 4 ){
            flag_clicked_btn = 4;
            $("#work_icon1, #work_icon2").show();
            change_btn_post_type($("#btn_post_type1"));
            change_btn_post_type($("#btn_post_type2"));
            change_btn_post_type($("#btn_post_type3"));
            change_btn_post_type($("#btn_post_type4"));
            $("input[name=consult_cate]").val("[내용증명]상대방통화");
            $("input[name=goodname]").val("담당변호사 내용증명");
            $("#type3_txt1, #type4_txt1").show();
        }
        //change_btn_post_type($(this));
        calculate_charge_amt($("#btn_post_type" + flag_clicking_btn));

        $("#btn접수하기").show()
        $("#btn접수wrap, #btn포인트사용, #btn포인트구매").hide();
    });
    $("#btn_post_type2").click(); //기본
    $("#div_post_type_wrap").scrollLeft(100);

})
function change_btn_post_type(obj){
    //obj.css("border", "1px solid gold");
    obj.css("background-color", "#fedf65").css("color","darkblue");
}
function reset_btn_post_type(obj){
    //obj.css("border", "0px solid gold");
    obj.css("background-color", "#fff").css("color","black");
}
function calculate_charge_amt(obj){
    var amt = 0;
    if( obj.attr("id") == "btn_post_type1" ){
        amt = <?=$post_amt[0]?>; //amt = 4000; 세후 4400
    }else if( obj.attr("id") == "btn_post_type2" ){
        amt = <?=($post_amt[0]+$post_amt[1])?>; //amt = 30000; 세후 33000
    }else if( obj.attr("id") == "btn_post_type3" ){
        amt = <?=($post_amt[0]+$post_amt[1]+$post_amt[2])?>; //amt = 89000; 세후 97900
    }else if( obj.attr("id") == "btn_post_type4" ){
        amt = <?=($post_amt[0]+$post_amt[1]+$post_amt[2]+$post_amt[3])?>; //amt = 178000; 세후 195800
    }
    amt = Math.floor(amt * 1.1/100)*100;
    amt = amt + <?=$post_silbi?>;
    $("input[name=price_sum]").val(amt);
    if(!amt){
        $(".txt_free").html(" 무료! (실비)");
    } //실비안내!

    $(".txt_post_pay_amt").html("<span class='txt_money'>"+number_format(amt)+"</span>");
}

</script>
            <script src="/lib/common.sk.js"></script>
            <!-- 발송신청버튼 배너 -->
            <div class="row-fluid">
                <div id="div_post_type_wrap" class="col-sm-9">

                    <div class="div_ccmail_type" id="div_post_type3">
                        <div id="btn_post_type1" class="btn_post_type">
                            {{--<div class="btn_post_title"><img src="/img/v1/btn_ccmail_01.png"></div>--}}
                            <div class="btn_post_title">발송대행</div>
						    <div class="small2"><?=number_format($post_amt[0])?>원<span class=txt_free></span></div>
						    <div class="small">우체국을 직접 가지 않고,<br />실비용 결제로 간단히 발송</div>

						    <div class="btn_post_blue">선택후 미리보기</div>
                        </div>
                    </div>

                    <div class="div_ccmail_type" id="div_post_type4">
                        <div id="btn_post_type2" class="btn_post_type">
                            {{--<div class="btn_post_title"><img src="/img/v1/btn_ccmail_02.png"></div>--}}
                            <div class="btn_post_title">법무법인 명의 발송</div>
						    <div class="small2">+<?=number_format($post_amt[1])?>원</div>
						    <div class="small">법무법인 고퀄리티 서식에 <br />공신력을 담아 안전하게 발송대행</div>
						    <div class="btn_post_blue">선택후 미리보기</div>
                        </div>
                    </div>

                    <div class="div_ccmail_type" id="div_post_type5">
                        <div id="btn_post_type3" class="btn_post_type">
                            {{--<div class="btn_post_title"><img src="/img/v1/btn_ccmail_03.png"></div>--}}
                            <div class="btn_post_title">변호사 직접 작성</div>
						    <div class="small2">+<?=number_format($post_amt[2])?>원</div>
						    <div class="small">
                                내용을 <b>법률요건</b>에 맞추고 <b>불리한 내용</b>은 빼고 다듬어<br />
                                실제 소송 완벽대비 & 담당변호사의 위엄있는 문장</div>
						    <div class="btn_post_blue">선택후 미리보기</div>
                        </div>
                    </div>

                    <div class="div_ccmail_type" id="div_post_type6">
                        <div id="btn_post_type4" class="btn_post_type">
                            {{--<div class="btn_post_title"><img src="/img/v1/btn_ccmail_04.png"></div>--}}
                            <div class="btn_post_title">담당변호사 전화 설득</div>
						    <div class="small2">+<?=number_format($post_amt[3])?>원</div>
						    <div class="small">변호사가 사건을 이해한 후, 상대방과 무게있는 설득 시도.
						    <br />곧 시작될 <b>소송의 피로함을 설명</b>하여 사건을 조기해결</div>
						    <div class="btn_post_blue">선택후 미리보기</div>
                        </div>
                    </div>
                </div>
                <div id="div_ccmail_pay_amount" class="col-sm-3">
                    <div class="btn_post_pay" >
                        <div class="text-center">최종 <small>실비, VAT포함</small></div>
                        <div class="txt_post_pay_amt"><span class="">원</span></div>
                        <div id="btn접수하기" >접수하기</div>
                        <div id="btn접수wrap" style="display:none;">

                            <div id="btn포인트구매" class="">포인트 충전</div>
                            <div id="btn포인트사용" class="" data-toggle="modal" data-target="#modal신청확인">포인트 사용</div>

                        </div>


                    </div>
                </div>

            </div>


            <script>
                $(document).ready(function(){

                    $("#btn접수하기").click(function(){
                        $(this).hide();
                        $("#btn접수wrap").show();
                        var boon_now = '<?=Auth::user()->boonStatus->boon?>';
                        var boon_need = $("input[name=price_sum]").val()

                        if( boon_now * 1 > boon_need * 1 ){ //강제형변환
                            $("#btn포인트사용").show();
                        }else{
                            alert('포인트가 부족합니다. 현재 포인트는 ' + boon_now + '입니다.');
                            $("#btn포인트구매").show();
                        }
                    });

                    $("#btn포인트구매").click(function(){
                        location.href='/boon/status';
                    });


                    /*임의금액 결제할 때*/
                    $("#btnChangeCharge").click(function(){
                        $("#price_sum").val( $(this).prev().val() );
                        $('#total_charge_content').text( number_format($(this).prev().val()) );
                        $(this).parent().hide();
                    });
                });
            </script>
            <?php
            $sms_memo = "모든 진행과정은 웹에서 확인가능합니다. 내용 검토 후 이상있는 경우 유선 연락드리겠습니다. 감사합니다.";
            $txt_type = "내용증명";
            ?>
            <form>
                <input type=hidden name="price_sum" id="price_sum" value="" />
                <input type=hidden name="good_name" id=good_name value="<?=$txt_type?>" />
                <input type=hidden name="sms_memo" id=sms_memo value="<?=$sms_memo?>" />
                <input type=hidden name="sender_phone" id=sender_phone value="<?=$ccMail['sender_phone']?>" />

                <input type=hidden name="work_id" id="work_id" value="<?=$ccMail->id?>" />
            </form>






            <div style="cursor:pointer;clear:both;margin-top:20px;" class="text-center" onclick="$('#div내용증명비교표').toggle();">
                &nbsp; <br/>상품 비교표 ▼
            </div>
            <div id="div내용증명비교표" style="display:none;">
                <table class="table text-center">
                    <tr>
                        <th></th>
                        <th>발송대행</th>
                        <th>법인명의</th>
                        <th>변호사 작성</th>
                        <th>전화 설득</th>
                    </tr>
                    <tr>
                        <td>비용(만원)</td>
                        <td>약1</td>
                        <td>약2.2</td>
                        <td>약9.5</td>
                        <td>약20</td>
                    </tr>

                    <tr>
                        <td>우체국 방문접수</td>
                        <td>O</td>
                        <td>O</td>
                        <td>O</td>
                        <td>O</td>
                    </tr>
                    <tr>
                        <td>요금(약5천원)</td>
                        <td>O</td>
                        <td>O</td>
                        <td>O</td>
                        <td>O</td>
                    </tr>
                    <tr>
                        <td>내용증명 3부 제작</td>
                        <td>O</td>
                        <td>O</td>
                        <td>O</td>
                        <td>O</td>
                    </tr>
                    <tr>
                        <td>접수 후 고화질 스캔</td>
                        <td>O</td>
                        <td>O</td>
                        <td>O</td>
                        <td>O</td>
                    </tr>
                    <tr>
                        <td>줄간격 등 기본서식 수정</td>
                        <td>O</td>
                        <td>O</td>
                        <td>O</td>
                        <td>O</td>
                    </tr>
                    <tr>
                        <td>법률용어 및 문장 기본 수정</td>
                        <td>-</td>
                        <td>O</td>
                        <td>O</td>
                        <td>O</td>
                    </tr>
                    <tr>
                        <td>법무법인 전용 용지</td>
                        <td>-</td>
                        <td>O</td>
                        <td>O</td>
                        <td>O</td>
                    </tr>
                    <tr>
                        <td>변호사 사건검토</td>
                        <td>-</td>
                        <td>-</td>
                        <td>O</td>
                        <td>O</td>
                    </tr>
                    <tr>
                        <td>법률요건 검토/적용</td>
                        <td>-</td>
                        <td>-</td>
                        <td>O</td>
                        <td>O</td>
                    </tr>
                    <tr>
                        <td>소송시 유불리 검토</td>
                        <td>-</td>
                        <td>-</td>
                        <td>O</td>
                        <td>O</td>
                    </tr>
                    <tr>
                        <td>상대방과 직접 통화 및 설득</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>O</td>
                    </tr>
                    <tr>
                        <td>통화보고 및 향후 전략</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>O</td>
                    </tr>
                </table>
            </div>


            <div class="panel-body">
                <!--  미리보기 -->
                <div id="post_preview_wrap" class="" >


                    <div id="post_preview">
                        <?php

                        $consult = $ccMail;

                        ?>
                        <div class='text-center' style="color:royalblue;">※ 미리보기 화면입니다. 실제 더 정돈된 형태로 발송합니다 ※</div>
                        <div class='post_title c' id="preview_top"></div>
                        <div class='post_title c' id="preview_title">
                            내용증명
                        </div>
                        <div class=''>
                            <div class='post_title' id="preview_sender">발신인</div>
                            <div class='post_content' id="preview_clname"><?=$consult['sender_name']?></div>
                            <div class='post_content' id="preview_claddr"><?=$consult['sender_addr']?></div>
                            <div class='post_content' id="preview_clhp"><?=skHelper::tel_html($consult['sender_phone'])?></div>

                            <div id='type3_txt1'> 발신인의 대리인 <b>법무법인 예율</b>
                                <div style="margin-left:30px;">서울시 강남구 테헤란로 207<br />
                                    변호사 OOO</div>
                            </div>

                        </div>
                        <div class=''>
                            <div class='post_title' id="preview_receiver">수신인</div>
                            <div class='post_content' id="preview_defenname"><?=$consult['receiver_name']?></div>
                            <div class='post_content' id="preview_defenaddr"><?=$consult['receiver_addr']?></div>
                            <div class='post_content' id="preview_defenhp"><?=skHelper::tel_html($consult['receiver_phone'])?></div>
                            <div class="work_icon" id="work_icon2"></div>
                        </div>
                        <div class='post_title c' id="preview_cen___"></div>
                        <div class='post_title' id="preview_subject">
                             <div class='post_content'><?=$consult['title']?></div>
						</div>




                        <div style="position:relative;">
                            <div class='post_content' id="preview_content"><?=nl2br(htmlspecialchars($consult['content']))?></div>
                            <div class="work_icon" id="work_icon1"></div>



                            <div id='type4_txt1'>
                                *. 일전에 통화하였던 담당변호사입니다.
                                부디 소송으로 발전되는 일 없이 이것으로 원만한 해결을 보았으면 하는 바람입니다.
                                감사합니다. 이상.
                            </div>
                        </div>

                        <div class='' id="preview_date"><?=date('Y년 m월 d일')?></div>
                        <div class='' id="preview_signature"><?=$consult['sender_name']?></div>
                        <div class='post_title c' id="preview_btm"></div>
                        <div class='post_title c' id="preview_btm2"></div>


                    </div>
                </div>
                <!-- 미리보기 // -->

            </div>








            <div class="panel-footer">
                {{--<span>{{ $ccMail->create_id }}</span>--}}

                <button type="button" class="btn btn-sm btn-default" data-toggle="modal" data-target="#confirmDelete">삭제</button>

                <a class="pull-right btn btn-sm btn-default" href="{{ URL::to('ccmail/work/' . $ccMail->id . '/edit') }}">수정</a>

            </div>



        </div>

    </div>
</div>

<div class="modal fade" id="modal신청확인" tabindex="-1" role="dialog" aria-labelledby="신청확인">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">신청확인</h4>
            </div>
            <div class="modal-body">

                <p>내용증명 발송을 신청합니다.</p>

                <p>※ 발송 시각 안내</p>
                <ul style="margin-left:30px;">
                <li>
                    <h5>발송대행, 법인명의발송의 경우</h5>
                    <p style="font-size:;"><b>오전2시 이전</b> 접수시 통상 당일 발송가능합니다. </p>
                </li>
                <li>
                    <h5>변호사작성 이상의 경우</h5>
                    <p style="font-size:;">담당 변호사님과 내용에 대하여 통화한 이후 발송됩니다.
                        <b>당일 또는 다음날</b> 적어주신 휴대폰으로 연락드립니다.
                        <small>재판일정이 있어 바로 전화드리기 어려운 점 양해바랍니다.</small></p>
                </li>
                </ul>



            </div>
            <div class="modal-footer">

                {{--{!! BootForm::open(['method' => 'POST', 'action' => 'SmsController@sendSms']) !!}--}}
                {!! BootForm::open(['method' => 'POST'])->action('/request')->id('form최종신청') !!}
                {!! BootForm::hidden('to')->value( '01047750852' ) !!} {{--회사 담당자 전번--}}
                {!! BootForm::hidden('from')->value( $ccMail->sender_phone ) !!} {{--의뢰인 전번--}}
                {!! BootForm::hidden('text')->value('입금하였습니다.') !!}

                <button type="button" class="btn btn-default" data-dismiss="modal">닫기</button>
                <button type="button" class="btn btn-primary" onclick="$('#form최종신청').submit()">신청</button>
                {!! BootForm::close() !!}
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-labelledby="confirmDelete">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">삭제</h4>
            </div>
            <div class="modal-body">
                <p>{{ $ccMail->id }}번 / 삭제합니다.</p>
            </div>
            <div class="modal-footer">
                <form method="post" action="/ccmail/work/{{$ccMail->id}}" class="pull-right">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token()  }}">
                    <button type="button" class="btn btn-default" data-dismiss="modal">취소</button>
                    <button type="submit" class="btn btn-primary">삭제</button>
                </form>
            </div>
        </div>
    </div>
</div>

@stop


    {{--@if ($ccMail->done == 1)
    <span style="text-decoration: line-through;">
    @endif--}}
    {{--@if ($ccMail->done == 1)
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
