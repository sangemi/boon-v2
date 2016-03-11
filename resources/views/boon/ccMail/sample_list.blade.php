@extends('layouts.master') {{--master를 상속받음--}}

@section('title', '분쟁제로 - 내용증명')

@section('sidebar')
    @parent

    <p>내용증명 </p>

@stop

@section('content')


    <link rel="stylesheet" href="{{URL::asset('/css/boon/ccMail.css')}}">

    <style>
        #sample_top {text-align:center;margin:30px auto;}
    </style>

    {{--세부페이지 네비바--}}
    <nav class="navbar navbar-default">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::to('ccmail/sample') }}">내용증명</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a>천여개의 샘플에서 골라보세요</a></li>
                {{--<li><a href="{{ URL::to('ccmail/sample') }}">분류</a></li>--}}
                <li><a href="{{ URL::to('ccmail/work/create') }}">직접작성</a></li>
            </ul>
            <ul class="nav navbar-nav" style="float: right">
                <li><a href="#" class="navbar-nav pull-right"></a></li>
            </ul>
        </div>
    </nav>



    <div id="sample_top">

        <form name="srch_sample_f" method="get" action="/ccmail/sample" no-error-return-url="true">
            <input type="hidden" name=cate1 value="{!! Request::input('cate1') !!}" />
            <input type="hidden" name=cate2 value="{!! Request::input('cate2') !!}" />
        	<span class="sample_srch" style="white-space:nowrap;">
				<input type=text name="q" value="<?=htmlspecialchars(stripslashes(Request::input('q')))?>"
                       style="border:5px solid #1b558e;box-sizing: border-box;margin:0px;padding:2px 5px 2px 5px;
                            font-size:4em;height:80px;font-weight:bold;"
                       placeholder="검색어를 입력하세요" maxlength="80" />
				<input type=image src="{{URL::asset('/img/v1/btn_srch.gif')}}" id="btn_srch_sample" style="border:0px solid red; vertical-align:bottom; width:94px;height:74px;" alt="검색" title="검색" />
			</span>
        </form>

    </div>





    <div class="text-center">
        {{--{{dd( Request::input(), http_build_query (Request::input()) ) }}--}}

        @if (!empty($ccMailsCate1s))

            <a href="{{url('/ccmail/sample?q='.Request::input('q'))}}"
               class="btn ccMailsCate1s <?php echo !Request::input('cate1')?"btn-primary":"btn-default"; ?>" >
                <b>All</b>
            </a>

            @foreach ($ccMailsCate1s as $ccMailsCate1)

                <a href="{{url('/ccmail/sample?cate1='.$ccMailsCate1->cate1.'&q='.Request::input('q'))}}"
                   class="btn ccMailsCate1s <?php echo $ccMailsCate1->cate1 == Request::input('cate1')?"btn-primary":"btn-default"; ?>" >
                    <b>{{ $ccMailsCate1->cate1 }}</b>
                    {{--<span class="badge"> {{ $ccMailsCate1->cnt}} </span>--}}
                    {{--<span class=""> {{ $ccMailsCate1->usedsum}} </span>--}}
                    {{--<span class=""> {{ floor($ccMailsCate1->usedsum / $ccMailsCate1->cnt * 100)/100 }} </span>--}}
                </a>

            @endforeach
        @endif
    </div>

    <div class="text-center inner-shadow div-ccmail-cate2">
        @if (!empty($ccMailsCate2s))
            @foreach ($ccMailsCate2s as $ccMailsCate2)

                <a href="{{url('/ccmail/sample?cate1='.Request::input('cate1').'&cate2='.$ccMailsCate2->cate2)}}"
                   class="btn btn-xs ccMailsCate1s <?php echo $ccMailsCate2->cate2 == Request::input('cate2')?"btn-info":"btn-link"; ?>" >
                    <b>{{ $ccMailsCate2->cate2 }}</b>
                    <span class="badge"> {{ $ccMailsCate2->cnt}} </span>
                </a>
            @endforeach
        @endif
    </div>

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

            <div class="">
                <div class="jumbotron">
                    <h1>분야 선택<span class="glyphicon glyphicon-hand-up"></span>! </h1>
                    <p>또는 특정 단어로 <span class="glyphicon glyphicon-search"></span>검색해주세요!  <small>예:월세</small></p>
                </div>
                {{--<p>This is some text.</p>--}}
            </div>

        @else
            @foreach(array_chunk( $ccMails->all(), 3) as $row)
                <div class="row">
                    @foreach ($row as $ccMail)
                        <div class="col-sm-4">
                            <div class="panel panel-default divCcMailBox ribon_new">
                                <div class="panel-heading">
                                    <b><i class="small">{{ $ccMail->id }}</i>.

                                        {{ $ccMail->cate3 }}

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

                                    <form method="get" action="{{URL::to('/ccmail/sample/'.$ccMail->id)}}" class="" style="position:absolute;bottom:10px;right:10px;">
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
                    < ?php $cate1 = Request::input('cate1');
                    $cate2 = Request::input('cate2');
                    $q = Request::input('q'); ? >
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