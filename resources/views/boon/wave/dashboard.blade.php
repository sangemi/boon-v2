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
    <li><a href="{{ URL::to('wave/admin') }}">
            <span class="glyphicon glyphicon-list" aria-hidden="true"></span> 관리어드민</a></li>


    {{--<li class="pull-right"><a href="{{ URL::to('ip/work/create') }}">
        <span class="btn btn-xs btn-default" aria-hidden="true">의뢰 <span class="fa fa-pencil"></span></span></a>
    </li>--}}


</ol>


{{-- 검색부분 끝 --}}
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
            <div id="detailClient" class="bigbox box2 col-xs-3" style="overflow-y:scroll;height:600px;">
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
                            <div><?=($no+1)?>.
                                <a href="javascript:showDetailInfo('<?=$client['id']?>')">
                                    <?=$client['name']?>
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

            <div class="bigbox  col-xs-9" style="white-space:normal;">
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
                        "<div class='row'><p class='col-xs-2'><b>전번</b></p><p class='col-xs-10'>" + data['data']['phone'] + '</p></div>' +
                        "<div class='row'><p class='col-xs-2'>주민</p><p class='col-xs-10'>" + data['data']['jumin'] + '</p></div>' +
                        "<div class='row'><p class='col-xs-2'>주소</p><p class='col-xs-10'>" + data['data']['addr'] + '</p></div>' +
                        "<div class='row'><p class='col-xs-2'>주소2</p><p class='col-xs-10'>" + data['data']['addr2'] + '</p></div>' +
                        "<div class='row'><p class='col-xs-2'>우편번호</p><p class='col-xs-10'>" + data['data']['postcode'] + '</p></div>' +
                        "<div class='row'><p class='col-xs-2'>제품명</p><p class='col-xs-10'>" + data['data']['data01'] + '</p></div>' +
                        "<div class='row'><p class='col-xs-2'>구입/렌탈 날짜</p><p class='col-xs-10'>" + data['data']['data02'] + '</p></div>' +
                        "<div class='row'><p class='col-xs-2'>설치일</p><p class='col-xs-10'>" + data['data']['data03'] + '</p></div>' +
                        "<div class='row'><p class='col-xs-2'>음용량</p><p class='col-xs-10'>" + data['data']['data04'] + '</p></div>' +
                        "<div class='row'><p class='col-xs-2'>현재 신체 이상증세</p><p class='col-xs-10'>" + data['data']['data05'] + '</p></div>' +
                        "<div class='row'><p class='col-xs-2'>인원</p><p class='col-xs-10'>" + data['data']['data06'] + '</p></div>' +
                        "<div class='row'><p class='col-xs-2'>동거인정보</p><p class='col-xs-10'>" + data['data']['data07'] + '</p></div>' +
                        "<div class='row'><p class='col-xs-2'>은행명</p><p class='col-xs-10'>" + data['data']['data08'] + data['data']['data09'] + data['data']['data10'] + '</p></div>' +
                        "<div class='row'><p class='col-xs-2'>입금자명</p><p class='col-xs-10'>" + data['data']['data11'] + '</p></div>' +

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


    {{--{{SKHelper::p($ccMails)}}--}}



@stop


{{--@if ($ccMail->done == 1)
<span style="text-decoration: line-through;">
@endif--}}
{{--@if ($ccMail->done == 1)
    </span>
@endif--}}