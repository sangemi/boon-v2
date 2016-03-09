    <style>

    </style>
    <nav class="navbar navbar-inverse navbar-static-top"
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
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{--<nobr>
                        <img src="http://localhost/img/v1/peace_tree.png" style="width:52px;">
                    </nobr>--}}Boon
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                {{--메뉴 시작--}}
                {{--<ul class="nav navbar-nav">
                    <li><a href="{{ url('/') }}"></a></li>
                </ul>--}}

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
                                <i class="fa fa-search icon icon-search"></i>
                                <span class="icon icon-user fa fa-sign-in"></span>
                                Login </a></li>
                        <li><a href="{{ url('/auth/register') }}">Register</a></li>
                    @else
                        {{--<li><img class="circ" src="{{ Gravatar::get(Auth::user()->email)  }}"></li>--}}
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/auth/logout') }}">Logout</a></li>

                            </ul>
                        </li>
                    @endif

                </ul>

            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

{{--
@include('alerts.alert')--}}
