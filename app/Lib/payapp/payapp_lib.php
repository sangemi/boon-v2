<?php
/*************************************************************************/
/* payapp                                                                */
/* copyright ⓒ 2012 UDID. all rights reserved.                           */
/*                                                                       */
/* oapi sample                                                           */
/* - version 005-001                                                     */
/* - payapp 서버로 결제요청 정보를 전달합니다.                           */
/*                                                                       */
/*************************************************************************/
// payapp 연동 도메인
define('PAYAPP_API_DOMAIN', 'api.payapp.kr');
// payapp 연동 URL
define('PAYAPP_API_URL', '/oapi/apiLoad.html');

// payapp 연동을 위해서는
// api.payapp.kr로 80port 접속이 가능해야 합니다.
// 서버에서 api.payapp.kr:80 접속이 가능하도록 방화벽 룰을 조정하시기 바랍니다.
function payapp_oapi_post($postdata = array())
{
    // 예제에서는 php extension curl, 또는 fsockopen으로 api.payapp.kr:80에 접속을 합니다.
    // curl, fsockopen 둘중 하나는 이용이 가능해야 합니다.
    $enable_curl   = function_exists('curl_exec');
    $enable_socket = function_exists('fsockopen');

    $CRLF          = "\r\n";
    $request_data  = '';
    $response_data = '';
    $postdata_str  = '';
    $parse_data    = array();

    if (!$postdata['cmd']) {
        return array('state' => '0', 'errorMessage' => 'cmd 값을 확인하세요.', 'errno' => '99999');
    }
    if (!$postdata['userid']) {
        return array('state' => '0', 'errorMessage' => 'userid 값을 확인하세요.', 'errno' => '70010');
    }
    if ($postdata['cmd']=='payrequest') {
      if (!$postdata['goodname']) {
          return array('state' => '0', 'errorMessage' => 'goodname 값을 확인하세요.', 'errno' => '70020');
      }
      if (!$postdata['price']) {
          return array('state' => '0', 'errorMessage' => 'price 값을 확인하세요.', 'errno' => '70020');
      }
      if (!$postdata['recvphone']) {
          return array('state' => '0', 'errorMessage' => 'recvphone 값을 확인하세요.', 'errno' => '70020');
      }
    }
    foreach ($postdata as $k => $v) {
        $postdata_str .= $postdata_str != '' ? '&' : '';
        $postdata_str .= urlencode($k) . '=' . urlencode($v);
    }
    if ($enable_curl === true) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://' . PAYAPP_API_DOMAIN . PAYAPP_API_URL);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata_str);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response_data = curl_exec($ch);
        $errno         = curl_errno($ch);
        $errstr        = curl_error($ch);

        if ($errno) {
            return array('state' => '0', 'errorMessage' => '(' . $errno . ') ' . $errstr, 'errno' => '99999');
        }
        parse_str($response_data, $parse_data);
    } elseif ($enable_socket === true) {
        $request_data .= 'POST ' . PAYAPP_API_URL . ' HTTP/1.1' . $CRLF;
        $request_data .= 'Host: ' . PAYAPP_API_DOMAIN . $CRLF;
        $request_data .= 'Accept: text/html,application/xhtml+xml,*/*' . $CRLF;
        $request_data .= 'Accept-Language: ko-KR' . $CRLF;

        if ($postdata_str) {
            $request_data .= 'Content-Type: application/x-www-form-urlencoded' . $CRLF;
            $request_data .= 'Content-Length: ' . strlen($postdata_str) . $CRLF . $CRLF;
            $request_data .= $postdata_str;
        } else {
            $request_data .= $CRLF;
        }

        if (($fp = fsockopen(PAYAPP_API_DOMAIN, 80, $errno, $errstr, 10)) == false) {
            return array('state' => '0', 'errorMessage' => '(' . $errno . ') ' . $errstr, 'errno' => '99999');
        }
        stream_set_timeout($fp, 30);
        fwrite($fp, $request_data);
        while ($line = fread($fp, 2000)) {
            $response_data .= $line;
        }
        $info = stream_get_meta_data($fp);
        fclose($fp);

        if ($info['time_out']) {
            return array('state' => '0', 'errorMessage' => 'connection time out', 'errno' => '99999');
        }

        $response_data_row = explode($CRLF . $CRLF, $response_data);
        parse_str($response_data_row[1], $parse_data);
    } else {
        return array('state' => '0', 'errorMessage' => 'function not exists', 'errno' => '99999');
    }

    return $parse_data;
}
