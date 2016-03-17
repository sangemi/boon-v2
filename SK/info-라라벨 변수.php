<?php
/**
 * Created by PhpStorm.
 * User: Kenny
 * Date: 2016-03-17
 * Time: 오후 1:20
 */

echo '<br>'.Request::url();             // url: http://xx.com/aa/bb
echo '<br>'.Request::path();            // path: /aa/bb
echo '<br>'.Request::getRequestUri();   // getRequestUri: /aa/bb/?c=d
echo '<br>'.Request::getClientIp();     // Returns user's IP
echo '<br>'.Request::getUri();          // getUri: http://xx.com/aa/bb/?c=d
echo '<br>'.Request::getQueryString();  // getQueryString: c=d
echo '<br>'.Request::getPort();         // Get the port scheme of the request (e.g., 80, 443, etc.)
echo '<br>'.Request::is('foo/*');       // Determine if the current request URI matches a pattern
echo '<br>'.Request::segment(1);        // Get a segment from the URI (1 based index)
echo '<br>'.Request::header('Content-Type');    // Retrieve a header from the request
echo '<br>'.Request::server('PATH_INFO');       // Retrieve a server variable from the request
echo '<br>'.Request::ajax();            // Determine if the request is the result of an AJAX call
echo '<br>'.Request::secure();          // Determine if the request is over HTTPS
echo '<br>'.Request::method();          // Get the request method
echo '<br>'.Request::isMethod('post');  // Checks if the request method is of specified type
echo '<br>'.Request::instance()->getContent();  // Get raw POST data
echo '<br>'.Request::format();          // Get requested response format
echo '<br>'.Request::isJson();          // true if HTTP Content-Type header contains */json
echo '<br>'.Request::wantsJson();       // true if HTTP Accept header is application/json
echo '<br>'.URL::full();                // http://localhost/auth/login
echo '<br>'.URL::current();             // http://localhost/auth/login
echo '<br>'.URL::previous();            // http://localhost/ccmail/sample/380
echo '<br>'.URL::getRequest();          // GET /auth/login HTTP/1.1 Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8 Accept-Encoding: gzip, deflate, sdch Accept-Language: ko-KR,ko;q=0.8,en-US;q=0.6,en;q=0.4 Cache-Control: max-age=0 Connection: keep-alive Cookie: __utma=111872281.1059187175.1458051733.1458088751.1458108549.3; __utmc=111872281; __utmz=111872281.1458051733.1.1.utmcsr=(direct)|utmccn=(direct)|utmcmd=(none); XSRF-TOKEN=eyJpdiI6Im9nY3JkcEVldFhWYnVGaENJZkJPcmc9PSIsInZhbHVlIjoiR2VzTGFRKzVuQXNBek02QVFjME9PTldYUk95T1U2OFFrWXhUazkxN1M4emVkc0J2OXJFRTA1cDNKZ1JtMkpyMGU4V1p6am05R0luU3F6ZjJuaVY2V1E9PSIsIm1hYyI6ImRlOWI0OTkwMGU2ZjgxNjA3MGU2ZmMzMTIyM2RkY2JlMzcxODNlMjhhOTdhNjQyZWYyMjg3OGZhYTI4NmU4OWEifQ%3D%3D; laravel_session=eyJpdiI6IlFPclwva2JXdmFTRHl4d3JRQzFBTVwvZz09IiwidmFsdWUiOiJZRDFWN2NDZ2g3UlM5RzhLSUF2VGxCOTRpa0x5VXZ4UFU0anh5Q3hwSzdcLzBKOWlFdnNaSzN6UGJTelFET0ZzKzlZd2FWT1Qwb1dDZVhuR1lLRzNNNEE9PSIsIm1hYyI6ImVhYjNkMmJlN2YyMTlhNmE5Y2RkNzUxODIxMTcwMTVjNjg1NWVjMmUwOTc3MGUzY2Q2YzEzMWM0ZjQyOGE0MDcifQ%3D%3D Host: localhost Referer: http://localhost/ccmail/sample/380 Upgrade-Insecure-Requests: 1 User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.116 Safari/537.36




분쟁제로 김상겸 변호사의 분쟁해결사 시리즈 1
조우성 변호사의 Must Know 시리즈(10)
돈을 갚지 않았다고 사기죄로 고소당한 경우 대응시 필수지식 5가지


※ 요즘 한 달에 형사고소 건수가 7-8만 건에 육박한다고 합니다. 그리고 그 고소 건 중 상당수가 ‘사기죄’고소이며, 그 이유도 ‘돈을 빌려갔는데 갚지 않았기에 고소한다’는 것이라고 합니다. 그런데 단순히 돈을 빌려서 갚지 않는 것은 민사적인 채무불이행의 문제이지 형사적인 사기죄 문제는 아닙니다. 하지만 채권자들은 다소 무리를 해서라도 채무자를 형사고소함으로써 압박해서 돈을 받아내려는 의도를 갖고 있습니다. 이를 ‘민사사건의 형사화’라고 합니다. 갑자기 고소를 당한 채무자로서는 어떻게 대응해야 할까요?


★ Tip 1. 방어의 핵심은 ‘속이지 않았다’는 점을 증명하는 것이다.

° ‘사기죄’는 기본적으로 ‘남을 속이고 돈을 취했다’는 것을 전제한 개념이다. 즉, ‘돈을 갚을 의사도 능력도 없으면서 돈을 갚겠다고 거짓말 하고 돈을 빌려갔기 때문에 사기죄다’는 것이 고소의 핵심이다.

° 따라서 방어의 포인트는 ‘내가 돈을 갚지 못한 것은 사실이지만, 돈을 빌릴 당시 나는 속일 의도가 없었다. 난 속인 것이 아니다.’라는 점이다.

° 어디까지나 행위의 판단 시점은 ‘내가 돈을 빌릴 그 당시’다. 형법상 기준 시점은 ‘범죄행위시’라는 점을 명심할 것.



★ Tip 2. 중간에 일부라도 갚은 점이 있다면 이는 유리한 포인트다.


° ‘돈을 한 푼도 갚지 않은 것’과 ‘일부라도 갚은 것’은 수사기관에서 달리 평가하는 경우가 많다. 즉, 일부라도 갚았다면 수사기관에서는 ‘사기죄의 고의’는 없는 것 아닌가 라고 판단하는 것 같았다.

° 따라서 일부라도 갚은 것이 있다면 그 내역을 충실히 수사기관에 밝히는 것이 꼭 필요하다.







★ Tip 3. 돈을 빌릴 당시 내가 충분히 나중에 돈을 갚을 수 있었다는 점을 증거로 제출해야 한다.


° 앞서 밝힌 대로 중요한 시점은 ‘돈을 빌릴 당시’다. 내가 돈을 빌릴 당시에 ‘앞으로 예상되는 수입’을 증거를 통해 밝히는 것이 중요하다.

° 즉, ‘나는 그 당시 A, B, C로부터 언제 돈이 들어올 것이 있었다. 그런데 그 후 뜻하지 않게 A, B, C로부터 돈이 제대로 들어오지 않게 되어 어쩔 수 없이 고소인의 돈을 갚지 못한 것이다.’는 점을 밝혀야 한다.

° 다시 한 번 강조하지만 단순히 ‘돈을 갚지 않았다’는 점은 민사적으로 해결할 문제이지 형사적으로 처벌될 문제는 아니다. 따라서 ‘돈을 빌릴 당시에는 갚을 수 있었다’는 점을 어떻게 증명하느냐가 관건이다.



★ Tip 4. 지금이라도 돈을 갚아 버리면 형사적인 문제는 사라진다고 오해해서는 안 된다.


° 사기죄로 형사고소 당한 분들은, ‘에이, 치사해서 원. 지금이라도 돈을 갚아버리면 되잖소!’라고 말하곤 한다. 그런데 형사고소 당한 뒤에 돈을 갚는다고 해서 형사고소된 사건이 사라지는 것이 아니다.

° 만약 피해자와 원만히 합의되서 피해자가 형사고소를 ‘취하’한다고 하더라도 형사사건 자체는 사라지지 않는다. 다만 처벌 과정에서 정상참작이 될 뿐이다.

° 고소를 취하할 경우 사건 자체가 사라지는 것은 ‘친고죄’들이 그러하다. 성범죄들 중에 친고죄가 많다. 하지만 사기죄는 친고죄가 아니므로 고소취하된다고 해서 사건 자체가 사라지지는 않는다. 고소가 취하돼도 죄질이 나쁘다고 봐서 처벌되는 경우도 있다.


★ Tip 5. 하지만 피해자와 합의를 하는 것은 여러모로 유리하다.


° 사기죄의 고의가 없었다고 확실하게 입증하기 어려운 경우, 즉 돈을 빌릴 당시 앞으로 돈을 받을 곳이 여러 군데 있었기에 충분히 돈을 갚을 수 있었다는 점을 입증하기 어려운 경우라면, 처벌을 받지 않기 위해서는 피해자(고소인)와 합의를 해서 고소 취하를 받는 것이 가장 중요하다.

° 고소취하를 한다고 해서 사건 자체가 사라지는 것은 아니지만 처벌의 가치가 높지 않다는 평가를 받아 무혐의 처분이나 기소유예(한번 봐주겠어!) 처분을 받을 가능성이 높아지기 때문이다.

° 물론 당장 큰 돈을 다 갚기 힘들 수 있을 것이다. 이 경우에는 상대방에게 진심으로 사과하고 일부 지급 후 나중에 잔금을 지급하겠다고 약속한 후 외상 합의를 시도해 볼 수도 있다. 외상 합의를 한 후 나중에 또 약속을 어기면 또 다른 사기죄 고소를 당할 위험성이 있음은 주의해야 한다.