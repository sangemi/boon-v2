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
</html>