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
            <a class="navbar-brand" href="{{ URL::to('boon/list') }}">BOON</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('boon/status') }}">충전</a></li>
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

    {{--리스트 형태--}}

    <div class="container">
        <div class="jumbotron">
            <h1>분노 충전<span class="glyphicon glyphicon-fire text-red"></span> </h1>
            <p> <small></small></p>
        </div>
        {{--<p>분노게이지를 충전하는 방법은 여러가지입니다.</p>--}}
    </div>

    <div class="">
        <div class="well">
            현재 보유량
            <table class="table">
                <tr>
                    <td colspan="2" style="color:yellowgreen;font-size:1.6em;font-weight:bold;">
                        총 {{( $list->boon_cash + $list->boon_point)}} point</td>
                <tr>
                    <td>
                        <b>캐쉬</b> : {{ $list->boon_cash." point" }}
                        <br>
                        <i>

                            {{--최근 입력한것만 보여주려고함.--}}
                            <?php $boon_cash = Auth::user()->boonStatus->boonCash->last(); ?>

                            <div>
                            {{ date('Y-m-d', strtotime($boon_cash ->updated_at)) }} /
                            <?=number_format($boon_cash ->pay_amt)?> point /
                            {{ ($boon_cash ->confirmed)?"반영완료":"입금 확인중.." }}
                            </div>

                        </i>
                    </td>
                    <td>
                        <b>포인트</b> : {{ $list->boon_point." point"}}
                    </td>
                </tr>
            </table>
        </div>
        {{--현재 분 상태. 나중 평균 분 상태 도시?--}}
    </div>


        <!-- Payapp.kr 결제모듈 시작 -->
        <script src="http://lite.payapp.kr/public/api/payapp-lite.js"></script>
        <script>
            $(document).ready(function(){
                PayApp.setDefault('userid',     'moior');
                PayApp.setDefault('shopname',   '분쟁제로 (법무법인예율)');

                /*PayApp.setDefault('redirecturl','http://<?=$_SERVER['HTTP_HOST']?>/v/consultList');	//결제안내문자 발송시
                 PayApp.setDefault('redirect',	'opener');		//opener [기본값] 부모창 self 현재창*/

                PayApp.setDefault('returnurl',	'http://<?=$_SERVER['HTTP_HOST']?>/boon/status');	//결제성공시
                PayApp.setDefault('feedbackurl','http://<?=$_SERVER['HTTP_HOST']?>/boon/cash?where=payapp');	// 이부분 잘못되면 에러코드 70080 / 고객사 응답 실패



                $("#btn접수하기").click(function(){
                    $(this).hide();
                    $("#btn접수wrap").show();
                });
                /*$("#btn접수wrap").mouseleave(function(){
                 $(this).hide();
                 $("#btn접수하기").show();
                 });*/

                $("#btn페이앱결제").click(function(){
                    $(".input결제액").val( $("#input충전예정액").val() );

                    $(this).attr('disabled', 'disabled');
                    payapp_call();
                    $(this).removeAttr('disabled');

                });

                $("#input충전예정액").keyup(function(){

                    $(".input결제액").val( $(this).val() );

                });
                /*임의금액 결제할 때*/
                $("#btnChangeCharge").click(function(){
                    $("#price_sum").val( $(this).prev().val() );
                    $('#total_charge_content').text( number_format($(this).prev().val()) );
                    $(this).parent().hide();
                });
            });
            function payapp_call(){  //.call() 호출 후 setParam된 값은 초기화
                PayApp.setParam('goodname',		$("#good_name").val());
                PayApp.setParam('price',		$("#price_sum").val());
                PayApp.setParam('memo',			$("#sms_memo").val()); //판매자 메모란에 같이 보일 내용
                PayApp.setParam('recvphone',	$("#sender_phone").val()); //

                PayApp.setParam('returnurl',	'http://<?=$_SERVER['HTTP_HOST']?>/v/consultList?flag=paymentok&amt=' + $("#price_sum").val() );

                if($("#work_id").val()){
                    PayApp.setParam('var1',    $("#work_id").val());
                }

                PayApp.call();
            }
        </script>
        <!-- Payapp.kr 결제모듈 끝 -->

        <?php
        $sms_memo = ""; //"모든 진행과정은 웹에서 확인가능합니다. 내용 검토 후 이상있는 경우 유선 연락드리겠습니다. 감사합니다.";
        $txt_goodname = "포인트 충전";
        $initialAmt = 10000;
        ?>
        <form>
            <input type=hidden name="price_sum" id="price_sum" value="" class="input결제액" />
            <input type=hidden name="good_name" id=good_name value="<?=$txt_goodname?>" />
            <input type=hidden name="sms_memo" id=sms_memo value="<?=$sms_memo?>" />
            <input type=hidden name="sender_phone" id=sender_phone value="<?=Auth::user()->userInfo->phone?>" />

            <input type=hidden name="work_id" id="work_id" value="<?=Auth::user()->id?>" />
        </form>

    {{--신용카드 은행이체--}}
    <div class="row" id="">
        <h2>충전하기</h2>
        <hr />
        {!! BootForm::openHorizontal(['sm'=>[3,7],'method' => 'POST'])->action('/boon/cash') !!}

        <div class="input-group col-xs-6 col-xs-offset-3" style="margin-bottom:30px;">
            <input type="text" id="input충전예정액" placeholder="<?=$initialAmt?>" value="<?=$initialAmt?>" class="form-control text-center" required>
            <span class="input-group-addon" id="basic-addon">원</span>
        </div>
        {!! BootForm::close() !!}

        <div class="col-xs-6 text-right">
            <div id="phone_pay"><a href="javascript:void(0);" class="" id="btn페이앱결제"><img src="/img/v1/btn_pay_phone.png" style="width:100%;max-width:300px;"></a></div>
        </div>
        <div class="col-xs-6 text-left">
            <div id="banking_pay">
                <a type="button" data-toggle="modal" data-target="#modal계좌안내"><img src="/img/v1/btn_pay_banking.png" style="width:100%;max-width:300px;" /></a>

                <!--이체 후 다음 버튼을 클릭해주세요. 처리가 더 빠릅니다.
                <a href="javascript:void(0);" class="" id="btn_payment_com">입금확인</a-->
            </div>

        </div>
    </div>





    {{--{{SKHelper::p($list)}}--}}



    <div class="modal fade" id="modal계좌안내" tabindex="-1" role="dialog" aria-labelledby="계좌안내">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">계좌안내</h4>
                </div>
                {!! BootForm::openHorizontal(['sm'=>[3,9],'method' => 'POST'])->action('/boon/cash') !!}
                <div class="modal-body">

                    <p><span style="font-size:1.3em;color:royalblue">우리 1005-502-237770 (주)모이어</span></p>
                    {!! BootForm::text('입금자명','bank_owner')->value( Auth::user()->name ) !!}

                    {!! BootForm::text('연락처','recvphone')->value( \app\Lib\skHelper::tel_html( Auth::user()->userInfo->phone) ) !!}
                    {!! BootForm::hidden('price')->class( 'input결제액' )->value( $initialAmt ) !!}

                    <small>
                    <p>위 계좌에 <u>입금하신 후</u> 아래 버튼을 클릭해주세요. 확인 후 자동 충전됩니다.</p>
                    <p>연락처는 진행상황 안내를 위해 사용됩니다. </p>
                    </small>

                </div>
                <div class="modal-footer">

                    {{--
                    {1 ! ! BootForm::open(['method' => 'POST', 'action' => 'SmsController@sendSms']) !! }
                    {1 ! ! BootForm::hidden('to')->value( '01047750852' ) !! } 회사 담당자 전번
                    {1 ! ! BootForm::hidden('from')->value( '' / *$user->sender_phone* / ) !! } 의뢰인 전번
                    {1 ! ! BootForm::hidden('memo')->value('입금하였습니다.') !! }
                    --}}

                    <button type="button" class="btn btn-default" data-dismiss="modal">닫기</button>
                    <button type="submit" class="btn btn-primary">입금 완료하였습니다</button>
                </div>
                {!! BootForm::close() !!}
            </div>
        </div>
    </div>

    <div class="row" style="font-size:0.8em;margin-top:30px;">

        신용카드/핸드폰 충전은 결제 즉시 잔액에 반영됩니다.<br />
        현금입금의 경우 통상 20분 후 잔액이 업데이트 되며 상황에 따라 지연될 수 있습니다.

    </div>
@stop


{{--@if ($ccMail->done == 1)
<span style="text-decoration: line-through;">
@endif--}}
{{--@if ($ccMail->done == 1)
    </span>
@endif--}}