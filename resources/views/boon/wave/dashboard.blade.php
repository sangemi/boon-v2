@extends('layouts.master') {{--master를 상속받음--}}

@section('title', '단체소송 - 분제로')

@section('sidebar')
    @parent

    <p>기업 </p>

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

    .bigbox {width:48%;height:300px;border:1px solid white;background-color:#fff;float:left;margin-right:1%;margin-bottom:5px;
        border-radius:10px;
    }
    .bigbox h4 {border-bottom:1px solid tomato;padding:8px 0 3px 0;color:tomato;margin-top:0px;border-top-left-radius:10px;border-top-right-radius:10px;}
    h1 { color: #00BFFF; }

    }
</style>

    <div class="text-center" style="overflow-x:scroll;white-space: nowrap;padding:0 10px 10px 10px;">
        <div class="row">
            <div class="bigbox box2" style="overflow-y:scroll">
                <h4>접수인단 <small>[결제]</small></h4>

                @if (empty($wave_client))
                    <div class="col-sm-12">
                        내역없습니다.
                    </div>
                @else
                    @foreach ($wave_client as $no => $client)

                        <div><?=($no+1)?>. <?=$client['name']?>
                            [<a href="/wave/admin?mode=change_payment"><?=$client['chk_payment']?>/<?=$client['data11']?></a>]
                            <button class="btn btn-warning btn-xs btn-detail open-modal" value="change-payment" data-row_id="<?=$client['id']?>">Edit</button>
                        </div>

                    @endforeach

                @endif

            </div>

            <div class="bigbox" style="white-space:normal;">
                <h4>자료업로드</h4>
                <ul style="text-align: left;margin-left:10px;list-style-type:none;">
                    <li>발진 피부사진, 관련 진단서 등<br>향후 요청시 업로드주세요</li>
                </ul>
                <a class="btn btn-sm btn-default" disabled>업로드</a>
                <br>
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
    $(document).ready(function() {

        var url = "/wave/admin/tasks";
        var task_name = '',row_id = '';
        //display modal form for task editing
        $('.open-modal').click(function () { // 수정시. 신규입력시에는 task_name = '';로 해서 하자.
            task_name = $(this).val();
            row_id = $(this).data('row_id');
            $('#myModal').modal('show');

            /*var task_name = $(this).val();
            $.get(url + '/' + task_name, function (data) {

            })*/
        });

        //create new task / update existing task
        $("#btn-save").click(function (e) {
            /*이것때문에 500 에러 생김!! ㅜ.ㅜ 3시간쯤*/
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            })

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
                type = "PUT"; //for updating existing resource //PUT
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