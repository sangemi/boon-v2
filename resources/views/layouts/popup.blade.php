<!DOCTYPE html>
<html>

@include('includes.head')

<body>

<div class="container">

    <header class="row">

        {{--@include('includes.header')--}}
        @yield('top')

    </header>


    <div id="main" class="row">


        <!-- main content -->
        <div id="content" class="">
            @yield('content')
        </div>

    </div>

    <footer class="row">
        {{--@include('includes.footer')--}}
        @yield('bottom')
    </footer>

</div>

</body>

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