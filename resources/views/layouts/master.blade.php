<!DOCTYPE html>
<html>

@include('includes.head')

<body style="background-image: url(http://cdn.backgroundhost.com/backgrounds/subtlepatterns/bgnoise_lg.png);">

@include('includes.navbar') {{-- 어디에있든, 메뉴 --}}

<div class="container">

    <header class="row">
        @include('includes.header')  {{-- 상단 --}}
    </header>


    <div id="main" class="row">


        <!-- main content -->
        <div id="content" class="col-md-10" style="margin-bottom:50px;">
            @yield('content')
        </div>

        <!-- sidebar content -->
        @section('sidebar-right')
        <div id="sidebar" class="col-md-2">
            @include('includes.sidebar')
        </div>
        @show
    </div>

    <footer class="row">
        @include('includes.footer')
    </footer>

</div>

</body>

{{--페이스북 로그인--}}
<script>
    window.fbAsyncInit = function() {
        FB.init({   appId      : '1026118984094160',
                    xfbml      : true,
                    version    : 'v2.5'
        });
    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

{{--구글 analytics--}}
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-75241580-1', 'auto');
    ga('send', 'pageview');

</script>

</html>
