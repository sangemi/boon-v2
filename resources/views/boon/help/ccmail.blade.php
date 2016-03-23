@extends('layouts.help')

@section('title', '내용증명 작성방법과 효력, 이것만은 - 분쟁제로닷컴')


@section('content')


<head>
    <meta charset="UTF-8">
    <title>

        Hello World &middot; GitHub Guides

    </title>
    <link rel="icon" type="image/x-icon" href="/favicon.ico">

    <meta name="viewport" content="width=device-width,initial-scale=1">

    <link rel="stylesheet" href="/site/help/ccmail/gridism.css">
    <link rel="stylesheet" href="/site/help/ccmail/markdown.css">
    <link rel="stylesheet" href="/site/help/ccmail/octicons.css">
    <link href="/site/help/ccmail/main.css" rel="stylesheet" />
    <link href="/site/help/ccmail/pygments.css" rel="stylesheet" />

    <script src="/site/help/ccmail/jquery.js" type="text/javascript"></script>
    <script src="/site/help/ccmail/snap.svg-min.js" type="text/javascript"></script>
    <script src="/site/help/ccmail/application.js" type="text/javascript"></script>

    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-3769691-29']);
        _gaq.push(['_trackPageview']);
        (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();
    </script>


<style>
    p.batang {color: rgb(102, 102, 102); font-family: 돋움, dotum; font-size: 17.5px; line-height: 1.6;}
    .content-body h2 {padding-top:28px;}

</style>

</head>

<body>

{{--<header>
    <div class="wrap">
        <ul class="links">
            <li><a href="https://www.김상겸변호사.com">겸변호사 소개</a></li>
            --}}{{--<li><a href="https://help.github.com">GitHub Help</a></li>
            <li class="nav-github"><a href="https://github.com">GitHub.com</a></li>
            <li class="nav-rss"><a href="/feed/index.xml"><span class="octicon octicon-rss"></span></a></li>--}}{{--
        </ul>

        <a href ="/"><img src="/images/logo@2x.png" width="136" height="25" alt ="Boonzero logo"/></a>
    </div>
</header>--}}

<article class="full">
    <div class="article-heading js-article-heading js-geopattern" style="background-image: url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0NDAiIGhlaWdodD0iNDQwIj48cmVjdCB4PSIwIiB5PSIwIiB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSJyZ2IoMTI3LCA1NCwgNjApIiAgLz48cmVjdCB4PSIwIiB5PSI1IiB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxNSIgb3BhY2l0eT0iMC4xMDY2NjY2NjY2NjY2NjY2NyIgZmlsbD0iI2RkZCIgIC8+PHJlY3QgeD0iMCIgeT0iMjkiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjE4IiBvcGFjaXR5PSIwLjEzMjY2NjY2NjY2NjY2NjY1IiBmaWxsPSIjMjIyIiAgLz48cmVjdCB4PSIwIiB5PSI1NyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAiIG9wYWNpdHk9IjAuMDYzMzMzMzMzMzMzMzMzMzQiIGZpbGw9IiMyMjIiICAvPjxyZWN0IHg9IjAiIHk9IjgyIiB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMyIgb3BhY2l0eT0iMC4wODkzMzMzMzMzMzMzMzMzMyIgZmlsbD0iI2RkZCIgIC8+PHJlY3QgeD0iMCIgeT0iMTEzIiB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMiIgb3BhY2l0eT0iMC4wODA2NjY2NjY2NjY2NjY2NiIgZmlsbD0iIzIyMiIgIC8+PHJlY3QgeD0iMCIgeT0iMTM3IiB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMyIgb3BhY2l0eT0iMC4wODkzMzMzMzMzMzMzMzMzMyIgZmlsbD0iI2RkZCIgIC8+PHJlY3QgeD0iMCIgeT0iMTY5IiB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMCIgb3BhY2l0eT0iMC4wNjMzMzMzMzMzMzMzMzMzNCIgZmlsbD0iIzIyMiIgIC8+PHJlY3QgeD0iMCIgeT0iMTg0IiB3aWR0aD0iMTAwJSIgaGVpZ2h0PSI3IiBvcGFjaXR5PSIwLjAzNzMzMzMzMzMzMzMzMzMzIiBmaWxsPSIjZGRkIiAgLz48cmVjdCB4PSIwIiB5PSIxOTgiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjIwIiBvcGFjaXR5PSIwLjE1IiBmaWxsPSIjMjIyIiAgLz48cmVjdCB4PSIwIiB5PSIyMzMiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjE2IiBvcGFjaXR5PSIwLjExNTMzMzMzMzMzMzMzMzM0IiBmaWxsPSIjMjIyIiAgLz48cmVjdCB4PSIwIiB5PSIyNjEiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjUiIG9wYWNpdHk9IjAuMDIiIGZpbGw9IiNkZGQiICAvPjxyZWN0IHg9IjAiIHk9IjI3MiIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTQiIG9wYWNpdHk9IjAuMDk4IiBmaWxsPSIjMjIyIiAgLz48cmVjdCB4PSIwIiB5PSIyOTgiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEyIiBvcGFjaXR5PSIwLjA4MDY2NjY2NjY2NjY2NjY2IiBmaWxsPSIjMjIyIiAgLz48cmVjdCB4PSIwIiB5PSIzMjciIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwIiBvcGFjaXR5PSIwLjA2MzMzMzMzMzMzMzMzMzM0IiBmaWxsPSIjMjIyIiAgLz48cmVjdCB4PSIwIiB5PSIzNTUiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEzIiBvcGFjaXR5PSIwLjA4OTMzMzMzMzMzMzMzMzMzIiBmaWxsPSIjZGRkIiAgLz48cmVjdCB4PSIwIiB5PSIzNzciIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjUiIG9wYWNpdHk9IjAuMDIiIGZpbGw9IiNkZGQiICAvPjxyZWN0IHg9IjAiIHk9IjM5OCIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTYiIG9wYWNpdHk9IjAuMTE1MzMzMzMzMzMzMzMzMzQiIGZpbGw9IiMyMjIiICAvPjxyZWN0IHg9IjAiIHk9IjQzMSIgd2lkdGg9IjEwMCUiIGhlaWdodD0iOSIgb3BhY2l0eT0iMC4wNTQ2NjY2NjY2NjY2NjY2NyIgZmlsbD0iI2RkZCIgIC8+PHJlY3QgeD0iNSIgeT0iMCIgd2lkdGg9IjE1IiBoZWlnaHQ9IjEwMCUiIG9wYWNpdHk9IjAuMTA2NjY2NjY2NjY2NjY2NjciIGZpbGw9IiNkZGQiICAvPjxyZWN0IHg9IjI5IiB5PSIwIiB3aWR0aD0iMTgiIGhlaWdodD0iMTAwJSIgb3BhY2l0eT0iMC4xMzI2NjY2NjY2NjY2NjY2NSIgZmlsbD0iIzIyMiIgIC8+PHJlY3QgeD0iNTciIHk9IjAiIHdpZHRoPSIxMCIgaGVpZ2h0PSIxMDAlIiBvcGFjaXR5PSIwLjA2MzMzMzMzMzMzMzMzMzM0IiBmaWxsPSIjMjIyIiAgLz48cmVjdCB4PSI4MiIgeT0iMCIgd2lkdGg9IjEzIiBoZWlnaHQ9IjEwMCUiIG9wYWNpdHk9IjAuMDg5MzMzMzMzMzMzMzMzMzMiIGZpbGw9IiNkZGQiICAvPjxyZWN0IHg9IjExMyIgeT0iMCIgd2lkdGg9IjEyIiBoZWlnaHQ9IjEwMCUiIG9wYWNpdHk9IjAuMDgwNjY2NjY2NjY2NjY2NjYiIGZpbGw9IiMyMjIiICAvPjxyZWN0IHg9IjEzNyIgeT0iMCIgd2lkdGg9IjEzIiBoZWlnaHQ9IjEwMCUiIG9wYWNpdHk9IjAuMDg5MzMzMzMzMzMzMzMzMzMiIGZpbGw9IiNkZGQiICAvPjxyZWN0IHg9IjE2OSIgeT0iMCIgd2lkdGg9IjEwIiBoZWlnaHQ9IjEwMCUiIG9wYWNpdHk9IjAuMDYzMzMzMzMzMzMzMzMzMzQiIGZpbGw9IiMyMjIiICAvPjxyZWN0IHg9IjE4NCIgeT0iMCIgd2lkdGg9IjciIGhlaWdodD0iMTAwJSIgb3BhY2l0eT0iMC4wMzczMzMzMzMzMzMzMzMzMyIgZmlsbD0iI2RkZCIgIC8+PHJlY3QgeD0iMTk4IiB5PSIwIiB3aWR0aD0iMjAiIGhlaWdodD0iMTAwJSIgb3BhY2l0eT0iMC4xNSIgZmlsbD0iIzIyMiIgIC8+PHJlY3QgeD0iMjMzIiB5PSIwIiB3aWR0aD0iMTYiIGhlaWdodD0iMTAwJSIgb3BhY2l0eT0iMC4xMTUzMzMzMzMzMzMzMzMzNCIgZmlsbD0iIzIyMiIgIC8+PHJlY3QgeD0iMjYxIiB5PSIwIiB3aWR0aD0iNSIgaGVpZ2h0PSIxMDAlIiBvcGFjaXR5PSIwLjAyIiBmaWxsPSIjZGRkIiAgLz48cmVjdCB4PSIyNzIiIHk9IjAiIHdpZHRoPSIxNCIgaGVpZ2h0PSIxMDAlIiBvcGFjaXR5PSIwLjA5OCIgZmlsbD0iIzIyMiIgIC8+PHJlY3QgeD0iMjk4IiB5PSIwIiB3aWR0aD0iMTIiIGhlaWdodD0iMTAwJSIgb3BhY2l0eT0iMC4wODA2NjY2NjY2NjY2NjY2NiIgZmlsbD0iIzIyMiIgIC8+PHJlY3QgeD0iMzI3IiB5PSIwIiB3aWR0aD0iMTAiIGhlaWdodD0iMTAwJSIgb3BhY2l0eT0iMC4wNjMzMzMzMzMzMzMzMzMzNCIgZmlsbD0iIzIyMiIgIC8+PHJlY3QgeD0iMzU1IiB5PSIwIiB3aWR0aD0iMTMiIGhlaWdodD0iMTAwJSIgb3BhY2l0eT0iMC4wODkzMzMzMzMzMzMzMzMzMyIgZmlsbD0iI2RkZCIgIC8+PHJlY3QgeD0iMzc3IiB5PSIwIiB3aWR0aD0iNSIgaGVpZ2h0PSIxMDAlIiBvcGFjaXR5PSIwLjAyIiBmaWxsPSIjZGRkIiAgLz48cmVjdCB4PSIzOTgiIHk9IjAiIHdpZHRoPSIxNiIgaGVpZ2h0PSIxMDAlIiBvcGFjaXR5PSIwLjExNTMzMzMzMzMzMzMzMzM0IiBmaWxsPSIjMjIyIiAgLz48cmVjdCB4PSI0MzEiIHk9IjAiIHdpZHRoPSI5IiBoZWlnaHQ9IjEwMCUiIG9wYWNpdHk9IjAuMDU0NjY2NjY2NjY2NjY2NjciIGZpbGw9IiNkZGQiICAvPjwvc3ZnPg==);">
        <div class="wrap">
            <div class="icon-container">
                {{--<span class="mega-octicon octicon-globe"></span>--}}
                <span class="fa fa-send-o" style="color: #fff;
                text-shadow: 1px 1px 1px #ccc;
                font-size: 1.8em;margin-top:15px;"></span>

            </div>
            <h1>내용증명 작성방법과 효력</h1>
      <span class="article-read-time article-meta">
        <span class="fa fa-book"></span> 겸변호사의 이것만은 시리즈 #01 <u>(8 minute read)</u>
      </span>

        </div>
    </div>


    <div class="wrap">

        <div class="toc-wrapper">
            <ol class="toc js-toc"></ol>
        </div>


        <div class="markdown-body content-body ">
            <p><a id="intro" title="Intro 관련 사이트" class="toc-item"></a></p>

            <p><bold>내용증명 관련 사이트 모음</bold></p>
            <hr />
            <blockquote>
                <p><strong>등기배송 실시간 확인</strong> :
                    <a href="http://service.epost.go.kr/iservice/trace/Trace.jsp" target="_blank">
                        http://service.epost.go.kr/iservice/trace/Trace.jsp
                    </a>
                </p>
                <p><strong>내용증명 양식찾기</strong> :
                    <a href="http://boonzero.com/ccmail/sample" target="_blank">
                        http://boonzero.com/ccmail/sample
                    </a>
                </p>
                <p><strong>변호사 작성대행</strong> :
                    <a href="http://boonzero.com/ccmail/work" target="_blank">
                        http://boonzero.com/ccmail/work
                    </a>
                </p>
                <p><strong>내용증명 나무위키</strong> :
                    <a href="https://namu.wiki/w/%EB%82%B4%EC%9A%A9%EC%A6%9D%EB%AA%85" target="_blank">
                        https://namu.wiki/w/내용증명
                    </a>
                </p>
                <p><strong>내용증명 생활법령정보</strong> :
                    <a href="http://oneclick.law.go.kr/CSP/CnpClsMain.laf?csmSeq=272&ccfNo=4&cciNo=3&cnpClsNo=1" target="_blank">
                        http://oneclick.law.go.kr 보기
                    </a>
                </p>


            </blockquote>

            <p><em>내용증명은 결코 어려운것이 아니다. 나중 분쟁이 생겼을 때 "너 그때 이렇게 이야기 했지? 그래서 나는 이렇게 이야기했잖아"라고
                말하기 위해서 내용증명이 필요한 것이다.</em></p>
            {{--<p>그래서 엄밀히 내용증명은 특수한 몇명 경우를 제외하고는 필요하지 않다. 보낸사실만 남기면 되기 때문에, 평소 상대방이 쓰는 이메일주소로 메일을 남기고, 평소 쓰는 핸드폰에 문자를 남기는 것으로
            내용증명의 효력과 같은 효과를 볼 수 있다.</p>
            <p>위의 방법은 99% 유효하다. 하지만 1% 상대방이 받지 않았다고 항변할것이 걱정되어 법조인들도 내용증명을 보내곤 한다.</p>--}}





            <p><a id="what" title="#1 내용증명이란?" class="toc-item"></a></p>

            <h2>#1 내용증명이란?</h2>

            <img src="http://www.moior.com/sangdam/images/sangdam.post.1.jpg" style="vertical-align: middle; border-style: none;" />

            <p>내용증명이란 <em>'발송인이 특정한 날에 어떠한 내용의 문서를 수신인에게 보냈다'</em>라는 사실을 국가가 증명해주는 것을 말한다.
                내용증명이 반드시 필요한 경우는 법적으로 상대방에게 '고지'를 한 후 후속절차를 취할 수 있도록 제한한 경우인데, 그 예들은 밑에 따로 설명하겠다.
                그러나 반드시 '고지'가 필요한 경우에만 내용증명이 활용되는 것은 아니고,
                상대방에게 자신의 확정된 의사를 밝힘으로써 심리적 압박감을 주기 위한 용도로도 충분히 활용될 수 있다.</p>







            <h4>하고싶은 말을 다 적지 말아라.</h4>

            <blockquote><p><strong>Tip:</strong> 하고싶은 말은 친구들과 하고, 내용증명에는 필요한 말만 하라.</p></blockquote>






            <p><a id="repository" title="#2 내용증명의 효력" class="toc-item"></a></p>

            <h2>#2 내용증명이 입증할 수 있는 것</h2>

            <img src="http://www.moior.com/sangdam/images/sangdam.post.2.jpg" border="5" align="right" style="height: 197px; vertical-align: middle; border: 5px solid rgb(255, 255, 255);  width: 290px; clear: right; margin: 10px;" />
            <blockquote style="padding: 0px; margin: 0px 0px 0px 40px; border: medium none;">

                <p>내용증명을 보내면 구체적으로 어떤 효력이 있을까?</p>
                <p>예를 들어
                    "<em>1년 전 귀하는 나에게 100만원을 빌려간 사실이 있습니다. 그런데 지금까지 한번도 이자를 지급하지 않고 갚지도 않고 있으며, 10회에 걸친 제 연락에 아무런 응답이 없습니다. 조속히 채무를 변제하시길 바랍니다.</em>"
                    라는 내용의 내용증명을 보낸 경우를&nbsp;생각해 보자.
                </p>
                <p></p>
                <p>내용증명은 그 자체로 그 속에 기재된 내용이 사실이라는 것을 보장하지 않는다.&nbsp;</p>
                <p>내용증명으로 입증이 되는 것은 [수신인이 발신인에게 기재 내용을 몇월 몇일날 통보받았다]라는 사실이다.</p>
                <p><span style="color: rgb(51, 51, 51);">따라서 위 예에서는 수신인이 100만원을 빌려간 사실이 입증되는 것이 아니라, "</span>
                    <font color="#951015"><em>금원을 빌려간 일에 대하여 발신인이 채무변제를 촉구하였다</em></font>
                    <font color="#333333">"라는 사실만이 입증된다.
                        10회에 걸쳐 연락하였다는 것도 사실은 입증된 것은 아닌데, 이러한 내용들이 실제 소송에서 정황증거로 활용될 수는 있다.</font></p>
                <p>&nbsp;</p>
                <p><b>통보사실이 왜 중요한지</b>&nbsp;모르는 분들이 많다.</p>
                <p>어떤 계약이 있는데, 일방이 계약이행일로부터 9년이 지나서, 상대방이 계약내용을 이행하지 않아서 발생한 손해를 배상하라는&nbsp;소송을 가정해보자.</p>
                <p>&nbsp;</p>
                <p style=" color: blue;">명확하게 계약서가 있는데도 불구하고 소송에서 질수도 있다.</p>
                <p>판사는 <em>계약에 따른 이행을 왜 9년이나 촉구하지 않다가 갑자기 뜬금없이 소송을 제기하느냐?</em> 라는 의문을 품으면서, 계약서의 내용이 허위이거나 다른 경위로 작성되지는 않았는지 검토하게 된다.</p>
                <p>이런 경우에 내용증명이 비로소 쓸모가 있다.</p>
                <p>&nbsp;</p>
                <p style="color: blue;"><b>내용증명을 받고도 아무런 응답을 하지 않았을 경우</b>에는 어떨까?</p>
                <p>처음 예에서 채무이행을 최고받았는데 수신인은 어이가 없어 아무런 응답을 하지 않았다.
                    1년 후 소송이 진행되었는데 소송에는 어떤 영향을 미칠까?
                    판사는 발신인이 100만원을 갚으라는 통보를 하였는데 수신인은 왜 아무런 응답을 하지 않았을까? 100만원을 빌린 사실이 사실일 가능성이 높을 것 같은데?라는 사고과정을 거치게 된다.&nbsp;</p>

                <p>이 예제처럼 중요한 사실에 해당하는 '대여사실'을 내용증명의 무응답을 이유로 인정하는 경우는 실제로 잘 없겠지만,
                    내용증명의 발송, 응답 사실이 소송에서 다른 소소한 주장사실의 인정여부에 여러 방면으로 영향을 미치고 있는 것이 사실이다.</p>
                <p>간단한 두개의 사례를 들어 보았다.&nbsp;</p>
                <p>법원에서 아무런 다툼없이 쉽게 인정해주는 '증거'로는 내용증명이 王이기 때문에 내용증명은 여러경우에 있어 항상 활용할 가치가 있다는 것을 잊으면 안되겠다.</p>
            </blockquote>


            <p><strong>축하합니다!</strong>
                이제 내용증명에 대해 절반은 이해했습니다.
                <img class='emoji' title=':tada:' alt=':tada:' src='https://assets.github.com/images/icons/emoji/unicode/1f389.png' height='20' width='20' align='absmiddle' />
            </p>





            <p><a id="branch" title="#3 내용증명 작성방법" class="toc-item"></a></p>

            <h2>#3 내용증명 작성방법</h2>


            <p>내용증명에는 특별한 형식이 정해져 있지 않습니다.<br />
            따라서 간략히 주의할 점 몇가지와 실제 발송방법을 설명하겠습니다.</p>

            <ol>
                <li> 발신인과 수신인의 <code>이름</code>과 정확한 <code>주소</code>를 상단에 기재합니다.</li>
                <li> 수신인에게 전하고자 하는 <code>내용</code>을 '육하원칙'에 따라 작성합니다.</li>
                <li> 작성된 서면의 하단에 기명날인(이름을 적고 도장을 찍음)합니다. (필수 아님)</li>
                <li> 작성한 서면을 2부 복사하여 <code>동일한 서면을 3부</code> 만듭니다.</li>
                <li> 우체국의 내용증명 창구에 우편봉투와 3부의 동일한 서면을 봉인하지 않은 상태로 제출합니다. </li>
            </ol>



            {{--<p><img src="branching.png" alt="a branch" /></p>--}}



            <h3>육하원칙에 따른 내용이란</h3>

            <ol>
                <li><code>누가</code> <code>언제</code> <code>어디서</code> <code>무엇을</code> <code>왜</code> <code>어떻게</code>.</li>
                <li>문장 예제) 나는 2016. 1. 15. 귀하의 사무실(도봉동 115번지)에서, 아래 계약서를 작성하였습니다.</li>
                <li>문장 예제) 위 계약에 따르면 3월 5일까지 당신이 금5000만원을 나에게 입금해야하는데, 지금까지 연락이 없군요.</li>
            </ol>



            <p><a id="commit" title="#4 내용증명 실제비용" class="toc-item"></a></p>

            <h2>#4. 내용증명 발송시 실제 드는 비용은</h2>

            <p>
                <div class="container-fluid" style="background-color:#fff">
                    <div class="col-xs-6">
                        <img src="http://www.moior.com/v/files/attach/images/147694/698/147/d245804bae3603ccb6583063d4930696.jpg"
                             align="left" style=" width: 290px; height: 197px; vertical-align: middle; clear: left; margin: 10px;" alt="우체국 내용증명 비용" />
                    </div>
                    <div class="col-xs-6" style="padding:10px;">
                        대한민국 우체국<br>
                        <a href="www.epost.go.kr" target="_blank">www.epost.go.kr</a><br>
                        <a href="tel:1588-1300">1588-1300</a><br>

                        실제 우체국에 방문하여 지불해야 하는 내용증명 비용을 계산해보겠습니다.  (내용증명 가격)
                    </div>
                </div>
            </p>



            <p>내용증명은 기본 등기우편 비용 + 특별 내용증명 관리비용으로 구성됩니다.</p>
            <ol>
                <li>내용증명 취급 비용</li>
                <li>등기우편 비용</li>

            </ol>

            <h4>1. 먼저 내용증명 취급 비용</h4>

            취급비용은 총 3부의 내용증명 중 하나를 우체국에 보관하는 시스템을 이용하는데 드는 비용입니다.


            <div class="container-fluid ">
                취급비용은 문서의 장수에 따라 계산합니다.
                <ul class="col-xs-6">
                    <li>기본 1매 - 1300원</li>
                    <li>1매 추가당 - 650원</li>
                </ul>

                <ul class="col-xs-6">
                    즉 내용증명의 페이지가
                    <li>1장일 경우 1,300원</li>
                    <li>2장일 경우 1,950원</li>
                    <li>3장일 경우 2,600원</li>
                    <li>4장일 경우 3,250원</li>
                    <li>6장일 경우 4,550원</li>
                    <li>8장일 경우 5,850원</li>
                </ul>
                의 비용이 기본적으로 부과됩니다.
            </div>

            <h4>2. 등기우편 비용</h4>

            <div class="container-fluid" style="background-color:#fff">
                <div class="col-xs-6">

                    <h5>1) 보통우편 비용</h5>

                    규격우편물
                    <small>
                    <ul>
                        <li>5g까지 270원</li>
                        <li>5g초과 25g까지 300원</li>
                        <li>25g초과 50g까지 320원</li>
                    </ul>
                    </small>
                        규격외우편물
                    <small>
                    <ul>
                        <li>50g까지 390원</li>
                        <li>50g초과 1kg까지 50g까지 마다 120원 가산</li>
                        <li>1kg초과 2kg까지 200g까지 마다 120원 가산</li>
                        <li>2kg초과 6kg까지 1kg까지 마다 400원 가산</li>
                    </ul>
                    </small>
                </div>
                <div class="col-xs-6">
                    <h5>2) 등기우편 비용</h5>
                    <em><small>내용증명은 무조건 등기우편입니다.</small></em>
                    <li>1통 1,630원 우편요금에 가산</li>
                </div>
            </div>


            <h4>실제 계산 예제입니다.</h4>

            <div class="container-fluid" style="background-color:#fff">
                <div class="col-xs-6">
                    <li>1장짜리 가장 짧은 내용증명을 보내는 경우</li>
                    우편요금 270원(5g까지)<br />
                    내용증명 취급비용 1300원<br />
                    등기비용 1630원<br />
                    ----------------------------<br />
                    총 합 3200원입니다.
                </div>
                <div class="col-xs-6">
                    <li>2장짜리 중량 7g짜리 통상의 내용증명을 규격봉투로 보내는 경우</li>
                    우편요금 300원(5g까지)<br />
                    내용증명 취급비용 1950원<br />
                    등기비용 1630원<br />
                    -----------------------<br />
                    총 합 3880원을 우체국 창구에 내셔야 합니다.
                </div>
            </div>



            <p>Bravo! 수고하셨습니다.</p>
            <p>마지막단계가 남았습니다.<br />
                내용증명에서 가장 중요한 것을 꼽으라 하면 당연 그 '내용'이겠지요.<br />
                <br />
                내용증명은 추후 법적 절차에 이용하기 위한 전제행위이기 때문에,
                내용증명이 실제 소송에서 어떻게 효과를 내는지 많이 다루어 본
                법률 전문가에게 내용을 검수받는 것을 권장합니다.<br />
                <br />
                다음 챕터로 넘어가 보겠습니다.<br />
            </p>









            <p><a id="pr" title="#5 소송대비 내용증명" class="toc-item"></a></p>

            <h2>#5 소송을 대비한 내용증명</h2>

            <p><span style="font-size: 14pt;"><font color="#0075c8"><b>내용증명, 가능하면 법무법인의 명의로 보내보세요.</b></font></span></p>


            <blockquote>
                <div style="font-size: 10pt; line-height: 17px;">
                    <img src="http://www.moior.com/sangdam/images/sangdam.post.3.jpg" width="320" height="452" align="left"
                         style="height: 452px; vertical-align: middle; border: 7px solid rgb(255, 255, 255); width: 320px; clear: left; margin: 0px 10px 10px 0px;"
                         />
                </div>
            </blockquote>

            <blockquote style="padding: 0px; margin: 0px 0px 0px 40px; border: medium none;">
                <p>법적 분쟁이 생겼을 때,&nbsp;<br />내용증명은 특정한 사실을 상대방과의 다툼없이 증명할 수 있다고 하였습니다.</p>
                <p>그런데 내용증명의 내용에 자신에게 불리하고 상대방에게 유리한 내용이 들어가면 어떻게 될까요?</p>

                <p><u>내용증명에 들어갈 내용은 추후 분쟁을 예상하여 치밀하게 작성하여 보내야 합니다.</u></p>
                <p>전문가들이 작성을 완료한 서식을 보면, "이렇게 나도 따라 쓰면되겠네"라고 쉽게 생각할 수 있는데,</p>
                <p>사안에 따라 내용증명에 넣어야 될 사실과 넣지 말아야 될 사실을 구분할 필요가 분명히 있습니다.</p>
                <p>어떤 사례도 인터넷에 널린 예제와 똑같을 수 없고 사건마다 생각치 못한 특별한 쟁점이 숨어있을 수 있습니다.</p>

                <p>또한 상대방에게 내가 법적인 조치를 곧 취할 수도 있겠구나라는 심리적 압박감을 주려는 목적을 달성하려면, 법적 후속절차를 바로 밟을 수 있는 법무법인의 명의로 내용증명을 보내는 것이 어느정도 효과적입니다.</p>

                <p>실제로 10건의 내용증명 중에서 2건 정도가 내용증명단계에서 해결이 됩니다.&nbsp;<span>(상대방이 법인으로 전화를 해서 앞으로 제가 어떻게 해야하냐고 물어보는 경우도 있는데&nbsp;</span><span>그럴때면 발송인의 입장을 대변하여 최대한 문제가 발생하지 않을 방향으로 안내를 해주기도 합니다.)</span></p>


                <h4>법인명의의 내용증명은 비용이 발생합니다.</h4>
                <p>이 비용은 [우편료과 교통·인건비, 변호사 사례 검토비, 상대방 연락에 대한 응대비] 등에 대한 비용으로 부담되지 않도록 책정되어 있습니다. 또한 나중 해당 사건이 실제 소송으로 발전될 경우,&nbsp;<u>수임료에서 공제</u>하고 있습니다. 이제 법무법인을 통한 내용증명이라는 '<span style="font-size: 1.3em; font-weight: bold;">보험</span>'을 들어보세요.</p>


                <p><b>내용증명 양식찾기 : </b> <a href="http://www.boonzero.com/ccmail/sample">http://boonzero.com/ccmail/sample</a></p>
                <p><b>분쟁제로 : </b> <a href="http://www.boonzero.com/ccmail/sample">http://www.boonzero.com</a></p>

            </blockquote>




            <p><em>내용증명 도달여부 확인방법</em></p>
            <hr />
            <blockquote>
                <p>
                    <strong>등기배송 실시간 확인</strong> :
                    <a href="http://service.epost.go.kr/iservice/trace/Trace.jsp" target="_blank">
                        http://service.epost.go.kr/iservice/trace/Trace.jsp
                    </a>
                    {{-- 파일 끌어다 놓기... 사이트 헐.
                    <a href="https://help.github.com/articles/basic-writing-and-formatting-syntax/#using-emoji">emoji</a> and
                    <a href="https://help.github.com/articles/file-attachments-on-issues-and-pull-requests/">drag and drop images and gifs</a> onto comments and Pull Requests.--}}
                </p>
            </blockquote>




            <p><a id="commit2" title="#6 내용증명 절차" class="toc-item"></a></p>

            <h2>#6 내용증명 절차 - 도달시간, 반송시 대처</h2>

            <h4>배달 소요일수</h4>
            <p>보통 : 접수일로부터 약 4일</p>
            <p>익일특급 : 접수일로부터 약 2일</p>





            <p><a id="merge" title="#0 요정정리" class="toc-item"></a></p>

            <h2>#0 요점정리.</h2>
            {{--<em>시간이 없으신 경우 이것만 챙겨보세요!</em>--}}

            <p>마지막으로 요점정리를 해볼까요 :</p>

            <ul>
                <li>하고 싶은 말을 다 적지 않는다.</li>
                <li>내용증명은 사이가 좋을 때 보내는 것도 방법이다.</li>
                <li>내용증명보다 바로 지급명령이나 소송을 시작하는 것도 좋다.</li>
                <li></li>
            </ul>

            <h3>축하합니다!</h3>
            <em>분쟁해결의 기본중의 기본, 내용증명을 마스터 하셨습니다.
                <img class='emoji' title=':tada:' alt=':tada:' src='https://assets.github.com/images/icons/emoji/unicode/1f389.png' height='20' width='20' align='absmiddle' /> <img class='emoji' title=':octocat:' alt=':octocat:' src='https://assets.github.com/images/icons/emoji/octocat.png' height='20' width='20' align='absmiddle' /> <img class='emoji' title=':zap:' alt=':zap:' src='https://assets.github.com/images/icons/emoji/unicode/26a1.png' height='20' width='20' align='absmiddle' />
            </em>

            <blockquote>
                <p><strong>Tip</strong>: 내용증명 샘플 모음 <a href="/ccmail/sample">내용증명 샘플</a>
                    {{--and <a href="">지급명령 샘플 모음</a> --}}
                </p>
            </blockquote>


            <p class="last-updated">Last updated 2016. 3.</p>
        </div>
    </div>
</article>


<footer>
    <div class="wrap">
        <span class="mega-octicon octicon-mark-github"></span>
        <p>

            <a href="http://boonzero.com">분쟁제로</a>는 분쟁의 A 부터 Z 까지 <br />
            한자리에서 해결할 수 있도록 고안된 Non Stop 서비스입니다



        </p>
    </div>
</footer>

</body>
</html>


@stop

