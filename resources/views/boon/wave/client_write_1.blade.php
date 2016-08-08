
@extends('layouts.master') {{--master를 상속받음--}}

@section('title', '단체소송 - 분제로')

@section('sidebar')
    @parent

    <p>단체소송</p>

@stop

@section('content')


<link rel="stylesheet" href="{{URL::asset('/css/boon/ccMail.css')}}">
<script>
$(document).ready(function(){

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
        content: " "; // breadcrumb 특정슬래시 없애기. 공백이면안됨
    }
</style>


{{--세부페이지 네비바--}}
<ol class="breadcrumb">
    {{--<li><a href="{{ URL::to('ccmail') }}">
            <span class="glyphicon glyphicon-list" aria-hidden="true"></span> 전체</a></li>--}}

    <li class="active">신규신청</li>

    {{--<li style="" class="pull-right">--}}{{--이전 샘플 / 다음 샘플--}}{{--
        <span class="btn btn-xs btn-default btnPrev glyphicon glyphicon-menu-left" aria-hidden="true"></span>
        <span class="btn btn-xs btn-default btnNext glyphicon glyphicon-menu-right" aria-hidden="true"></span>

    </li>--}}

</ol>
{{--    <div class="corner-ribbon top-left sticky red shadow">New</div>
    <div class="corner-ribbon top-right sticky blue">Updated</div>
    <div class="corner-ribbon bottom-left sticky orange">Popular</div>
    <div class="corner-ribbon bottom-right sticky green shadow">Hello</div>

    <h1>Corner Ribbons</h1>
    <h2>(with custom settings and all...)</h2>--}}


{{--세션에 메세지 있으면 보여주기--}}
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif


<div class="">{{--내용증명 리스트 간략 박스형태--}}
    <div class="row">
        <div class="panel panel-default divCcMailBox">

            <div class="panel-heading">

                <b>
                    단체소송 접수 신청서
                </b>
            </div>

            {!! BootForm::openHorizontal(['sm' => [2, 10],'lg' => [2, 10]])->id('form-단체소송')
                ->action('/wave/client') !!}
            {!! BootForm::bind($waveClient) !!}
            {!! BootForm::hidden( "suit_id" )->value( $data['suit_id'] )  !!}

            <style>
                .choice-product {width:154px;height:160px;float:left;border-radius:10px;margin:6px;border:1px solid gray;
                    background:url('/img/wave/wave-coway.jpg');background-repeat:no-repeat;}
                /*width:144px;height:128px;*/
                .choice-product:hover {border:3px solid gray;}
            </style>
            <script>
                $(document).ready(function(){
                    $(".choice-product").click(function(){
                        $("input[name=data01]").val( $(this).data("name") );
                    });
                });
            </script>
            <div style="border:1px solid #dadada;background-color:#dadada">

                <div class="choice-product" style="background-position:-380px -10px;" data-name="370N (스파클링아이스)"></div>
                <div class="choice-product" style="background-position:-35px -10px;" data-name="380N (한뼘아이스)"></div>
                <div class="choice-product" style="background-position:-207px -10px;" data-name="430N (바리스타아이스)"></div>
                <div style="clear:both;"></div>
            </div>

            <div class="panel-body ">
                <div class="pull-left">

                </div>

                {!! BootForm::text( "제품명" , 'data01')->placeholder("위 사진을 클릭하세요.")->readonly()  !!}

                <div class="form-group">
                    <label class="col-sm-2 col-lg-2 control-label"></label>
                    <div class="col-sm-10 col-lg-10">
                        ※ 모든 항목은 나중 수정가능합니다
                    </div>
                </div>

                {!! BootForm::text( "이름" , 'name')->placeholder("계약자 성함")  !!}
                {!! BootForm::text( "주민번호" , 'jumin')->placeholder("991212-1234567 형식 - 원고명단에 필요")  !!}
                {!! BootForm::text( "전화번호" , 'phone')->placeholder("휴대폰 번호")  !!}


                <div class="form-group">
                    <label class="col-sm-2 col-lg-2 control-label">설치장소</label>
                    <div class="col-sm-10 col-lg-10">
                        <div class="form-inline" style="margin-bottom:4px;">
                            <input type="button" onclick="sample6_execDaumPostcode()" value="우편번호 찾기" class="form-control" />
                            {!! BootForm::text( "" , 'postcode')->placeholder("우편번호")->id('postcode')  !!}
                        </div>

                        {!! BootForm::text( "도로명" , 'addr')->placeholder("법원서류는 도로명으로 입력해야합니다.")  !!}
                        {!! BootForm::text( "상세" , 'addr2')->placeholder("상세주소")  !!}
                    </div>
                </div>





                <script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
                <script>
                    // 우편번호 찾기 찾기 화면을 넣을 element
                    var element_wrap = document.getElementById('wrap');

                    function foldDaumPostcode() {
                        // iframe을 넣은 element를 안보이게 한다.
                        element_wrap.style.display = 'none';
                    }

                    function sample6_execDaumPostcode() {
                        new daum.Postcode({
                            oncomplete: function(data) {
                                // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.

                                // 각 주소의 노출 규칙에 따라 주소를 조합한다.
                                // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
                                var fullAddr = ''; // 최종 주소 변수
                                var extraAddr = ''; // 조합형 주소 변수

                                // 무조건 도로명주소
                                fullAddr = data.roadAddress;

                                // 사용자가 선택한 주소가 도로명 타입일때 조합한다.
                                if(data.userSelectedType === 'R'){
                                    //법정동명이 있을 경우 추가한다.
                                    if(data.bname !== ''){
                                        extraAddr += data.bname;
                                    }
                                    // 건물명이 있을 경우 추가한다.
                                    if(data.buildingName !== ''){
                                        extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
                                    }
                                    // 조합형주소의 유무에 따라 양쪽에 괄호를 추가하여 최종 주소를 만든다.
                                    fullAddr += (extraAddr !== '' ? ' ('+ extraAddr +')' : '');
                                }

                                // 우편번호와 주소 정보를 해당 필드에 넣는다.
                                document.getElementById('postcode').value = data.zonecode; //5자리 새우편번호 사용
                                document.getElementById('addr').value = fullAddr;

                                // 커서를 상세주소 필드로 이동한다.
                                document.getElementById('addr2').focus();
                            }
                        }).open();
                    }
                </script>

                {!! BootForm::date( "구입/렌탈 날짜" , 'data02')->placeholder("")  !!}
                {!! BootForm::text( "시리얼번호" , 'data12')->placeholder("기존제품 시리얼번호 (교환시 교환후 번호)")  !!}

                {!! BootForm::text( "사용기간" , 'data03')->placeholder("중간에 판매한 경우만 적어주세요.")  !!}
                {!! BootForm::text( "평균 사용회수 및 음용량" , 'data04')->placeholder("ex) 하루 10잔/1L 등 자유롭게")  !!}

                {!! BootForm::textarea( "현재 신체 이상증세" , 'data05')->placeholder("발암, 피부질환, 호흡기질환, 안질환, 신장질환 여부

* 신청서 작성 후 나중 관련파일을 첨부할 수 있습니다.")  !!}

                {!! BootForm::select('함께 신청할 동거인 수', 'data06')->options(['0' => '없음', '1' => '1명', '2' => '2명', '3' => '3명', '4' => '4명', '5+' => '5명이상'])->select('green') !!}

                {!! BootForm::textarea( "동거인에게 신체상 이상이 있는 경우" , 'data07')->placeholder("1. 홍길동
  1) 아들
  2) 100525-3450012
  3) 하루 5잔
  3) 발진, 두드러기
2. OOO (이름)
  1) 계약자와의 관계(아들, 남편, 아내)
  2) 주민번호 (원고명단에 필요)
  3) 사용회수 및 음용량
  3) 질환의 종류 및 치료여부
")  !!}
                {!! BootForm::text( "은행명" , 'bank_name')->placeholder("승소시 판결금받을 은행명")  !!}
                {!! BootForm::text( "계좌번호" , 'bank_number')->placeholder("계좌번호")  !!}
                {!! BootForm::text( "예금주명" , 'bank_owner')->placeholder("예금주")  !!}

                <div class="form-group">
                    <label class="col-sm-2 col-lg-2 control-label"></label>
                <div class="col-sm-10 col-lg-10" style="border-top:1px solid royalblue;background-color:lightblue;">
                    <h4>소송종류 선택</h4>
                    {!! BootForm::radio( "A타입 (위자료 및 검진비 청구)" , 'data15', 'A') !!}
                    {!! BootForm::radio( "B타입 (+증상이 있는 경우, 상해치료비 청구)" , 'data15', 'B') !!}
                </div>
            </div>

                <label class="col-sm-2 col-lg-2 control-label"></label>
                <div class="col-sm-10 col-lg-10">
                    <h4>비용 입금 <small>하단 비용표를 확인하신 후, 인원에 맞게 입금하시면 됩니다.</small></h4>
                </div>

                {!! BootForm::text( "비용 입금자" , 'data11')->placeholder("비용 입금시 이름")  !!}

                <div class="form-group">
                    <label class="col-sm-2 col-lg-2 control-label">입금계좌</label>
                    <div class="col-sm-10 col-lg-10">
                        <b style="font-size:1.2em;">신한 100-029-697933 법무법인 예율</b>
                        <div><small>접수인원이 많을 경우 입금확인이 늦을 수 있으니 기다려주세요.</small></div>
                    </div>
                </div>

                {{--{!! BootForm::textarea('비고', 'bigo')->addClass('ccmail-content') !!}--}}

                {{--{!! BootForm::submit('접수') !!}--}}
                <div class="form-group"><div class="col-sm-offset-2 col-sm-10 col-lg-offset-2 col-lg-10">
                    <button type="submit" class="btn btn-default btn-primary btn-lg">접수</button>
                </div></div>

                {!! BootForm::checkbox('아래 계약사항을 모두 읽고 동의하며, 접수버튼의 클릭으로 서면약정을 대체합니다.', '약정동의', true)->check() !!}



            </div>
            {!! BootForm::close() !!}

            <div class="panel-footer">
                <div class="">

<style>
    .big {font-size:24px;margin:20px 0;}
    .big1{font-size:16px;margin:40px 0;}
    .big2{font-size:14px;margin:10px 0;margin-left:10px;}
    .batang {margin-left:30px;line-height:150%;font-family:;}
    .hang {margin-left:10px;line-height:180%;font-family:;}
    .b {font-weight:bold}
    .c {text-align:center}
    #wrap_paper {border:1px solid gray;height:300px;overflow-x:auto;overflow-y:scroll;background-color:#eeeeee;margin:30px auto 0 auto;padding:20px;}

</style>
                    <script>
                        $(document).ready(function(){
                            $("#wrap_paper").dblclick(function(){
                                if($(this).css("height") == '300px')
                                    $(this).css("height", 'auto');
                                else $(this).css("height", '300px');
                            });
                        });

                    </script>
                    <div id="wrap_paper">

                        <div class="big b c">사건위임계약서(민사)</div>

                        <div class="big1 b">1. 위임인(갑) : <span id="plain_name_in_contract">신청인</span></div>


                        <div class="big1 b">2. 수임인(을) : 법무법인 예율 대표변호사 김웅, 김상겸</div>

                        <div class="big1 b">3. 사건의 표시</div>
                        <div class="b">제조물 결함으로 인한 손해배상청구 등
                            1) 원고 : 갑
                            2) 피고 : 코웨이 주식회사</div>

                        <div class="c" style="margin:40px 0;">상기 당사자들은 위 표시 사건의 사건처리에 관한 위임계약을 다음과 같이 체결한다.</div>

                        <div class="hang" style="margin-top:20px;">

                            <span class="b">제1조(목적)</span> 갑은 을에게 위 표시 사건의 처리(이하 '위임사무')를 위임하고, 을은 이를 수임한다.
                            <br />
                            <br />
                            <span class="b">제2조(위임한계)</span> 갑이 을에게 위임하는 위임사무의 범위는 1심 절차에 한한다.	<br />
                            <br />
                            <span class="b">제3조(수권범위)</span> 갑은 을에게 <u>일체의 소송행위, 화해, 항소 및 상고의 제기, 판결금 수령에 관한 일체의 행위, 공탁물과 그 이자의 반환 청구와 수령행위, 소송비용 신청행위의 권한</u>을 수여한다.
                            <br />
                            <br />
                            <span class="b">제4조(수임인의 의무)</span> 을은 변호사로서 법령에 관한 권리와 의무에 입각하여 위임의 내용에 따라 선량한 관리자의 주의로써 위임사무를 처리한다.
                            <br />
                            <br />
                            <span class="b">제5조(착수금 및 성공보수)</span> <u><span id="chaksu_txt"></span></u>

                            가. 착수금은 첨부 별표1에 따라 실제 입금된 금액으로 하고(부가가치세 포함), <u>성공보수는 갑의 경제적 이득의 20%(부가가치세 별도)</u>로 한다.<br/>
                            나. 위 가항의 착수금은 을이 위임사무에 관한 연구, 조사, 서면작성 등 위임사무에 착수한 이후 을에게 책임 없는 사유로 인한 당사자의 소의 부제기 취하, 상소의 부제기 또는 취하, 청구의 포기, 인낙, 소송상 화해, 조정, 소송물의 양도, 당사자의 사망 등의 경우 갑이 그 반환을 청구하지 못한다.<br/>
                            다. 다음의 경우에는 승소로 보고 위 가항의 성공보수를 지급하여야 한다.
                             ① 을의 소송수행 결과로 상대방이 청구의 인낙, 조정을 하는 경우
                             ② 을이 위임사무의 처리를 위하여 상당한 노력을 투입한 이후 갑이 정당한 사유 없이 위임계약을 해지하거나 임의로 조정, 청구의 포기, 소의 취하를 하는 경우<br/>
                            라. <u>원고 승소시 피고가 부담할 소송비용</u>은 1심 절차 종료 후 갑이 일괄 신청하여 별도 성공보수로 산입한다.

                            <br />
                            <br />
                            <span class="b">제6조(비용부담)</span>
                            을이 위임사무를 처리하는 데 필요한 인지대, 송달료, 감정료, 예납금, 보증금, 등사료,여비,
                            기타 필요한 <u>비용은 그 전액을 을(법무법인 예율)이 우선 지급</u>하고,
                            <u>일부승소의 경우에 갑의 승소이익에서 우선 충당한다.</u>
                            <u>패소할 경우에는 그 전액을 을이 여전히 부담</u>하고 갑에게 청구하지 않기로 한다.
                            <br />
                            <br />
                            <span class="b">제7조(계약해지)</span>
                                가. 을은 총 위임인이 A타입, B타입 각 500인 미만인 경우 소장접수 전 본 위임계약을 해지할 수 있고 그 경우 입금된 금액은 전액 환불하기로 한다.
                                나. 갑이 위임계약에 정한 의무를 이행하지 아니하거나, 위임사무의 내용에 대하여 진술한 사실이 허위인 경우 을인 본 위임계약을 해지할 수 있다.
                            <br />
                            <br />
                            <span class="b">제8조(인장조각)</span> 이 위임계약의 수행상 필요한 경우, 을은 갑의 인장을 조각하여 사용할 수 있다. (법원에 위임장 제출시 위임인의 도장을 찍어야 하기 때문에 인장조각이 필요합니다)
                            <br />
                            <br />
                            <span class="b">제9조(민법과의 관계)</span> 기타 위임사항에 관하여 이 위임계약서에 특별히 규정되어 있는 사항을 제외하고는 민법상 위임에 관한 규정이 정한 바에 의한다.
                            <br />
                            <br />
                            <span class="b">제10조(관할에 대한 합의)</span> 이 위임계약으로 생기는 일체의 소송에 관하여는 서울중앙지방법원을 관할법원으로 한다.
                            <br />
                            <br />
                            <p class="pull-right"><?=date("Y년 m월 d일")?></p>
                        </div>
                    </div>

                    <div style="margin-bottom:20px;text-align:center;"><small>※ 전체내용을 확인하시려면 더블클릭 ※</small></div>

                    <span class="b">착수금 별표1.</span><br />
                    <br />
                    A타입) 위자료 및 검진비만을 청구 – 11만원 (VAT포함)<br />
                    B타입) 위자료, 검진비에 추가적으로 상해 치료비 청구 – 44만원 (VAT포함)<br />
                    <br />
                    * 동거인(주민등록상 주소지 동일한 가족)이 모두 원고가 되는 경우, 다음 표에 따름<br />
                    <div id="div비용표" style="display:block;">
                        <table class="table text-center">
                            <tr>
                                <th></th>
                                <th class="text-center" style="color:royalblue;">1명</th>
                                <th class="text-center"><nobr>2명</nobr></th>
                                <th class="text-center">3명</th>
                                <th class="text-center">4명</th>
                                <th class="text-center">5명 이상</th>
                            </tr>
                            <tr>
                                <td><small style="font-size:0.7em;"><nobr>집단소송</nobr></small><br>
                                    <nobr>A타입</nobr>
                                </td>
                                <td style="color:royalblue;">11<small style="font-size:0.7em;">만</small></td>
                                <td>20<small style="font-size:0.7em;">만</small></td>
                                <td>29<small style="font-size:0.7em;">만</small></td>
                                <td>37<small style="font-size:0.7em;">만</small></td>
                                <td>8<small style="font-size:0.7em;">만+</small></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="6"><small style="font-size:0.7em;">인지대, 송달료 포함 </small></td>
                            </tr>
                            <tr>
                                <td><small style="font-size:0.7em;"><nobr>개별소송</nobr></small><br>
                                    B타입
                                </td>
                                <td style="color:royalblue;">44<small style="font-size:0.7em;">만</small></td>
                                <td>80<small style="font-size:0.7em;">만</small></td>
                                <td>116<small style="font-size:0.7em;">만</small></td>
                                <td>148<small style="font-size:0.7em;">만</small></td>
                                <td>32<small style="font-size:0.7em;">만+</small></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="6"><small style="font-size:0.7em;">인지대, 송달료 일부 포함 </small></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="6"><small style="font-size:0.7em;">※ 동거인이 있을경우 복수신청 가능합니다. <br> 다만 <u>주민등록상 주소와 정수기 설치주소가 동일한 경우</u>라야 합니다.</small></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td colspan="6">입금계좌 <b>신한 100-029-697933 법무법인 예율 </b></td>
                            </tr>

                        </table>
                    </div>





                </div>

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
