@extends('layouts.master') {{--master를 상속받음--}}

@section('title', '단체소송 - 분제로')

@section('sidebar')
    @parent

    <p>단체소송 </p>

@stop

@section('content')

<script type="text/javascript" src="/lib/common.sk.js"></script>


{{--페이지 작은 네비바 대체--}}
<style>

    .breadcrumb > li + li.pull-right:last-child:before {
        content: " "; /* breadcrumb 특정슬래시 없애기. 공백이면안됨*/
    }
</style>

<ol class="breadcrumb">
    <li>
        <a href="{{ URL::to('wave/admin') }}"><span class="glyphicon glyphicon-list" aria-hidden="true"></span> 관리어드민</a>
    </li>
    <li>
        <a href="{{ URL::to('wave/admin/event') }}">event</a>
    </li>


    {{--<li class="pull-right"><a href="{{ URL::to('ip/work/create') }}">
        <span class="btn btn-xs btn-default" aria-hidden="true">의뢰 <span class="fa fa-pencil"></span></span></a>
    </li>--}}


</ol>


<?php

$current_id = Auth::user()->id; // SK인지 확인

echo "<h2>어드민 <a href='/admin/role' style='font-size:0.6em;'>역할관리</a> </h2>";



?>

{{-- 단체SMS 시작 --}}
<div>
    <a href="javascript:void(0);" class="toggle_smsbox btn btn-default">SMS 발송</a>
    <span class="btn btn-xs btn-default" id="btn-no-payment">미입금자 선택</span>
    <span id="sms_to_list" style="font-size:0.8em;color:gray;">리스트를 클릭 후 발송버튼 눌러주세요.</span>
</div>
<script>
    $(document).ready(function(){
        $(".toggle_smsbox").click(function() {
            toggle_smsbox();
        });
        $("#btn-no-payment").click(function() {
            $(".each_client").each(function(){
                var status = $(this).data('chk_payment');
                if( status == '입금완료' || status == '해당없음' || status == '면제') {
                }else{
                    $(this).click();
                }
            });
        });

        /*단체문자. 클릭하면 리스트에 포함됨. 이미 된거면 빼기*/
        $(".each_client").click(function(){
            var final_to_number = '', final_to_name = '', final_to_user_id = '', total_cnt = 0;

            if( $(this).data('clicked') == true ){
                $(this).data('clicked', false); $(this).css('background-color', '');
            }
            else {
                $(this).data('clicked', true) ; $(this).css('background-color', 'yellow');
            }
            $(".each_client").each(function(){
                $(this).css('border', '');
                if($(this).data('clicked')) {
                    final_to_number = final_to_number + ',' + $(this).data('tel');
                    final_to_name = final_to_name + ', ' + $(this).find(".each_name").text();
                    final_to_user_id = final_to_user_id +  ',' + $(this).data('user_id');
                    total_cnt++;
                }
            });
            $(this).css('border', '1px solid red');

            final_to_number = trimChar( trimChar(final_to_number, ' '), ',');
            final_to_name = trimChar( trimChar(final_to_name, ' '), ',');
            final_to_user_id = trimChar( trimChar(final_to_user_id, ' '), ',');
            $("#sms_recive_num").val( final_to_number );
            $("#sms_to_list").html( final_to_name  + " <b>총 "+total_cnt+"명</b>");
            $("#to_user_id").val( final_to_user_id );
        });
    });
</script>

{{-- 단체SMS 끝 --}}



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
    $(function(){

        $('#clientList').css('height', $(window).height() - 65);
        $('#detailInfoBox').css('height', $(window).height() - 105);

        /*따라다니는 레이어 시작*/
        var $win = $(window);
        var top = $(window).scrollTop(); // 현재 스크롤바의 위치값을 반환합니다.
        console.log(top);
        /*사용자 설정 값 시작*/
        var speed          = 100;     // 따라다닐 속도 : "slow", "normal", or "fast" or numeric(단위:msec)
        var easing         = 'linear'; // 따라다니는 방법 기본 두가지 linear, swing
        var $layer         = $('#clientList'); // 레이어 셀렉팅
        var layerTopOffset = 0;   // 레이어 높이 상한선, 단위:px
        $layer.css('position', 'absolute');
        /*사용자 설정 값 끝*/

        // 스크롤 바를 내린 상태에서 리프레시 했을 경우를 위해
        if (top > 0 ) $win.scrollTop(layerTopOffset+top);
        else $win.scrollTop(0);

        //스크롤이벤트가 발생하면
        $(window).scroll(function(){
            yPosition = $win.scrollTop() - 180; //상단간격. 커질수록 위에 붙음
            if (yPosition < 0){ yPosition = 0; }
            $layer.animate({"top":yPosition }, {duration:speed, easing:easing, queue:false});
        });
        /*따라다니는 레이어 끝*/
    });
</script>


    <div style="position:relative;white-space: nowrap;padding:0 10px 10px 10px;">
        <div class="row">
            <div id="clientList" class="bigbox box2 col-xs-4" style="overflow-y:scroll;height:600px;">
                <div style="">

                    <h4 class="text-center">접수인단 <small>[결제]</small></h4>
                    {{--{{ $wave_client->links() }}--}}
                    <?php
                    $amt_total = 0; $cnt_total = 0; $client_arr_untilnow = Array();
                    ?>
                    @if (empty($wave_client))
                        <div class="col-sm-12">
                            내역없습니다.
                        </div>
                    @else
                        @foreach ($wave_client as $no => $client)
                            <?php
                            $amt_total += $client['amt_payment']; $cnt_total++;
                            ?>
                            <div class="each_client" data-tel="<?=\app\Lib\skHelper::tel_db($client['phone'])?>"
                                                    data-chk_payment="<?=$client['chk_payment']?>"
                                                    data-user_id="<?=$client['id']?>">
                                <?=($no+1)?>.
                                <a href="javascript:showClientData('<?=$client['id']?>')">
                                    <span  class="each_name"><?=$client['name']?></span>
                                </a>
                                @if($client['chk_payment'] == '입금완료' || $client['chk_payment'] == '면제')
                                    @if ($current_id == 1 || $current_id == 294 || $current_id == 300 ) {{--SK만 보임--}}
                                        <button class="btn btn-link btn-xs btn-detail open-modal" value="change-payment" data-row_id="<?=$client['id']?>">
                                            <?=number_format($client['amt_payment'])?>원
                                        </button>aaa
                                    @else
                                            <button class="btn btn-link btn-xs btn-detail open-modal" value="change-payment" data-row_id="<?=$client['id']?>">
                                                <?=$client['chk_payment']?>
                                            </button>

                                    @endif
                                @else {{--입금대기 등--}}
                                    <button class="btn btn-default btn-xs btn-detail open-modal" value="change-payment" data-row_id="<?=$client['id']?>"><?=$client['chk_payment']?></button>
                                    <small style="color:gray"><?=$client['data11']?></small>
                                @endif
                                <?php //중복가능성 체크
                                    if(in_array($client['name'], $client_arr_untilnow)){
                                    echo "<small style='color:red;'>*중복확인</small>";
                                    }
                                    $client_arr_untilnow[] = $client['name'];
                                ?>
                            </div>

                        @endforeach
                    @endif


                    <div style="display:block;clear:both;"></div>
                    <?php
                    if ($current_id == 1){ // SK만 보임
                        echo "<p style='background-color:#eee;padding:10px;;' id='div_amt_total'>".number_format($cnt_total)."명 / 총액".number_format($amt_total)."원</p>";
                        ?><script>$(document).ready(function() { $("#detailInfoBox").append($("#div_amt_total").html()) });</script><?php
                    }
                    ?>
                </div>
                <div style="display:block;clear:both;"></div>
                {{--{{ $wave_client->links() }}--}}

            </div>


            <div class="bigbox  col-xs-8 col-xs-offset-4" style="margin-bottom:400px;">
                <div id="userMemoBox"style="background-color: cornsilk;">

                </div>
                <div id="" class="row" style="background-color: cornsilk; padding:20px 0;">
                    <div class="col-sm-10">
                        <textarea name="add_memo" id="textarea_add_memo" class="form-control" placeholder="의뢰인 선택후 메모 입력 (의뢰인에게 안보임)"></textarea>
                    </div>
                    <div class="col-sm-2">
                        <button type="button" id="btnAddMemo" class="form-control">입력</button>
                    </div>
                </div>


                <h4 class="text-center">세부내용</h4>
                <div  id="detailInfoBox">

                </div>
            </div>

        </div>

        <div class="row">

        </div>
    </div>

    <div class="" style="clear:both;display:block;"></div>

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

    function showClientData(clicking_row_id) {
        if(clicking_row_id){
            row_id = clicking_row_id;
            $("#text_now_client").text(row_id);
            showUserMemoBox(clicking_row_id);
            showDetailInfo(clicking_row_id);
        }else alert('row 선택해주세요')
    }

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
                console.log("detail-info : " + JSON.stringify(data)); // js 배열 확인하기
                var detail_html = '';
                var detail_file = '';

                data['file'].forEach(function(value){
                    detail_file += "<a href='" + value['uploaded_filename'] + "' target='_blank'>" + value['title_no'] + "번</a> ";
                    console.log("detail-file : " + JSON.stringify(value)); // js 배열 확인하기
                });
                detail_html =
                        "<div class='detail_client' data-client_id='" + data['data']['id'] + "' >" +

                        "<div class='row'><p class='col-xs-2'></p><p class='col-xs-10'></p></div>" +
                        "<div class='row'><p class='col-xs-2'>유저정보</p><p class='col-xs-10'>" + data['user']['name'] + " " + data['user']['email'] + " <a class='btn btn-link btn-xs btnAutoLogin' data-user_id='"+ data['data']['user_id'] +"'> 이 ID로 강제로긴</a> </p></div>" +

                        "<div class='row'><p class='col-xs-2'>제출파일</p><p class='col-xs-10'>" + detail_file + "</p></div>" +

                        "<div class='row'><p class='col-xs-2'>서류상태</p><p class='col-xs-10'>" + data['data']['chk_proof'] + "</p></div>" +
                        "<div class='row'><p class='col-xs-2'>입금상태</p><p class='col-xs-10'>" + data['data']['chk_payment'] + "[입금액:"+data['data']['amt_payment']+"]원</p></div>" +

                        "<div class='row'><p class='col-xs-2'>소송타입</p><p class='col-xs-10'>" + data['data']['data15'] + "</p></div>" +
                        "<div class='row'><p class='col-xs-2'>내부상태</p><p class='col-xs-10'>" + data['data']['status_inner'] + "</p></div>" +
                        "<div class='row'><p class='col-xs-2'>외부상태</p><p class='col-xs-10'>" + data['data']['status_show'] + "</p></div>" +

                        "<div class='row'><p class='col-xs-2'><b>이름</b></p><p class='col-xs-10'>" + data['data']['name'] + "</p></div>" +
                        "<div class='row'><p class='col-xs-2'><b>전번</b></p><p class='col-xs-10'>" +
                            "<a href='javascript:void(0)' class='btn_smsbox'>" + data['data']['phone'] + "</a>" +
                        "</p></div>" +
                        "<div class='row'><p class='col-xs-2'>주민</p><p class='col-xs-10'>" + data['data']['jumin'] + "</p></div>" +
                        "<div class='row'><p class='col-xs-2'>주소</p><p class='col-xs-10'>" + data['data']['addr'] + "</p></div>" +
                        "<div class='row'><p class='col-xs-2'>주소2</p><p class='col-xs-10'>" + data['data']['addr2'] + "</p></div>" +
                        "<div class='row'><p class='col-xs-2'>우편번호</p><p class='col-xs-10'>" + data['data']['postcode'] + "</p></div>" +
                        "<div class='row'><p class='col-xs-2'>제품명</p><p class='col-xs-10'>" + data['data']['data01'] + "</p></div>" +
                        "<div class='row'><p class='col-xs-2'>구입렌탈일</p><p class='col-xs-10'>" + data['data']['data02'] + "</p></div>" +
                        "<div class='row'><p class='col-xs-2'>설치일</p><p class='col-xs-10'>" + data['data']['data03'] + "</p></div>" +
                        "<div class='row'><p class='col-xs-2'>음용량</p><p class='col-xs-10'>" + data['data']['data04'] + "</p></div>" +
                        "<div class='row'><p class='col-xs-2'>신체증상</p><p class='col-xs-10'>" + data['data']['data05'] + "</p></div>" +
                        "<div class='row'><p class='col-xs-2'>인원</p><p class='col-xs-10'>" + data['data']['data06'] + "</p></div>" +
                        "<div class='row'><p class='col-xs-2'>동거인</p><p class='col-xs-10'>" + data['data']['data07'] + "</p></div>" +
                        "<div class='row'><p class='col-xs-2'>은행명</p><p class='col-xs-10'>" + data['data']['data08'] + data['data']['data09'] + data['data']['data10'] + "</p></div>" +
                        "<div class='row'><p class='col-xs-2'>입금인</p><p class='col-xs-10'>" + data['data']['data11'] + "</p></div>" +

                        "<div class='row'><p class='col-xs-2'>성보입금</p><p class='col-xs-10'>" + data['data']['bank_name'] + data['data']['bank_number']+ data['data']['bank_owner'] + "</p></div>" +

                        "<div class='row'><p class='col-xs-2'>철회여부</p><p class='col-xs-10'>" + data['data']['withdraw'] + "</p></div>" +
                        "<div class='row'><p class='col-xs-2'>비고</p><p class='col-xs-10'>" + data['data']['bigo'] + "</p></div>" +
                        "<div class='row'><p class='col-xs-2'>접수일</p><p class='col-xs-10'>" + data['data']['created_at'] + "</p></div>" +

                        "<div class='row'><p class='col-xs-12 text-right'><span class='btn-del-client btn btn-xs btn-default'>신청서 삭제</span></p></div>" +
                        "</div>"
                ;

                $("#detailInfoBox").html(detail_html);
            },
            error: function (data) {
                console.log('SK Error:', data);
            }
        });


    }
    function showUserMemoBox(){
        var my_url = url;
        my_url += '/' + "show-user-memo";
        var formData = {
            row_id: row_id
        };
        $.ajax({
            type: "POST", url: my_url, data: formData, dataType: 'json',
            success: function (data) {
                console.log("detail-memo : " + JSON.stringify(data)); // js 배열 확인하기
                if(data['result'] == 'success') {
                    var memo_html = '';
                    data['data'].forEach(function(value){
                        memo_html +=
                            "<div class='col-sm-6' style='padding:3px;'>"+
                            "<div class='' style='padding:5px;background-color:#efefef; border:1px solid gray;' data-client_id='" + value['id'] + "'>" +
                                "<div class=''>" +
                                "<p class='' style=''>" + value['memo'] + "</p>" +
                                "</div>" +
                            "<p class='' style='font-size:0.6em;'></p>" +
                            "<p style='font-size:0.6em;'>타입 " + value['memo_type'] + " /입력 " + value['reg_id'] + " /담당 " + value['in_charge_id'] + "/처리 " + value['in_charge_check'] +'</p>'+
                                "<p class='text-right'>" + value['created_at'].substring(5,16) + " <span class='btn-del-memo btn btn-xs btn-default'>del</span></p>" +
                            "</div>" +
                            "</div>"
                            ;
                    });
                    $("#userMemoBox").html(memo_html);
                }else{
                    $("#userMemoBox").html('메모가 없습니다.');
                }
            },
            error: function (data) {
                console.log('SK Error 넘긴값 :', formData); console.log('SK Error 반환값 :', data);
            }
        });
    }


    $(document).ready(function() {


        // 관리자 오토로그인
        $(document).on('click', '.btnAutoLogin', function() {
            var my_url = '';
            my_url = '/member/autologin';
            alert($(this).data('user_id'));
            var formData = {
                user_id: $(this).data('user_id')
            };
            console.log("formData-autologin : " + JSON.stringify(formData)); // js 배열 확인

            $.ajax({
                type: "POST",
                target:'_blank',
                url: my_url,
                data: formData,
                dataType: 'json',
                success: function (data) {
                    console.log("autologin : " + JSON.stringify(data)); // js 배열 확인
                    if(data['result'] == 'success') {
                        alert('로긴성공. 새창을 띄워서 작업 > 새창에서 로그아웃 > 새창에서 관리자로긴 > 이창으로 돌아와 계속작업')
                    }
                },
                error: function (data) {
                    console.log('SK Error 넘긴값 :', formData); console.log('SK Error 반환값 :', data);
                }
            });
        });

        $('#btnAddMemo').click(function () { // 메모 신규입력
            if(!row_id) return false;
            var my_url = url;
            my_url += '/' + "add-user-memo";
            var formData = {
                row_id: row_id,
                memo: $("#textarea_add_memo").val()
            };
            console.log("aformDatamo : " + JSON.stringify(formData)); // js 배열 확인

            $.ajax({
                type: "POST",
                url: my_url,
                data: formData,
                dataType: 'json',
                success: function (data) {
                    console.log("add-memo : " + JSON.stringify(data)); // js 배열 확인
                    if(data['result'] == 'success') {
                        var memo_html = $("#textarea_add_memo").val();
                        $("#userMemoBox").html( $("#userMemoBox").html() + '<p>입력완료 : ' + memo_html + '</p>');
                        $("#textarea_add_memo").val('');
                    }else{
                        $("#userMemoBox").html('메모입력오류');
                    }
                },
                error: function (data) {
                    console.log('SK Error 넘긴값 :', formData); console.log('SK Error 반환값 :', data);
                }
            });
        });

        $(document).on('click', '.btn-del-client', function() {
            if(confirm('정말 삭제하시겠습니까? \n\n되돌릴 수 없습니다.')){

                $this = $(this);
                var my_url = '/wave/client/' + $this.parents(".detail_client").data('client_id');
                var formData = {
                    /* client_id: $(this).parents(".detail_client").data('client_id'),*/
                }

                $.ajax({
                    type: "DELETE", url: my_url, data: formData, dataType: 'json',
                    success: function (data) {
                        console.log(data);
                        if(data['result'] == 'success'){
                            $this.parents(".detail_client").html("삭제되었습니다");
                        }else{
                            alert(data['result'] + '\n\n' + data['data']);
                        }
                    },
                    error: function (data) { console.log('SK Error:', data); }
                });
            }
        });


        //display modal form for task editing
        $('.open-modal').click(function () { // 수정시. 신규입력시에는 task_name = '';로 해서 하자.
            task_name = $(this).val();
            row_id = $(this).data('row_id');
            showClientData(row_id);
            $('#myModal').modal('show');

            /*var task_name = $(this).val();
            $.get(url + '/' + task_name, function (data) {

            })*/
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

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
    #sms_content {width:180pxdow heig; height:150px; border:1px solid #98b2cc;}
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

        <form name="formSMS발송" id="formSMS발송" action="/sms" method="post"  enctype='multipart/form-data' target="winNewSMS">
            {{--<form name="formSMS발송" id="formSMS발송" action="/lawfirm/consult.ajax.lawfirm.php" method="post"  enctype='multipart/form-data' target="winNewSMS">--}}
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
            console.log(str);
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