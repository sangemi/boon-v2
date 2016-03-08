<!-- sidebar nav -->
<nav id="sidebar-nav">
    <ul class="nav nav-pills nav-stacked">
        @if(Request::is('ccmail/*')) {{--내용증명--}}
            <li><a href="{{ URL::to('/ccmail/work') }}">
                    <span class="glyphicon glyphicon-save"></span>
                    보관함</a></li>
            <li><a href="{{ URL::to('/request/ccmail') }}">신청내역</a></li>

        @elseif(Request::is('sosong/*'))
            <li><a href="{{ URL::to('/sosong/work') }}">나의 이력</a></li>

        @else
            <li><a href="#">{{Lang::get('boon.내용증명')}}</a></li>
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