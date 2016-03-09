<style>
    /*사이드바의 탑 타이틀*/
    @import url('http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,900');

    article.title{

        margin: 0 auto 0 auto;
        padding-bottom: 0px;
        font-family: 'Source Sans Pro', sans-serif;
    }
    article.title p{
        width: 100%;
        max-width:500px;
        margin: 0 auto 0 auto;
    }

    .title-container{
        background-color: ;
        position: relative;
        width: 100%;
        max-width:500px;
        height: 60px;
        margin: 0 auto 0 auto;
        font-family: 'Source Sans Pro', sans-serif;
        line-height: normal;
    }

    .title-container h1{
        font-weight: normal;
        padding: 0;
        margin: 0;
        position: absolute;
    }
    .title-container h1.small{
        font-size: 15px;
        font-weight: 300;
        color:#a29595;
    }
    .title-container h1.large{
        font-size: 28px;
        font-weight: 900;
        color:#5d5959;
        font-style:italic;
    }

    #line-1{
        top:0;        left: 3%;
    }
    #line-2{
        top:28%;        left: 6%;
    }
    /*사이드바의 탑 타이틀 끝*/
</style>


<!-- sidebar nav -->
<nav id="sidebar-nav">
    <ul class="nav nav-pills nav-stacked">
        @if(Request::is('ccmail/*')) {{--내용증명--}}
            <article class="title">
                <div class="title-container">

                    <h1 class="small" id="line-1">분쟁관리</h1>
                    <h1 class="large"id="line-2">내용증명</h1>

                </div>
            </article>
            <li><a href="{{ URL::to('/ccmail/sample') }}"><span class="glyphicon glyphicon-th"></span> 샘플</a></li>
            <li><a href="{{ URL::to('/ccmail/work') }}"><span class="glyphicon glyphicon-save"></span> 보관함</a></li>
            <li><a href="{{ URL::to('/request/ccmail') }}">신청내역</a></li>

        @elseif(Request::is('sosong/*'))
            <li><a href="{{ URL::to('/sosong/work') }}">나의 이력</a></li>

        @else {{--메인메뉴 등 일반적인 경우--}}
            <article class="title">
                <div class="title-container">

                    <h1 class="small" id="line-1">분쟁관리</h1>
                    <h1 class="large"id="line-2">Boon Zero</h1>

                </div>
            </article>
            <li><a href="/ccmail/sample">{{Lang::get('boon.내용증명')}}</a></li>
            {{--<li><a href="#">{{Lang::get('boon.지급명령')}}</a></li>
            <li><a href="#">승소체크</a></li>--}}

        @endif

        <li><a href="{{ URL::to('/boon/status') }}"><small>포인트 충전</small></a></li>

        {{--구글 배너광고--}}
        <li>
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
        </li>
    </ul>
</nav>