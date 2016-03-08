<!DOCTYPE html>
<html>

@include('includes.head')

<body>

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
        <div id="sidebar" class="col-md-2">
            @include('includes.sidebar')
        </div>
    </div>

    <footer class="row">
        @include('includes.footer')
    </footer>

</div>

</body>
</html>
<script>
    window.fbAsyncInit = function() {
        FB.init({
            appId      : '1026118984094160',
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