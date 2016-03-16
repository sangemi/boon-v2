@extends('layouts.master') {{--master를 상속받음--}}

@section('title', '분쟁제로 - 내용증명')

@section('sidebar')
    @parent

    <p>내용증명 </p>

@stop

@section('content')


<link rel="stylesheet" href="{{URL::asset('/css/boon/ccMail.css')}}">


{{--페이지 작은 네비바 대체--}}
<style>

    .breadcrumb > li + li.pull-right:last-child:before {
        content: " "; // breadcrumb 특정슬래시 없애기. 공백이면안됨
    }
</style>

<ol class="breadcrumb">
    <li><a href="{{ URL::to('ccmail/sample') }}">
        <span class="glyphicon glyphicon-list" aria-hidden="true"></span> 내용증명</a></li>
    <li>샘플에서 고르거나, 직접 작성</li>
    <li class="pull-right"><a href="{{ URL::to('ccmail/work/create') }}">
        <span class="btn btn-xs btn-default" aria-hidden="true">직접 <span class="fa fa-pencil"></span></span></a>
    </li>

</ol>


<style>
    .cf:before, .cf:after{
        content:"";
        display:table;
    }
    .cf:after{ clear:both; }

    .cf{ zoom:1; }

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

    <form name="srch_sample_f" method="get" action="{{Request::url()}}" no-error-return-url="true"
          class="search-wrapper cf">
        {{--<input type="hidden" name=cate1 value="{!! Request::input('cate1') !!}" />
        <input type="hidden" name=cate2 value="{!! Request::input('cate2') !!}" />--}}
        <input type=text name="q" value="<?=htmlspecialchars(stripslashes(Request::input('q')))?>"
               placeholder="검색" maxlength="80" />
        <button type=submit id="btn_srch_sample" style="" alt="검색" title="검색" >
            <i class="fa fa-search"></i>
        </button>
    </form>




<style>
    .btnCate1s {padding:8px 10px;}
    .btnCate1s span.fa {font-size:2.0em;}
    .cate1_text {font-size:0.8em;font-family:'맑은 고딕';}
</style>


    <div class="text-center" style="overflow-x:scroll;white-space: nowrap;">
        {{--{{dd( Request::input(), http_build_query (Request::input()) ) }}--}}

        @if (!empty($ccMailsCate1s))

            <a href="{{url('/ccmail/sample?q='.Request::input('q'))}}"
               class="btn ccMailsCate1s <?php echo empty($cate['cate1'])?"btn-primary":"btn-default"; ?>" >
                <b>All</b>
            </a>

            @foreach ($ccMailsCate1s as $ccMailsCate1)
                <?php
                $txtCate1_pre = "";
                switch($ccMailsCate1->cate1){
                    case "이혼,가족": $txtCate1_pre = "<span class='fa fa-male'></span><span class='fa fa-female'></span>"; break;
                    case "채권,채무": $txtCate1_pre = "<span class='fa fa-krw'></span>"; break;
                    case "임대차":    $txtCate1_pre = "<span class='fa fa-home'></span>"; break;
                    case "부동산":    $txtCate1_pre = "<span class='fa fa-building'></span>"; break;
                    case "근로자":      $txtCate1_pre = "<span class='fa fa-briefcase'></span>"; break;
                    case "공사":      $txtCate1_pre = "<span class='fa fa-truck'></span>"; break;
                    case "손해배상":  $txtCate1_pre = "<span class='fa fa-bolt'></span><small><span class='fa fa-money'></span></small>"; break;
                    case "계약해지":  $txtCate1_pre = "<span class='fa fa-hand-stop-o'></span>"; break;
                    case "물품거래":  $txtCate1_pre = "<span class='fa fa-cubes'></span>"; break;
                    case "기타":      $txtCate1_pre = "<span class='fa fa-ellipsis-h'></span>"; break;
                    case "지적재산":  $txtCate1_pre = "<span class='fa fa-copyright'></span>"; break;
                } //pencil-square-o
                $txtCate1 = $txtCate1_pre ."<br><span class='cate1_text'>" .$ccMailsCate1->cate1 ."</span>";
                ?>

                <a href="{{ url('/ccmail/cate/'.$ccMailsCate1->cate1) }}{{  (Request::input('q'))?'?q='.Request::input('q'):'' }}"
                   class="btn btnCate1s ccMailsCate1s <?php echo (isset($cate['cate1']) && $ccMailsCate1->cate1 == $cate['cate1'])?"btn-primary":"btn-default"; ?>" >
                    <b>{!! $txtCate1 !!} </b>
                    {{--<span class="badge"> {{ $ccMailsCate1->cnt}} </span>--}}
                    {{--<span class=""> {{ $ccMailsCate1->usedsum}} </span>--}}
                    {{--<span class=""> {{ floor($ccMailsCate1->usedsum / $ccMailsCate1->cnt * 100)/100 }} </span>--}}
                </a>

            @endforeach
        @endif
    </div>

    @if (!empty($ccMailsCate2s))
    <div class="inner-shadow " style="overflow-x:scroll;width:100%;">
        <div class="text-center div-ccmail-cate2" style="min-width:300px;">
            @foreach ($ccMailsCate2s as $ccMailsCate2)

                <a href="{{url('/ccmail/cate/'.$cate['cate1'].'/'.$ccMailsCate2->cate2)}}"
                   class="btn btn-xs ccMailsCate1s <?php echo $ccMailsCate2->cate2 == Request::input('cate2')?"btn-info":"btn-link"; ?>" >
                    <b>{{ $ccMailsCate2->cate2 }}</b>
                    {{--<span class="badge">--}}
                    <small>{{ $ccMailsCate2->cnt}}</small>
                </a>
            @endforeach
        </div>
    </div>
    @endif

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
    <div class="" style="margin-top:30px;">

        {{--n개씩 정렬하는 방법--}}
        @if ( $ccMails->isEmpty() )

            <div class="">
                <div class="jumbotron text-center">
                    {{--<h1>분야 선택<span class="glyphicon glyphicon-hand-up"></span>! </h1>--}}
                    <h2>검색된 내용이 없습니다. <span class="fa fa-meh-o"></span> </h2>
                    {{--<p>또는 특정 단어로 <span class="glyphicon glyphicon-search"></span>검색해주세요!  <small>예:월세</small></p>--}}
                </div>
                {{--<p>This is some text.</p>--}}
            </div>
        @else

            @foreach(array_chunk( $ccMails->all(), 2) as $row)
                <div class="row">
                    @foreach ($row as $ccMail)

                        <?php /* 리본으로 강조하기 */
                        if($ccMail->used_cnt >= 2)
                            $ribon_class = " ribon_mini ribon_hot";
                        else{
                            $created = new \Carbon\Carbon($ccMail->created_at);
                            $now = \Carbon\Carbon::now();
                            $difference = $created->diff($now)->days; //$created->diffForHumans($now);
                            if( $difference < 10  )
                                $ribon_class = " ribon_mini ribon_new";
                            else  $ribon_class = "";
                        }
                        ?>

                        <div class="col-sm-6">
                            <div class="panel panel-default divCcMailBox <?=$ribon_class?>">
                                <div class="panel-heading">
                                    <b><i class="small">{{ $ccMail->id }}</i>.

                                        <a href="{{URL::to('/ccmail/sample/'.$ccMail->id)}}">{{ $ccMail->cate3 }}</a>

                                    </b>
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