
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
                    증거 업로드 - 인터파크 정보유출 사건
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

                <div class="choice-file_type <?=$document_ok[1]?>" style="" data-title_no="1" data-explain="<p>인터파크 웹사이트에서 유출여부를 확인해주세요.<br>해당 화면을 캡쳐(또는 휴대폰 사진)해서 업로드 해주세요.
                    <br><a href='http://www.interpark.com/malls/popup_apoligize.html' target='_blank'>>> 바로가기 클릭 <<</a>
                    <br><b>스마트폰에서 반응이 없는 경우</b>
                    <br>브라우저 설정에서 팝업차단기능을 꺼주세요. 안될경우 PC에서 확인해주세요.
                    <br><br>
                    <div class='well'>
                    ※ 캡쳐화면이 없는 경우 ※ <br>
                    내부 논의 후 인터파크 ID만를 알고 계신 경우 소송진행 가능하도록 정책 변경하였습니다.<br>
                    미처 캡처를 못하시고 탈퇴한경우, 캡쳐화면 대신 직접 '사실확인서'를 써서 업로드 바랍니다.
                    <br>A4용지에 다음 내용을 써서 '유출결과화면'에 올려주세요.
                    <br><br><b>사실확인서</b><br>본인은 인터파크 가입자 OOO입니다 (아이디 : xxx).
                    <br>현재는 피고 회사 사이트를 탈퇴하였으나, 사건 발생 후 인터파크 사이트 내에서 정보유출이 되었다는 사실을 확인하였습니다.
                    <br>2016. x. x. OOO (인)
                    </div>

                    </p>">
                    (필수) 유출결과 화면
                </div>
                <div class="choice-file_type <?=$document_ok[2]?>" style="" data-title_no="2" data-explain="사안과 관련하여 재판부에 하실 말씀을 A4용지에 자유롭게 써서, 스캔/촬영하여 올려주세요.
                <br>
                <br><br>샘플<br><img src='/img/wave/wave-interpark-jinsul.jpg' style='width:350px;border:1px solid gray;' />">
                    (선택) 탄원서
                </div>
                <div class="choice-file_type <?=$document_ok[3]?>" style="" data-title_no="3" data-explain="기타 도움이 될만한 자료">
                    기타
                </div>

                <div class="choice-file_type <?=$document_ok[9]?>" style="" data-title_no="9" data-explain="신청자가 미성년일 경우 부모의 소송위임 동의가 필요합니다. <br> 가족관계증명서의 제출로 소송동의를 갈음합니다.">
                    (미성년) 가족관계증명서
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
                        <div><small>잘못 올리신 경우 파일을 선택한 후 다시 업로드 해주세요.</small></div>
                    </div>
                </div>


                <div class="" style="border:0px solid gray;padding:20px;margin-bottom:20px;">

                    <div id="text_explain" class="text-center">제출한 파일 리스트</div>
                    <table class="table">
                        <tr>
                        <th>번호. 종류</th><th>파일명</th><th>비고</th><th>미리보기</th>
                        </tr>
                    @foreach( $uploaded_files as $key => $uploaded_file)
                        <tr>
                            <td><?=$uploaded_file['title_no']?>. <?=$uploaded_file['title']?></td>
                            <td><a href="<?=$uploaded_file['uploaded_filename']?>" target="_blank"><small><?=$uploaded_file['source_filename']?></small></td>
                            <td><small><?=$uploaded_file['explain']?></small></td>
                            <td><div style="height:100px;width:150px;background-size:cover;
                                background-image:url('<?=$uploaded_file['uploaded_filename']?>');"></div></td>
                            <!--<td><?=substr($uploaded_file['created_at'], 0, 10)?></td>-->
                        </tr>
                    @endforeach
                    </table>

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
