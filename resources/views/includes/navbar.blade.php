    <style>
        #navbar-top {
            -moz-box-shadow: 0px 0px 10px #000;
            -webkit-box-shadow: 0px 0px 10px #000;
            box-shadow: 0px 0px 10px #000;
        }
        #navbar-top a.navbar-brand {
            font-size:1.7em; font-weight: 300; font-family: "Noto Sans CJK", "맑은 고딕";
            letter-spacing: -1.5px;
            color:goldenrod;
            text-shadow: 0px 2px 3px #555;
        }

    </style>
    <nav class="navbar navbar-inverse navbar-static-top" id="navbar-top"
         style="background-image: url(http://cdn.backgroundhost.com/backgrounds/subtlepatterns/always_grey.png);"
    >  {{--navbar-inverse--}}
        <div class="container-fluid">

            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">줄3 아이콘</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url('/') }}" style="">
                    {{--<nobr>
                        <img src="http://localhost/img/v1/peace_tree.png" style="width:52px;">
                    </nobr>--}}
                    예율

                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                {{--메뉴 시작--}}
                {{--<ul class="nav navbar-nav">
                    <li><a href="{{ url('/') }}"></a></li>
                </ul>--}}

                <ul class="nav navbar-nav">
                    <li><a href="{{ url('') }}">Intro</a></li>
                </ul>

                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/wave') }}">단체소송</a></li>
                </ul>

                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/ccmail/sample') }}">내용증명</a></li>
                </ul>

                {{--<ul class="nav navbar-nav">
                    <li><a href="{{ url('/payorder/sample') }}">지급명령</a></li>
                </ul>--}}

                {{--<ul class="nav navbar-nav">
                    <li><a href="{{ url('/consult') }}">승소체크</a></li> / 소송검토
                </ul>--}}


                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ URL::to('/boon/status') }}"><small>충전</small></a></li>
                    @if (Auth::guest())
                        <li><a href="{{ url('/auth/login') }}">
                                <span class="icon icon-user fa fa-sign-in"></span>
                                로그인 </a></li>
                        <li><a href="{{ url('/auth/register') }}">회원가입</a></li>
                    @else
                        {{--<li><img class="circ" src="{{ Gravatar::get(Auth::user()->email)  }}"></li>--}}
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <img src="/img/v1/icon_people.svg" style="width:22px;" />
                                <span class="caret"></span></a>

                            <ul class="dropdown-menu" role="menu">

                                <li><a href="{{ url('/member/mypage') }}" >{{ Auth::user()->name }}</a></li>
                                <li><a href="{{ url('/auth/logout') }}">로그아웃</a></li>

                                @if(Auth::check() && (Auth::user()->name == '김상겸' || Auth::user()->name == '정지혜'
                                                     || Auth::user()->name == '김수로' || Auth::user()->name == '최다현'  ) )
                                    <li><a href="/admin/">관리화면</a></li>
                                @endif

                            </ul>
                        </li>
                    @endif

                </ul>

            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

{{--
@include('alerts.alert')--}}
