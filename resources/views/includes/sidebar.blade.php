<!-- sidebar nav -->
<nav id="sidebar-nav">
    <ul class="nav nav-pills nav-stacked">
        @if(Request::is('ccmail/*'))
            <li><a href="{{ URL::to('/ccmail/work') }}">보관함</a></li>
            <li><a href="{{ URL::to('/request') }}">발송내역</a></li>
        @elseif(Request::is('sosong/*'))
            <li><a href="{{ URL::to('/sosong/work') }}">나의 이력</a></li>
        @else
            <li><a href="#">{{Lang::get('boon.내용증명')}}</a></li>
            <li><a href="#">{{Lang::get('boon.지급명령')}}</a></li>
            <li><a href="#">승소체크</a></li>

        @endif

    </ul>
</nav>