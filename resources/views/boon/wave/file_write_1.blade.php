
@extends('layouts.master') {{--master를 상속받음--}}

@section('title', '분쟁제로 - 내용증명')

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
    .big {font-size:24px;margin:20px 0;}
    .big1{font-size:16px;margin:40px 0;}
    .big2{font-size:14px;margin:10px 0;margin-left:10px;}
    .batang {margin-left:30px;line-height:150%;font-family:;}
    .hang {margin-left:10px;line-height:180%;font-family:;}
    .b {font-weight:bold}
    .c {text-align:center}
    #wrap_paper {border:1px solid gray;height:300px;overflow-x:auto;overflow-y:scroll;background-color:#eeeeee;margin:30px auto 0 auto;padding:20px;}

</style>

<style>
    .breadcrumb > li + li.pull-right:last-child:before {
        content: " "; // breadcrumb 특정슬래시 없애기. 공백이면안됨
    }
</style>


{{--세부페이지 네비바--}}
<ol class="breadcrumb">
    <li><a href="{{ URL::to('wave/mypage') }}">
            <span class="glyphicon glyphicon-list" aria-hidden="true"></span> 상황실</a></li>

    <li class="active">증거자료 업로드</li>

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
                    단체소송 증거자료 관리
                </b>
            </div>

            {!! BootForm::openHorizontal(['sm' => [2, 10],'lg' => [2, 10]])->id('form-단체소송')
                ->action('/wave/file')->enctype("multipart/form-data") !!} {{----}}
            {{--{!! Form::open(array('url' => '/wave/file','files'=>'true'))  !!}--}}
            {!! BootForm::bind($waveFile) !!}
            {!! BootForm::hidden( "client_id" )->value(Request::get('client_id')) !!}
            {!! BootForm::hidden( "title_no" ) !!}
            {!! BootForm::hidden( "title" ) !!}

            <style>
                .choice-file_type {background-color:white;text-align:center;width:154px;min-height:70px;float:left;border-radius:10px;margin:6px;border:1px solid gray;
                    padding:10px;}
                /*width:144px;height:128px;*/
                .choice-file_type:hover {border:3px solid gray;}
                .document-no {font-weight:bold;color:gray;}
                .document-ok {background-color:cornflowerblue;color:white;}
            </style>
            <script>
                $(document).ready(function(){
                    $(".choice-file_type").click(function(){
                        $("input[name=title_no]").val( $(this).data("title_no") );
                        $("input[name=title]").val( $.trim( $(this).text() ) );
                        $("#text_explain").html( "<h4>" + $(this).text() + "</h4>" + $(this).data("explain") );

                    });
                });
            </script>
            <div style="border:1px solid #dadada;background-color:#dadada">

                <div class="choice-file_type <?=$document_ok[1]?>" style="" data-title_no="1" data-explain="구입/렌탈 계약서가 없는 경우, 월사용료 고지서 등. <br />서류가 없는 경우에는 고객센터에서 제품번호, 계약일자를 알아내서 신청서에 입력해주셔야 합니다.">
                    계약서
                </div>
                <div class="choice-file_type <?=$document_ok[2]?>" style="" data-title_no="2" data-explain="<p>시리얼번호 사진이 없는 경우, 제품의 설치된 모습 사진</p>">
                    시리얼번호/제품 사진
                </div>
                <div class="choice-file_type <?=$document_ok[3]?>" style="" data-title_no="3" data-explain="모발/소변/혈액검사 결과지">
                    중금속 검사결과
                </div>
                <div class="choice-file_type <?=$document_ok[4]?>" style="" data-title_no="4" data-explain="사적으로 수질검사를 한 경우에만 업로드 하시면 됩니다.">
                    수질 검사결과
                </div>

                <div class="choice-file_type <?=$document_ok[5]?>" style="" data-title_no="5" data-explain="사안과 관련하여 재판부에 하실 말씀을 자유롭게 써서, 스캔/촬영하여 올려주세요.
                <br>(아기의 발진으로 마음고생을 하였다 등. 정신적 고통 포함)
                <br><br>샘플<br><img src='/site/wave/images/paper_jinsul.png' style='width:350px;border:1px solid gray;' />">
                    진술서
                </div>

                <div class="choice-file_type <?=$document_ok[6]?>" style="" data-title_no="6" data-explain="음용기간 중 진단서만 가능. 스캔 또는 촬영해서 올려주세요.">
                    (B타입만) 진단서
                </div>
                <div class="choice-file_type <?=$document_ok[7]?>" style="" data-title_no="7" data-explain="음용기간 중 영수증만 가능. 기왕증이 있는 경우 감액가능성 있습니다.">
                    (B타입만) 의료비용 지출영수증
                </div>
                <div class="choice-file_type <?=$document_ok[8]?>" style="" data-title_no="8" data-explain="눈으로 보이는 질환의 경우, 증상을 찍어 업로드해주세요.">
                    (B타입만) 피부질환 등 사진자료
                </div>
                <div style="clear:both;"></div>


                <?/*=$suit['explain']*/?>


            </div>

            <div class="panel-body ">

                <div class="" style="border:3px solid gray;padding:20px;margin-bottom:20px;">

                    <div id="text_explain" class="text-center">위 버튼을 클릭해주세요</div>

                </div>

                {!! BootForm::file( "파일선택" , 'file_data')  !!}
                {!! BootForm::text( "파일설명" , 'file_explain')->placeholder("특별한 설명이 필요한 경우에만 적어주세요.")  !!}



                {{--{!! BootForm::textarea('비고', 'bigo')->addClass('ccmail-content') !!}--}}

                {{--{!! BootForm::submit('접수') !!}--}}
                <div class="form-group"><div class="col-sm-offset-2 col-sm-10 col-lg-offset-2 col-lg-10">
                    <button type="submit" class="btn btn-default btn-primary btn-lg">업로드</button>
                </div></div>

                <div class="form-group">
                    <label class="col-sm-2 col-lg-2 control-label">증거제출 방법</label>
                    <div class="col-sm-10 col-lg-10">
                        <b style="font-size:1.2em;">
                            1. 증거목록을 클릭한 이후<br>2. 파일선택 버튼을 눌러주세요.<br>3. 업로드버큰 클릭<br>4. 각 증거마다 업로드를 별개로 해주세요.<br>
                            *. 파란색은 파일이 정상적으로 업로드 되었다는 표시입니다.
                        </b>
                        <div><small>핸드폰으로 사진을 찍어 올리셔도 되고, 복사기로 스캔하셔도 됩니다.</small></div>
                    </div>
                </div>


                <div class="" style="border:0px solid gray;padding:20px;margin-bottom:20px;">

                    <div id="text_explain" class="text-center">기제출증거 (확인중)</div>

                </div>


            </div>
            {!! BootForm::close() !!}

            <div class="panel-footer">

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
