@extends('layouts.master') {{--master를 상속받음--}}

@section('title', '분쟁제로 - 내용증명')

@section('sidebar')
    @parent
    <p>어드민 </p>
@stop

@section('content')


    <link rel="stylesheet" href="{{URL::asset('/css/boon/ccMail.css')}}">

    <style>
    </style>

    {{--세부페이지 네비바--}}
    <nav class="navbar navbar-default">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::to('ccmail/work') }}">보관함</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="{{ URL::to('ccmail/work/create') }}">새로 작성</a></li>
            </ul>
            <ul class="nav navbar-nav" style="float: right">
                <li><a href="#" class="navbar-nav pull-right"></a></li>
            </ul>
        </div>
    </nav>






    {{--    <div class="corner-ribbon top-left sticky red shadow">New</div>
        <div class="corner-ribbon top-right sticky blue">Updated</div>
        <div class="corner-ribbon bottom-left sticky orange">Popular</div>
        <div class="corner-ribbon bottom-right sticky green shadow">Hello</div>

        <h1>Corner Ribbons</h1>
        <h2>(with custom settings and all...)</h2>--}}

   <!-- 세션에 메세지 있으면 보여주기 -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    {{--내용증명 리스트 간략 박스형태--}}
    <div class="">

        {{--n개씩 정렬하는 방법--}}
        @if (empty($ccMails))

            <div class="container">
                <div class="jumbotron">
                    <h1>분야 선택<span class="glyphicon glyphicon-hand-up"></span>! </h1>
                    <p>또는 특정 단어로 <span class="glyphicon glyphicon-search"></span>검색해주세요!  <small>예:월세</small></p>
                </div>
                {{--<p>This is some text.</p>--}}
            </div>

        @else
            @foreach(array_chunk( $ccMails->all(), 2) as $row)
                <div class="row">
                    @foreach ($row as $ccMail)


                        <?php /* 리본으로 강조하기 */
                        $created = new \Carbon\Carbon($ccMail->created_at);
                        $now = \Carbon\Carbon::now();
                        $ribon_class = ($created->diff($now)->days < 3)
                                ? " ribon_mini ribon_new" : ""; //$created->diffForHumans($now);
                        ?>

                        <div class="col-sm-6">
                            <div class="panel panel-default divCcMailBox <?=$ribon_class?>">{{--ribon_new--}}
                                <div class="panel-heading">
                                    <b><i class="small">{{ $ccMail->id }}</i>.

                                        {{--{{ $ccMail->cate3 }}--}}
                                        {{ "".$ccMail->receiver_name }}
                                        {{ "".$ccMail->status_show }}

                                    </b>
                                </div>
                                {{--

                                        <div class="panel-body divCcMailBoxBody">
                                            <div class="corner-ribbon top-right blue" style="opacity:0.5;">추 천
                                                <span class="badge">{{ $ccMail->used_cnt }}</span>
                                            </div>
                                            {!! nl2br(e($ccMail->content)) !!}
                                        </div>
                                --}}

                                <div class="panel-body clearfix " style="padding:0px;">
                                    <div style="font-size:0.8em;overflow-y:scroll;height:100px;padding:5px;">
                                        {!! nl2br(e($ccMail->content)) !!}
                                    </div>

                                    <form method="get" action="{{URL::to('/ccmail/work/'.$ccMail->id)}}" class="" style="position:absolute;bottom:10px;right:10px;">
                                        <button type="submit" class="btn btn-default">
                                            <span class="glyphicon glyphicon-menu-right"></span>
                                        </button>
                                    </form>



                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                @endforeach

                        <!--페이징-->

                <div class="text-center">
                    {!! $ccMails->appends( Request::input() )->render() !!}
                    {{--{!! $ccMails->appends( compact('cate1', 'cate2'))->links('ddddddd') !!} links는 안씀이제? --}}
                    {{--
                    < ?php $cate1 = Input::get('cate1');
                    $cate2 = Input::get('cate2');
                    $q = Input::get('q'); ? >
                    {!! $ccMails->appends( compact('cate1', 'cate2', 'q') )->render() !!} 넘길 변수 제한하려면. --}}
                </div>
                @endif
    </div>






    {{--{{SKHelper::p($ccMails)}}--}}



@stop


{{--@if ($ccMail->done == 1)
<span style="text-decoration: line-through;">
@endif--}}
{{--@if ($ccMail->done == 1)
    </span>
@endif--}}