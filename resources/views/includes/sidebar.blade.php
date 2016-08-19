<style>
    /*사이드바의 탑 타이틀*/
    @import url('http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,600');
    .title-area{
        padding:10px;
        margin: 0 auto 0 auto;
        padding-bottom: 0px;
        font-family: 'Source Sans Pro', sans-serif;
        background-image:url(http://cdn.backgroundhost.com/backgrounds/subtlepatterns/random_grey_variations.png);
    }
    .title-container{
        background-color: ;  position: relative;
        width: 100%;  max-width:500px;
        height: 60px;
        margin: 0 auto 0 auto;
        font-family: 'Source Sans Pro', sans-serif;
        line-height: normal;
    }
    .title-container h1{
        font-weight: normal;  padding: 0;  margin: 0;  position: absolute;
    }
    .title-container h1.title-small{
        font-size: 15px;  font-weight: 300;  color:#bbb;
        top:0;        left: 2%;
    }
    .title-container h1.title-large{
        font-size:1.7em; font-weight: 400; font-family: "맑은 고딕"; /*Noto Sans CJK SC Thin*/
        letter-spacing: -1.5px;
        color:goldenrod;  text-shadow: 0px 2px 3px #555;
        display: inline-block;  white-space: nowrap;
        top:30%;      left: 8%;
    }
    /*사이드바의 탑 타이틀 끝*/

    /*사이드 박스화*/
    .neat-box{
        border:1px solid #fff;  margin-bottom:20px;  background-color: #fff;
        -moz-box-shadow: 0px 0px 5px #999;  -webkit-box-shadow: 0px 0px 5px #999;  box-shadow: 0px 0px 5px #999;
    }


</style>



<div class="neat-box">
<!-- sidebar nav -->
<nav id="sidebar-nav">
    <ul class="nav nav-pills nav-stacked">
        @if(Request::is('forum*'))
            <div class="title-area">
                <div class="title-container">
                    <h1 class="title-small">분쟁관리</h1>
                    <h1 class="title-large">분제로</h1>
                </div>
            </div>
            <li><a href="{{ URL::to('/forum') }}" style="white-space:nowrap"><span class="fa  fa-folder-o"></span> 커뮤니티 홈</a></li>
            <li><a href="{{ URL::to('/forum/1') }}" style="white-space:nowrap"><span class="fa  fa-folder-o"></span> 자유게시판</a></li>
            <li><a href="{{ URL::to('/forum/7') }}" style="white-space:nowrap"><span class="fa  fa-folder-o"></span> 응원게시판</a></li>
            <li><a href="{{ URL::to('/forum/4') }}" style="white-space:nowrap"><span class="fa  fa-folder-o"></span> 집단소송 공지</a></li>


        @elseif(Request::is('ccmail/*')) {{--내용증명--}}
            <div class="title-area">
                <div class="title-container">

                    <h1 class="title-small">분쟁관리</h1>
                    <h1 class="title-large">내용증명</h1>

                </div>
            </div>

            {{--<li><a href="{{ URL::to('/help/ccmail') }}"><span class="fa fa-exclamation"></span> 내용증명이란</a></li>--}}
            <li><a href="{{ URL::to('/help/ccmail') }}" style="white-space:nowrap"><span class="fa  fa-folder-o"></span> 내용증명이란</a></li>
            <li><a href="{{ URL::to('/ccmail/sample') }}"><span class="glyphicon glyphicon-th"></span> 샘플</a></li>
            <li><a href="{{ URL::to('/ccmail/work') }}"><span class="glyphicon glyphicon-save"></span> 보관함</a></li>
            <li><a href="{{ URL::to('/request') }}">신청내역</a></li>

        <li><a href="{{ URL::to('/boon/status') }}"><small>포인트 충전</small></a></li>



        @elseif(Request::is('sosong/*'))
            <li><a href="{{ URL::to('/sosong/work') }}">나의 이력</a></li>
            <li><a href="{{ URL::to('/boon/status') }}"><small>포인트 충전</small></a></li>




        @elseif(Request::is('wave*'))
            <div class="title-area">
                <div class="title-container">
                    <h1 class="title-small">분쟁관리</h1>
                    <h1 class="title-large">단체소송</h1>
                </div>
            </div>
            {{--<li><a href="{{ URL::to('/forum/6') }}" style="white-space:nowrap"><span class="fa  fa-folder-o"></span> 공지사항</a></li>--}}
            <li><a href="{{ URL::to('/wave/mypage') }}" style="white-space:nowrap"><span class="fa  fa-folder-o"></span> 상황실</a></li>
            <li><a href="{{ URL::to('/forum/4') }}" style="white-space:nowrap"><span class="fa  fa-folder-o"></span> 게시판</a></li>
            <li><a href="{{ URL::to('/wave/probono') }}" style="white-space:nowrap"><span class="fa  fa-folder-o"></span> 공익활동</a></li>
            <li><a href="{{ URL::to('/wave/recommendResult') }}" style="white-space:nowrap"><span class="fa  fa-folder-o"></span> 추천활동</a></li>

            @if ( Auth::check() )
                <?php $current_id = Auth::user()->id; ?>
                @if ($current_id == 1 || $current_id == 231 || $current_id == 294 || $current_id == 300 || $current_id == 16)
                    <li><a href="{{ URL::to('/wave/admin') }}" style="white-space:nowrap"><span class="fa  fa-folder-o"></span> 관리자</a></li>
                    <li><a href="{{ URL::to('/wave/admin/event/6') }}" style="white-space:nowrap"><span class="fa  fa-folder-o"></span> [인]이벤트</a></li>
                @endif
            @endif

            {{--<li><a href="javascript:alert('대기중입니다')">나의 이력</a></li>--}}

        @else {{--메인메뉴 등 일반적인 경우--}}
            <div class="title-area">
                <div class="title-container">

                    <h1 class="title-small">Boonzero</h1>
                    <h1 class="title-large">분쟁관리</h1>

                </div>
            </div>

            {{--<li><a href="#">{{Lang::get('boon.지급명령')}}</a></li>
            <li><a href="#">승소체크</a></li>--}}

        @endif






    </ul>
</nav>
</div>
    {{--구글 배너광고--}}
    <div style=" max-height:500px;overflow-y:hidden;">
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- Boonzero.com -->
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-client="ca-pub-6287081345728133"
             data-ad-slot="1676107409"
             data-ad-format="auto"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>

    </div>
    <div style="">

    </div>
