<!-- sidebar nav -->
<nav id="sidebar-nav">
    <ul class="nav nav-pills nav-stacked">
        @if(Request::is('ccmail/*'))
            <li><a href="{{ URL::to('/ccmail/work') }}">
                    <span class="glyphicon glyphicon-save"></span>
                    보관함</a></li>
            <li><a href="{{ URL::to('/request/ccmail') }}">신청내역</a></li>
        @elseif(Request::is('sosong/*'))
            <li><a href="{{ URL::to('/sosong/work') }}">나의 이력</a></li>
        @else
            <li><a href="#">{{Lang::get('boon.내용증명')}}</a></li>
            <li><a href="#">{{Lang::get('boon.지급명령')}}</a></li>
            <li><a href="#">승소체크</a></li>

        @endif

        <li><a href="{{ URL::to('/boon/status') }}">포인트 충전</a></li>
    </ul>
</nav>