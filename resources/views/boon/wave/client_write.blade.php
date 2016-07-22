
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

            <style>
                .choice-product {width:180px;height:160px;float:left;border-radius:10px;margin:10px;border:1px solid gray;
                    background:url('/img/wave/wave-coway.jpg');background-repeat:no-repeat;}
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

                <div class="choice-product" style="background-position:-370px -10px;" data-name="370N (스파클링아이스)"></div>
                <div class="choice-product" style="background-position:-20px -10px;" data-name="380N (한뼘아이스)"></div>
                <div class="choice-product" style="background-position:-195px -10px;" data-name="430N (바리스타아이스)"></div>
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
                            <input type="text" name="postcode" id="postcode" placeholder="우편번호" class="form-control" />
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
                {!! BootForm::text( "사용기간" , 'data03')->placeholder("중간에 판매한 경우만 적어주세요.")  !!}
                {!! BootForm::text( "평균 사용회수 및 음용량" , 'data04')->placeholder("ex) 하루 10잔/1L 등 자유롭게")  !!}
                {!! BootForm::textarea( "현재 신체 이상증세" , 'data05')->placeholder("발암, 피부질환, 호흡기질환, 안질환, 신장질환 여부

* 신청서 작성 후 나중 관련파일을 첨부할 수 있습니다.")  !!}

                {!! BootForm::select('함께 신청할 동거가족 수', 'data06')->options(['0' => '없음', '1' => '1명', '2' => '2명', '3' => '3명', '4' => '4명', '5+' => '5명이상'])->select('green') !!}

                {!! BootForm::textarea( "동거가족에게 신체상 이상이 있는 경우" , 'data07')->placeholder("1. 홍길동
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
                {!! BootForm::text( "은행명" , 'data08')->placeholder("승소시 판결금받을 은행명")  !!}
                {!! BootForm::text( "계좌번호" , 'data09')->placeholder("계좌번호")  !!}
                {!! BootForm::text( "예금주명" , 'data10')->placeholder("예금주")  !!}

                <label class="col-sm-2 col-lg-2 control-label"></label>
                <div class="col-sm-10 col-lg-10">
                    <h4>비용 입금 <small>메인 페이지 비용표를 확인하신 후, 인원에 맞게 입금하시면 됩니다.</small></h4>

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

                {!! BootForm::submit('접수') !!}

            </div>
            {!! BootForm::close() !!}

            <div class="panel-footer">

                &nbsp;
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
