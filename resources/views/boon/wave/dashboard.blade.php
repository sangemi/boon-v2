@extends('layouts.master') {{--master를 상속받음--}}

@section('title', '단체소송 - 분제로')

@section('sidebar')
    @parent

    <p>단체소송 </p>

@stop

@section('content')

<script type="text/javascript" src="/lib/common.sk.js"></script>
<link rel="stylesheet" href="{{URL::asset('/css/boon/ccMail.css')}}">


{{--페이지 작은 네비바 대체--}}
<style>

    .breadcrumb > li + li.pull-right:last-child:before {
        content: " "; /* breadcrumb 특정슬래시 없애기. 공백이면안됨*/
    }
</style>

<ol class="breadcrumb">
    <li><a href="{{ URL::to('wave/admin') }}">
            <span class="glyphicon glyphicon-list" aria-hidden="true"></span> 관리어드민</a></li>


    {{--<li class="pull-right"><a href="{{ URL::to('ip/work/create') }}">
        <span class="btn btn-xs btn-default" aria-hidden="true">의뢰 <span class="fa fa-pencil"></span></span></a>
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

{{-- 단체SMS 시작 --}}
<div>
    <a href="javascript:void(0);" class="toggle_smsbox btn btn-default">SMS 발송</a>
    <span id="sms_to_list" style="font-size:0.8em;color:gray;">아래 리스트를 클릭 후 발송버튼 눌러주세요.</span>
</div>
<script>
    $(document).ready(function(){
        $(".toggle_smsbox").click(function() {
            toggle_smsbox();
        });
        /*단체문자. 클릭하면 리스트에 포함됨. 이미 된거면 빼기*/
        $(".each_client").click(function(){
            var final_to_number = '', final_to_name = '';
            if( $(this).data('clicked') == true ){
                $(this).data('clicked', false); $(this).css('background-color', '');
            }
            else {
                $(this).data('clicked', true) ; $(this).css('background-color', 'yellow');
            }
            $(".each_client").each(function(){
                if($(this).data('clicked')) {
                    final_to_number = final_to_number + ',' + $(this).data('tel');
                    final_to_name = final_to_name + ', ' + $(this).find(".each_name").text();
                }
            });
            final_to_number = trimChar( trimChar(final_to_number, ' '), ',');
            final_to_name = trimChar( trimChar(final_to_name, ' '), ',');
            $("#sms_recive_num").val( final_to_number );
            $("#sms_to_list").text( final_to_name );;
        });
    });
</script>

{{-- 단체SMS 끝 --}}


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

    .bigbox {border:1px solid white;background-color:#fff;float:left;margin-bottom:5px;
        border-radius:10px;
    }
    .bigbox h4 {border-bottom:1px solid tomato;padding:8px 0 3px 0;color:tomato;margin-top:0px;border-top-left-radius:10px;border-top-right-radius:10px;}
    h1 { color: #00BFFF; }

    }
</style>
<script>
    $(window).scroll(function()
    {
        $('#detailClient').animate({top:$(window).scrollTop()+"px" },{queue: false, duration: 150});
    });
</script>
    <div class="text-center" style="white-space: nowrap;padding:0 10px 10px 10px;">
        <div class="row">
            <div id="detailClient" class="bigbox box2 col-xs-4" style="overflow-y:scroll;height:600px;">
                <div style="">

                    <h4>접수인단 <small>[결제]</small></h4>
                    <?php
                    $amt_total = 0;
                    ?>
                    @if (empty($wave_client))
                        <div class="col-sm-12">
                            내역없습니다.
                        </div>
                    @else
                        @foreach ($wave_client as $no => $client)
                            <?php
                            $amt_total += $client['amt_payment'];
                            ?>
                            <div class="each_client" data-tel="<?=\app\Lib\skHelper::tel_db($client['phone'])?>"><?=($no+1)?>.
                                <a href="javascript:showDetailInfo('<?=$client['id']?>')">
                                    <span  class="each_name"><?=$client['name']?></span>
                                </a>
                                @if($client['chk_payment'] == '입금완료' || $client['chk_payment'] == '면제')
                                    <button class="btn btn-link btn-xs btn-detail open-modal" value="change-payment" data-row_id="<?=$client['id']?>"><?=number_format($client['amt_payment'])?>원</button>
                                @else
                                    <button class="btn btn-default btn-xs btn-detail open-modal" value="change-payment" data-row_id="<?=$client['id']?>"><?=$client['chk_payment']?></button>
                                @endif

                            </div>

                        @endforeach
                    @endif
                    <?php

                    echo "<p>총 ".number_format($amt_total)."원 입금</p>";
                    ?>
                    <div style="display:block;clear:both;"></div>
                </div>
                <div style="display:block;clear:both;"></div>
            </div>

            <div class="bigbox  col-xs-8" style="white-space:normal;">
                    <h4>세부내용</h4>
                    <div  id="detailInfoBox">

                    </div>

            </div>

        </div>
        <div class="row">

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

{{--이것때문에 500 에러 생김!! ㅜ.ㅜ 3시간쯤--}}
<meta name="_token" content="{!! csrf_token() !!}" />
<script>
    var url = "/wave/admin/tasks";
    var task_name = '',row_id = '';

    function showDetailInfo(row_id){
        var my_url = url;
        my_url += '/' + "show-detail-info";
        var formData = {
            row_id: row_id
        }
        $.ajax({
            type: "POST",
            url: my_url,
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log(data);
                var detail_html = '';
                detail_html =
                        "<div class='row'><p class='col-xs-2'>서류상태</p><p class='col-xs-10'>" + data['data']['chk_proof'] + '</p></div>' +
                        "<div class='row'><p class='col-xs-2'>입금상태</p><p class='col-xs-10'>" + data['data']['chk_payment'] + '[입금액:'+data['data']['amt_payment']+']원</p></div>' +

                        "<div class='row'><p class='col-xs-2'>소송타입</p><p class='col-xs-10'>" + data['data']['data15'] + '</p></div>' +
                        "<div class='row'><p class='col-xs-2'>내부상태</p><p class='col-xs-10'>" + data['data']['status_inner'] + '</p></div>' +
                        "<div class='row'><p class='col-xs-2'>외부상태</p><p class='col-xs-10'>" + data['data']['status_show'] + '</p></div>' +

                        "<div class='row'><p class='col-xs-2'><b>이름</b></p><p class='col-xs-10'>" + data['data']['name'] + '</p></div>' +
                        "<div class='row'><p class='col-xs-2'><b>전번</b></p><p class='col-xs-10'>" +
                            "<a href='javascript:void(0)' class='btn_smsbox'>" + data['data']['phone'] + "</a>" +
                        "</p></div>" +
                        "<div class='row'><p class='col-xs-2'>주민</p><p class='col-xs-10'>" + data['data']['jumin'] + '</p></div>' +
                        "<div class='row'><p class='col-xs-2'>주소</p><p class='col-xs-10'>" + data['data']['addr'] + '</p></div>' +
                        "<div class='row'><p class='col-xs-2'>주소2</p><p class='col-xs-10'>" + data['data']['addr2'] + '</p></div>' +
                        "<div class='row'><p class='col-xs-2'>우편번호</p><p class='col-xs-10'>" + data['data']['postcode'] + '</p></div>' +
                        "<div class='row'><p class='col-xs-2'>제품명</p><p class='col-xs-10'>" + data['data']['data01'] + '</p></div>' +
                        "<div class='row'><p class='col-xs-2'>구입렌탈일</p><p class='col-xs-10'>" + data['data']['data02'] + '</p></div>' +
                        "<div class='row'><p class='col-xs-2'>설치일</p><p class='col-xs-10'>" + data['data']['data03'] + '</p></div>' +
                        "<div class='row'><p class='col-xs-2'>음용량</p><p class='col-xs-10'>" + data['data']['data04'] + '</p></div>' +
                        "<div class='row'><p class='col-xs-2'>신체증상</p><p class='col-xs-10'>" + data['data']['data05'] + '</p></div>' +
                        "<div class='row'><p class='col-xs-2'>인원</p><p class='col-xs-10'>" + data['data']['data06'] + '</p></div>' +
                        "<div class='row'><p class='col-xs-2'>동거인</p><p class='col-xs-10'>" + data['data']['data07'] + '</p></div>' +
                        "<div class='row'><p class='col-xs-2'>은행명</p><p class='col-xs-10'>" + data['data']['data08'] + data['data']['data09'] + data['data']['data10'] + '</p></div>' +
                        "<div class='row'><p class='col-xs-2'>입금인</p><p class='col-xs-10'>" + data['data']['data11'] + '</p></div>' +

                        "<div class='row'><p class='col-xs-2'>성보입금</p><p class='col-xs-10'>" + data['data']['bank_name'] + data['data']['bank_number']+ data['data']['bank_owner'] + '</p></div>' +

                        "<div class='row'><p class='col-xs-2'>철회여부</p><p class='col-xs-10'>" + data['data']['withdraw'] + '</p></div>' +
                        "<div class='row'><p class='col-xs-2'>비고</p><p class='col-xs-10'>" + data['data']['bigo'] + '</p></div>' +
                        "<div class='row'><p class='col-xs-2'>접수일</p><p class='col-xs-10'>" + data['data']['created_at'] + '</p></div>'

                ;

                $("#detailInfoBox").html(detail_html);
            },
            error: function (data) {
                console.log('SK Error:', data);
            }
        });
    }


    $(document).ready(function() {

        //display modal form for task editing
        $('.open-modal').click(function () { // 수정시. 신규입력시에는 task_name = '';로 해서 하자.
            task_name = $(this).val();
            row_id = $(this).data('row_id');
            showDetailInfo(row_id);
            $('#myModal').modal('show');

            /*var task_name = $(this).val();
            $.get(url + '/' + task_name, function (data) {

            })*/
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        })

        //create new task / update existing task
        $("#btn-save").click(function (e) {
            /*이것때문에 500 에러 생김!! ㅜ.ㅜ 3시간쯤*/

            e.preventDefault();

            var formData = {
                row_id: row_id,
                amt_payment: $('#amt_payment').val(),
                chk_payment: $('input[name=chk_payment]:checked').val(),
            }

            //used to determine the http verb to use [add=POST], [update=PUT]
            var state = "update"; // $('#btn-save').val();
            var type = "POST"; //for creating new resource
            var my_url = url;

            if (state == "update"){
                type = "POST"; //for updating existing resource //PUT
                my_url += '/' + task_name; // + '/' + row_id; // '/change-payment/' +
            }
            console.log('SK:'+type+' - ', formData);
            $.ajax({
                type: type,
                url: my_url,
                data: formData,
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                    if(data['result'] == 'success'){
                        $('#myModal').modal('hide');
                    }else{
                        alert(data['result'] + '\n\n' + data['data']);
                    }

                    /*
                    var task = '<tr id="task' + data.id + '"><td>' + data.id + '</td><td>' + data.task + '</td><td>' + data.description + '</td><td>' + data.created_at + '</td>';
                    task += '<td><button class="btn btn-warning btn-xs btn-detail open-modal" value="' + data.id + '">Edit</button>';
                    task += '<button class="btn btn-danger btn-xs btn-delete delete-task" value="' + data.id + '">Delete</button></td></tr>';

                    if (state == "add"){ //if user added a new record
                        $('#tasks-list').append(task);
                    }else{ //if user updated an existing record

                        $("#task" + task_id).replaceWith( task );
                    }
                    $('#frmTasks').trigger("reset");
                    */

                },
                error: function (data) {
                    console.log('SK Error:', data);
                }
            });
        });
    });
</script>

<!-- Modal (Pop up when detail button clicked) -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">입금처리</h4>
            </div>
            <div class="modal-body">
                <form id="frmTasks" name="frmTasks" class="form-horizontal" novalidate="">

                    <div class="form-group error">
                        <label for="inputTask" class="col-sm-3 control-label">처리</label>
                        <div class="col-sm-9">
                            <input type="radio" class="" id="" name="chk_payment" value="입금대기">입금대기
                            <input type="radio" class="" id="" name="chk_payment" value="부족">부족
                            <input type="radio" class="" id="" name="chk_payment" value="면제">면제
                            <input type="radio" class="" id="" name="chk_payment" value="해당없음">해당없음
                            <input type="radio" class="" id="" name="chk_payment" value="입금완료">입금완료
                        </div>
                    </div>
                    <div class="form-group error">
                        <label for="inputTask" class="col-sm-3 control-label">입금액</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control has-error" id="amt_payment" name="amt_payment" placeholder="입금된 금액" value="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label"></label>
                        <div class="col-sm-9">
                            입금자 확인해주세요
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn-save" value="add">상태 변경</button>
                <input type="hidden" id="task_id" name="task_id" value="0">
            </div>
        </div>
    </div>
</div>








{{--<div id="smsBox" style="position: absolute; top:10px left:10px;">
<form action='/sms/send'>
    발신인 <input type='text' name='from' value='' />
    수신인 <input type='text' name='to' value='010-4775-0852' />
    문자 <input type='text' name='text' value='테스트...' />
    <input type='text' name='type' value='SMS' />
    <input type='submit' value='submit' />
</form>
</div>--}}

<style>
    #smsbox_sk input,  #smsbox_sk textarea {font-size:12px;}
    #smsbox_sk input {margin-bottom:10px;}

    #smsbox_sk {
        position:fixed; z-index:99; width:630px;; padding:15px;
        top:30%; right:5%; height:500px; background-color:#d7e3f0;
        box-shadow:3px 3px 6px #555; filter:progid:DXImageTransform.Microsoft.Shadow(color=#555555,direction=135,strength=2);
        border-radius:5px;
    }

    .textarea문자내용 {height:100px;width:185px;margin-bottom:5px;}
    .sms_title {color:#59636e; font-weight:bold}
    #sms_content {width:180px; height:150px; border:1px solid #98b2cc;}
    #btnSendSMS {background-color:#567696; color:#ffffff; border:1px outset #567696; padding:3px; border-radius:5px;}
</style>


<?php
/* consult.detail.php
	vb에서는 이것 안씀
class="showSMSBox" 된것을 누르면, 해당 text가 전화번호로 입력되어 나옴.
* 문자는 지정해놓은 문자열 자동 노출
btn_smsbox 를 클릭시 해당 text() 자동저장
*/

?>


<div id="smsbox_sk" style="display:none">
    <div style="float:left;width:66.666%;;">
        예제
        <?php
        /*$sql = "select * from sms_text where member_srl = '$member_srl' ";
        $smstext_arr = select($sql);
        foreach($smstext_arr as $smstext){

        }
        if(!$smstext_arr[0]){}*/
        $selected_smstext = "서울 강남구 테헤란로 207 아가방빌딩 7층, 법무법인 예율입니다. (2호선 역삼역 8번출구 200m)\n";



        ?>
        <div>
            <?php
            //$fake_consult_id = ($consult_id *3 ) + 1004;

            ?>
            <textarea name="textarea내용" class="textarea문자내용">[예율]코웨이소송안내. 소송비용 입금부탁드립니다. 신한 100-029-697933 예율 http://wave.boonzero.com</textarea>
            <textarea name="textarea내용" class="textarea문자내용">[예율]코웨이소송안내. 소송비용 입금부탁드립니다. 감사합니다.http://wave.boonzero.com</textarea>


<textarea name="textarea내용" class="textarea문자내용">[예율]
부재중 법률상담 확인연락 드렸으나 현재 통화가 어려우신듯 보입니다. 필요하신 경우 다시 연락주시면 상세한 답변 드리겠습니다. 감사합니다.
* 증거를 미리 올려주시면 더 빠른 상담을 하실 수 있습니다.
    <?=$_SERVER['HTTP_HOST']?>/v/easyHelp? $fake_consult_id
</textarea>
    <textarea name="textarea내용" class="textarea문자내용">법무법인 예율, 모이어 상담소 입니다.
        < ? = substr($consult['reg_date'],0,10) ? >자 법률상담 진행여부 문의차 연락드렸습니다.
통화가 어려우신듯 하니 필요하신 경우 먼저 연락주시면 상세한 답변 드리겠습니다. 02-2135-5251, http://sangdam.moior.com
* 더이상 관리를 받지 않고 싶으신 경우 사건종료체크 부탁합니다.
사건종료요청 : < ? =$_SERVER['HTTP_HOST'] ? >/v/easyHelp?< ? =$fake_consult_id ? >
</textarea>
<textarea name="textarea내용" class="textarea문자내용">[변호사님 상담배정]
    < ? =$consult['cl_name'] ? >
 www.moior.com/lawfirm/consult.detail.php?co_id= </textarea>

<textarea name="textarea내용" class="textarea문자내용">[찾아오시는길] 법무법인 예율입니다.
서울 강남구 테헤란로 207 아가방빌딩 7층(2호선 역삼역8번출구 나와서 200m쯤 직진하시면 '아가방'건물이 보입니다.)</textarea>
<textarea name="textarea내용" class="textarea문자내용">[입금계좌안내]
신한 100-028-594840 예율
입금확인 후 연락드리겠습니다. 감사합니다.
</textarea>

        </div>
        <small><a>예제 수정</a></small>
        <div id="staff_hplist">
            <button type="button" class="btn btn-default btn스탭전번 btn-sm" data-hp="010-4775-0852">
                김상겸
            </button>
            <button type="button" class="btn btn-default btn스탭전번 btn-sm" data-hp="010-2383-9648">
                정지혜
            </button>
            <button type="button" class="btn btn-default btn스탭전번 btn-sm" data-hp="010-8025-3422">
                곽지영
            </button>
            <button type="button" class="btn btn-default btn스탭전번 btn-sm" data-hp="010-4519-4854">
                신정재
            </button>
            <button type="button" class="btn btn-default btn스탭전번 btn-sm" data-hp="010-4618-7725">
                장미라
            </button>


        </div>
    </div>
    <div style="float:left;width:33.333%">
        <span class="sms_title">내용</span>
        <div class="sms_saved_text">
            <?
            /*foreach($smstext_arr as $smstext){

            }*/
            ?>
        </div>

        <form name="formSMS발송" id="formSMS발송" action="/lawfirm/consult.ajax.lawfirm.php" method="post"  enctype='multipart/form-data' target="winNewSMS">
            <input type="hidden" name="action" value="sendSMS" />
            <input type="hidden" name="to_user_id" id="to_user_id" value="" />

            <input type="hidden" name="consult_id" value="" />

            <textarea name="sms_content" id="sms_content" class="form-control" >[예율] </textarea>
            <div style="font-size:0.9em; text-align:right;"><span id="txt_len_sms"></span>byte&nbsp;<span id="txt_smstype"></span>
                <input type=hidden name="smstype" id="smstype" value="SMS" />
            </div>
            <span class="sms_title">받는이</span>
            <input type=text name="sms_number_to" id="sms_recive_num" style="width:180px; height:25px;" class="form-control" />

            <span class="sms_title">보내는이</span>
            <input type=text name="sms_number_from" id="sms_sender_noum" style="width:180px; height:25px;" class="form-control"
                   value="02-2135-5251" />
            <div style="text-align:center"><input type=button id="btnSendSMS" value="전송" style="width:150px;"></div>

            <div style="background-color:#efefef;padding:5px;">
                <input type=file name="upload_file" id="" style="" class="form-control" />
                <div style="text-align:center"><input type=button id="btnSendMMS" value="파일도 전송" style="width:100px;"></div>
            </div>

            <div style="text-align:right; cursor:pointer; margin-top:10px; font-weight:bold; " id="btnSMSClose">닫기</div>
            <a href="/lawfirm/sms.setting.php" style="color:#aaa;font-size:9px;" target="_blank">SETTING</a>
        </form>
    </div>

</div>

<script>
    function toggle_smsbox(){
        if($("#smsbox_sk").css("display")=="none"){
            $("#smsbox_sk").animate({
                right:['toggle', 'linear'],
                opacity:['toggle', 'linear']
            },200,'linear',function(){});
        }else{
            $("#smsbox_sk").hide();
        }
    }
    $(document).ready(function(){

        /*sms보내기_상세페이지*/
        $(document).on('click', '.btn_smsbox', function(){
            //$("#sms_recive_num").val( $(this).parents("#txt_consult_info").find(".txt_client_hp").text() );
            var btn_txt = onlyNumber($(this).text());
            if($.isNumeric(btn_txt))
                $("#sms_recive_num").val( btn_txt );
            else
                $("#sms_recive_num").val( $(this).data("tel") );

            toggle_smsbox();
        });

        $("#sms_content").keyup(function(){
            var str = $(this).val();
            var len = 0, i, j;

            for(i=0, j=str.length; i<j; i++, len++)
            {
                if((str.charCodeAt(i)<0)||(str.charCodeAt(i)>127))len = len+1;
            }

            $("#txt_len_sms").text(len);
            if(len<=80){$("#txt_smstype").text("단문"); $("smstype").val("SMS");}else{
                $("#txt_smstype").text("장문"); $("smstype").val("LMS");
            }
        });

        $("#btnSMSClose").click(function(){
            $("#smsbox_sk").animate({
                right:['toggle','linear'],
                opacity:['toggle','linear']
            },200,'linear',function(){});
        });

        $("#btnSendSMS").click(function(){
            /*$(this).attr("disabled", true);*/

            var str = "&from="+$("input[name=sms_number_from]").val()+"&to="+$("input[name=sms_number_to]").val()+"&text="+$("#sms_content").val()+""
                    +"&to_user_id="+$("#to_user_id").val()+"";

            /*$.post("/lawfirm/consult.ajax.lawfirm.php", str, function(data){*/
            $.post("/sms/send", str, function(data){
                $("#btnSendSMS").attr("disabled",false);
                console.log('COOL SMS 로그');
                console.log(data);
                alert(data + '건 발송성공');
            });

        });
        /*sms보내기_상세페이지*/

        /*sms보내기_MMS 계약서 보내기*/
        $("#btnSendMMS").click(function(){
            $(this).attr("disabled", true);

            $("#formSMS발송").submit();
        });

        $(".textarea문자내용").click(function(){
            $(this).select();
        });
        $(".btn스탭전번").click(function(){
            $("#sms_recive_num").val($(this).data("hp"));
        });


    });
</script>

<?php
/* (http://www.coolsms.co.kr/devforum)

질문1] 현재 XE 의 textmessage 는 REST API 를 사용하고 있으며, 사용버전이 궁금하시다면 xe/modules/textmessage 폴더 안의
        coolsms.php 파일을 열어보시면 $version 을 확인하시면 됩니다.
$oTextmessageModel = &getModel('textmessage');
$result = $oTextmessageModel->getResult($args);

자세한 에러 관련메시지는 http://www.coolsms.co.kr/REST_API#Response
if( $output->get('error') == "0" ){
	[error] => 0 으로 나오면 에러가 없으므로 확인하실 에러는 없는것입니다. 혹시 에러가 날 경우에는
    [error] => 403
    [code] => "invalidAPIKey"
	이런식으로 나옵니다.

--------------------------------------------
[ output ]
Object Object
(
    [error] => 0
    [message] => success
    [variables] => Array
        (
            [success_count] => 1
            [failure_count] => 0
            [group_id] => R2G5548D6010358C
        )

    [httpStatusCode] =>
)


[ result ]
stdClass Object
(
    [total_count] => 255
    [list_count] => 20
    [page] => 1
    [data] => Array
        (
            [7] => stdClass Object
                (
                    [type] => LMS
                    [accepted_time] => 2015-05-04 14:44:19
                    [recipient_number] => 010-4186-7066
                    [group_id] => R2G554707335329B
                    [message_id] => R2M554707335A6DF
                    [status] => 2
                    [result_code] => 00
                    [result_message] => 정상
                    [sent_time] => 201505041444
                    [text] => [모이어]신청이 정상 접수되었습니다. 결과가 나오면 문자를 드리며 나의상담 메뉴에서 확인가능합니다.

[모이어 법률상담소 특장점]
1. 분야별 전문변호사 배치
2. 팀단위로 진행하여 보다 치밀한 소송진행
3. 작업보고서 제공(사건처리에 실제 투입된 변호사들의 타임테이블)
4. 투입된 업무시간이 적으면 착수금의 일부를 환급하는 안심 착수금 제도
5. 담당변호사 평가, 변경제도
6. 항상 최선을 다하는, 믿고 맡길 수 있는 법률상담소가 되겠습니다.
sangdam.moior.com
                    [carrier] => LGT
                    [scheduled_time] =>
                )

            [8] => stdClass Object
                (
                    [type] => LMS
                    [accepted_time] => 2015-05-04 13:52:48
                    [recipient_number] => 01058251201
                    [group_id] => R2G5546FB20BBD31
                    [message_id] => R2M5546FB20CDCD2
                    [status] => 2
                    [result_code] => 00
                    [result_message] => 정상
                    [sent_time] => 201505041353
                    [text] => [사건종료통지] 비용 문제로 진행의사 없는 것으로 처리하겠습니다.

도움이 못되어 죄송합니다. 다음 연락을 주실 때에는 실질적인 도움을 드릴 수 있도록 더 많은 준비를 해놓겠습니다. 항상 발전하는 모이어 상담소가 되겠습니다. 모쪼록 좋은날만 있으시길 기원합니다 :-) http://sangdam.moior.com
                    [carrier] => LGT
                    [scheduled_time] =>
                )
                   [text] => 모이어 법률상담소입니다.
사건진행여부 확인차 연락드렸습니다.
허종섭 실장 / 김상겸 변호사
편하신 시간에 전화부탁드립니다.

법무법인 예율
서울 강남구 테헤란로 207 아가방빌딩 7층(2호선 역삼역8번출구)입니다.
                    [carrier] => SKT
                    [scheduled_time] =>
                )

        )

)
*/
?>




{{--{{SKHelper::p($ccMails)}}--}}



@stop


{{--@if ($ccMail->done == 1)
<span style="text-decoration: line-through;">
@endif--}}
{{--@if ($ccMail->done == 1)
    </span>
@endif--}}