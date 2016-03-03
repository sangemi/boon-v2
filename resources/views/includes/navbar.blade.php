    <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container-fluid">

            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">

                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar">1</span>
                    <span class="icon-bar">2</span>
                    <span class="icon-bar">3</span>
                </button>
                <a class="navbar-brand" href="{{ url('/') }}">분쟁제로</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                {{--메뉴 시작--}}
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/') }}">Home</a></li>
                </ul>

                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/ccmail/sample') }}">내용증명</a></li>
                </ul>

                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/paymentorder') }}">지급명령</a></li>
                </ul>

                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/consult') }}">승소체크</a></li>
                </ul>


                <ul class="nav navbar-nav navbar-right">

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
