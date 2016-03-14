@extends('layouts.master') {{--master를 상속받음--}}

@section('title', '분쟁제로 - 내용증명')

@section('sidebar')
    @parent

    <p>내용증명 </p>

@stop

@section('content')


    <link rel="stylesheet" href="{{URL::asset('/css/boon/ccMail.css')}}">


    {{--세부페이지 상단 소 메뉴--}}
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

<style>

    .cf:before, .cf:after{
        content:"";
        display:table;
    }

    .cf:after{
        clear:both;
    }

    .cf{
        zoom:1;
    }

    /* Form wrapper styling */
    .search-wrapper {
        width: 75%;
        margin: 45px auto 50px auto;

    }

    /* Form text input */
    .search-wrapper input {
        width: 87%;
        height: 20px;
        padding: 20px 15px;
        float: left;
        font: normal 16px 'Arial', 'Tahoma';
        border: 0;
        background: #fff;
        border-radius: 5px 0 0 5px;

    }

    .search-wrapper input:hover + .search-wrapper button {
        background: #ccc
    }

    .search-wrapper input:focus {
        outline: 0;
        background: #fff;

    }

    .search-wrapper input::-webkit-input-placeholder {
        color: #c6c7c6;
        font-weight: normal;

    }

    .search-wrapper input:-moz-placeholder {
        color: #999;
        font-weight: normal;
        font-style: italic;
    }

    .search-wrapper input:-ms-input-placeholder {
        color: #999;
        font-weight: normal;
        font-style: italic;
    }

    /* Form submit button */
    .search-wrapper button {
        overflow: visible;
        position: relative;
        float: right;
        border: 0;
        padding: 0;
        cursor: pointer;
        height: 40px;
        width: 13%;
        font: bold 18px 'Arial', 'Tahoma';
        color: white;
        background: #c1c1c1;
        border-radius: 0 5px 5px 0;
        transition: all 2.0s linear;
        -webkit-transition: all 0.2s linear;
        -moz-transition: all 0.2s linear;
        -ms-transition: all 0.2s linear;
        -o-transition: all 0.2s linear;
    }

    .search-wrapper button:hover{
        background: #5cc924;
        transition: all 2.0s linear;
        -webkit-transition: all 0.2s linear;
        -moz-transition: all 0.2s linear;
        -ms-transition: all 0.2s linear;
        -o-transition: all 0.2s linear;
    }

    .search-wrapper button:active,
    .search-wrapper button:focus{
        background: #329400;
        outline: 0;
        transition: all 0s linear;
        -webkit-transition: all 0s linear;
        -moz-transition: all 0s linear;
        -ms-transition: all 0s linear;
        -o-transition: all 0s linear;

    }

    .search-wrapper button:hover:before{
        border-right-color: #e54040;

    }

    .search-wrapper button:focus:before,
    .search-wrapper button:active:before{
        border-right-color: #c42f2f;
    }

    .search-wrapper button::-moz-focus-inner { /* remove extra button spacing for Mozilla Firefox */
        border: 0;
        padding: 0;
    }
</style>
<script>
    $(document).ready(function(){
        $(".search-wrapper input").mouseenter(function(){
            $(".search-wrapper button").css("background-color", "#4aba10");


        });
        $(".search-wrapper input").mouseout(function(){
            $(".search-wrapper button").css("background-color", "" );
        });
    });
</script>
    <form name="srch_sample_f" method="get" action="/ccmail/sample" no-error-return-url="true"
          class="search-wrapper cf">
        <input type="hidden" name=cate1 value="{!! Request::input('cate1') !!}" />
        <input type="hidden" name=cate2 value="{!! Request::input('cate2') !!}" />
        <input type=text name="q" value="<?=htmlspecialchars(stripslashes(Request::input('q')))?>"
               placeholder="검색어 입력" maxlength="80" />
        <button type=submit id="btn_srch_sample" style="" alt="검색" title="검색" >
            <i class="fa fa-search"></i>
        </button>
    </form>







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
                    {{--<h1>분야 선택<span class="glyphicon glyphicon-hand-up"></span>! </h1>--}}
                    <h2>관심분야 선택 <span class="fa fa-hand-o-up"></span> </h2>
                    {{--<p>또는 특정 단어로 <span class="glyphicon glyphicon-search"></span>검색해주세요!  <small>예:월세</small></p>--}}
                </div>
                {{--<p>This is some text.</p>--}}
            </div>

        @else
            @foreach(array_chunk( $ccMails->all(), 3) as $row)
                <div class="row">
                    @foreach ($row as $ccMail)
                        <?php /* 리본으로 강조하기 */
                        if($ccMail->used_cnt >= 2) $ribon_class = " ribon_mini ribon_hot";
                        //else if( $ccMail->created_at->format('Y-m-d')->diffForHumans() ) $ribon_class = " ribon_mini ribon_new";
                        else  $ribon_class = "";
                        ?>
                        <div class="col-sm-4">
                            <div class="panel panel-default divCcMailBox <?=$ribon_class?>">
                                <div class="panel-heading">
                                    <b><i class="small">{{ $ccMail->id }}</i>.

                                        <a href="{{URL::to('/ccmail/sample/'.$ccMail->id)}}">{{ $ccMail->cate3 }}</a>

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