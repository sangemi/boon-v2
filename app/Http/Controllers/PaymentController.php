<?php

namespace App\Http\Controllers;

use App\BoonCash;

use App\BoonStatus;
use App\Http\Requests;
use App\Lib\skHelper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public function postPayappStart()
    {
        //$data = Request::all(); Request는 안넘겨도됨.ㅎ

        return view('boon.point.payapp_start');
    }

    public $path_payapp_lib = '../app/Lib/payapp/payapp_lib.php';

    public function postPayappPay()
    {
        $data = Request::all();
        $data['recvphone'] = skHelper::number_only($data['recvphone']);
        $data['price'] = skHelper::number_only($data['price']);


        $new_phone = $data['recvphone'];
        if($new_phone) { //필수값이지만 만약을 위해. && 나중에는 if phone_format.. 으로 바꾸자.
            $user_info = Auth::user()->userInfo;
            $user_info->phone = $new_phone;
            $user_info->save();
        }

    /*    $this->validate($request, [
            'recvphone' => ''
        ]);*/
        /*$validator->extend(               나중 validate 전체 물갈이하자.
            'phone_number',
            function ($attribute, $value, $parameters)
            {
                return preg_match("/^([0-9\s\-\+\(\)]*)$/", $value);
            }
        );*/

        include $this->path_payapp_lib;

        $postdata = array(
            'cmd' => 'payrequest',            // 결제요청, 필수
            'userid' => 'moior',    // 판매자 아이디, 필수

            'goodname' => '포인트 충전',            // 상품명, 필수
            'price' => '1000',                    // 결제요청 금액 (1,000원 이상), 필수
            'recvphone' => '01047750852',                        // 수신자 휴대폰번호 (구매자), 필수
            'memo' => '최종 결제 후 금액에 따라 서비스포인트가 지급됩니다.',        // 결제요청시 메모
            'reqaddr' => '0',                        // 주소요청 여부
            'feedbackurl' => 'http://'.$_SERVER['HTTP_HOST'].'/boon/payment/payapp-feedback',        // 피드백 URL, feedbackurl은 외부에서 접근이 가능해야 합니다. payapp 서버에서 호출 하는 페이지 입니다.
            'var1' => '',            // 임의변수1
            'var2' => '',                // 임의변수2
            // 임의변수는 고객사의 주문번호,상품코드 등 필요에 따라 자유롭게 이용이 가능합니다. feedbackurl로 값을 전달합니다.
            'smsuse' => 'n',                        // 결제요청 SMS 발송여부 ('n'인 경우 SMS 발송 안함)
            'currency' => 'krw',                    // 통화기호 (krw:원화결제, usd:US달러 결제)
            'vccode' => '',                        // 국제전화 국가번호 (currency가 usd일 경우 필수)
            //'returnurl' => 'http://'.$_SERVER['HTTP_HOST'].'/boon/status',    // 결제완료 이동 URL (결제완료 후 매출전표 페이지에서 "확인" 버튼 클릭시 이동)
            'returnurl' => 'http://'.$_SERVER['HTTP_HOST'].'/boon/payment/window-close',    // 결제완료 후 닫기
            'openpaytype' => '',  // 결제수단 선택 (휴대전화:phone, 신용카드:card, 계좌이체:rbank, 가상계좌:vbank)
            // 판매자 사이트 "설정" 메뉴의 "결제 설정"이 우선 합니다.
            // 해외결제는 현재 신용카드 결제만 가능하며, 입력된 값은 무시됩니다.
            'checkretry' => 'y'  // feedbackurl의 응답이 'SUCCESS'가 아닌 경우 feedbackurl 호출을 재시도 합니다. (총 10회)
        );
        if(isset($data['price'])) $postdata['price'] = $data['price'];
        if(isset($data['goodname'])) $postdata['goodname'] = $data['goodname'];
        if(isset($data['recvphone'])) $postdata['recvphone'] = $data['recvphone'];
        if(isset($data['memo'])) $postdata['memo'] = $data['memo'];

        $oResData = payapp_oapi_post($postdata);

        //print_r($oResData);
        //Array ( [state] => 1
        //      [errorMessage] =>
        //      [mul_no] => 6390750
        //      [payurl] => http://www.payapp.kr/zqOwC8
        //      [errno] => 00000 )

        if ($oResData['state'] == '1') {
            // 결제요청성공
            // 결제요청번호($oResData['mul_no'])를 고객사 DB에 저장해 놓으셔야 합니다.
            // 요청이 성공한 것으로 결제완료 상태가 아닙니다. 여기에서 상품배송/서비스 제공을 하면 안됩니다.
            // 결제완료는 feedbackurl에서만 확인이 가능합니다.
            /*
            $oResData['mul_no'];	// 결제요청번호
            $oResData['payurl'];	// 결제창 URL
            */

            /*
            TODO : 이곳에서 결제요청후 정보를 저장합니다.

            ex) UPDATE payrequest SET mul_no='{$oResData['mul_no']}' WHERE orderno='1234567890'
            */
            $aa = BoonCash::create(['user_id'=> Auth::id(), 'title'=> '결제요청',
                                'pg_company'=>'payapp',
                                'pg_payid' => $oResData['mul_no'],
                                'pg_status' => $oResData['state'],
                                'pay_amt' =>$data['price'],
                                'status_inner' => 'access 결제페이지'
            ]);

            // boon_cash에 저장후에 실제 결제 나아감.
            return redirect()->to($oResData['payurl']);

        } else {
            // 결제요청실패
            // 오류메시지($oResData['errorMessage'])를 확인하고, 오류를 수정하셔야 합니다.
            /*
            $oResData['errorMessage'];	// 오류메시지
            $oResData['errno'];			// 오류코드
            */

            /*
            TODO : 이곳에서 결제요청 실패 정보를 저장하거나, 이전 페이지로 이동해서 다시 시도할 수 있도록 해야 합니다.

            ex) UPDATE payrequest SET errorMessage='{$oResData['errorMessage']}' WHERE orderno='1234567890'
            */
            return "오류가 발생하였습니다. E101. 관리자 문의 바랍니다. 02-2135-5251";
        }


    }

    public function getTempWindow()
    {
        echo "
        <form method='post' action='http://".$_SERVER['HTTP_HOST']."/boon/payment/payapp-feedback'>
            <input type=text name='userid' value='moior' />
            <input type=text name='linkkey' value='67Jxavz/oj9leJsAIF9UUu1DPJnCCRVaOgT+oqg6zaM=' />
            <input type=text name='linkval' value='67Jxavz/oj9leJsAIF9UUpDbPmLgU/Imt3Oc/7Xz0T0=' />
            <input type=text name='price' value='1010' />
            <input type=text name='mul_no' value='6400724' />
            <input type=text name='pay_state' value='4' />

            <input type=submit >
        </form>
        ";
        $payapp_userid	= 'moior';	// payapp 판매자 아이디
        $payapp_linkkey	= '67Jxavz/oj9leJsAIF9UUu1DPJnCCRVaOgT+oqg6zaM=';				// payapp 연동key, 판매자 사이트 로그인 후 설정 메뉴에서 확인 가능
        $payapp_linkval	= '67Jxavz/oj9leJsAIF9UUpDbPmLgU/Imt3Oc/7Xz0T0=';				// payapp 연동value, 판매자 사이트 로그인 후 설정 메뉴에서 확인 가능
    }
    public function getWindowClose()
    {
        Session::flash('message', '결제가 완료되었습니다.');

        return "
        <script>
            if(window.opener) window.opener.location.reload();
            window.close();
            self.close();
        </script>
        ";
    }

    /** Payapp에서는 token을 못보냄. 따라서 여긴 예외를 두어야함
     * app/Http/Middleware/VerifyCsrfToken.php 을 열고 $except 변수에 예외 처리
     */
    public function postPayappFeedback()
    {
        include $this->path_payapp_lib;

        /*
        결제요청시 feedbackurl로 입력하는 페이지 입니다.
        결제완료 또는 취소가 되면 feedbackurl을 payapp.kr에서 호출합니다.
        feedbackurl 페이지는 외부로 노출되지 않도록 주의 해야 합니다. 외부로 노출되면 결제를 변조하는 시도를 할 수 있습니다.

        이 페이지는 payapp 서버에서 호출을 하는 페이지 입니다. 따라서 사용자는 이페이지를 볼 수 없습니다.
        본페이지는 payapp.kr에서 접속이 가능해야 합니다.

        payapp.kr에서 데이터는 POST로 전송을 합니다.

        feedbackurl은 여러번 호출이 될 수 있습니다. 각 상태별 중복처리 되지 않도록 하셔야 합니다.
        결제요청시 checkretry이 'y'인 경우 응답으로 'SUCCESS'가 아니면 재요청합니다.

        이 페이지에서 페이지 이동을 하시면 정상적인 동작이 되지 않습니다.
        (javascript, http code 302 등을 사용한 페이지 이동 포함)
        */

        /*
        $_POST['userid'];	판매자 회원 아이디
        $_POST['linkkey'];	연동 KEY
        $_POST['linkval'];	연동 VALUE
        $_POST['goodname'];	상품명
        $_POST['price'];	결제요청 금액
        $_POST['recvphone'];수신 휴대폰번호
        $_POST['memo'];		메모
        $_POST['reqaddr'];	주소요청 (1:요청, 0:요청안함)
        $_POST['reqdate'];	결제요청 일시
        $_POST['pay_memo'];	결제시 입력한 메모
        $_POST['pay_addr'];	결제시 입력한 주소
        $_POST['pay_date'];	결제승인 일시
        $_POST['pay_type'];	결제수단 (1:신용카드, 2:휴대전화, 3:해외결제, 4:대면결제, 6:계좌이체, 7:가상계좌, 9:문화상품권)
        $_POST['pay_state'];결제요청 상태 (4:결제완료, 8,16,31:요청취소, 9,64:승인취소, 10:결제대기)
        $_POST['var1'];		임의 사용 변수 1
        $_POST['var2'];		임의 사용 변수 2
        $_POST['mul_no'];	결제요청번호
        $_POST['payurl'];	결제페이지 주소
        $_POST['csturl'];	매출전표URL
        $_POST['card_name'];	신용카드명
        $_POST['currency'];	통화 (krw:원화,usd:달러)
        $_POST['vccode'];	국제전화 국가번호
        $_POST['score'];	DM Score (currency가 usd이고 결제성공일 때 DM 점수
        */

        // 아래 정보를 payapp 판매자의 정보로 입력하세요.
        // 판매자 사이트에 있는 연동KEY, 연동VALUE는 일반 사용자에게 노출이 되지 않도록 주의 하시기 바랍니다.
        $payapp_userid	= 'moior';	// payapp 판매자 아이디
        $payapp_linkkey	= '67Jxavz/oj9leJsAIF9UUu1DPJnCCRVaOgT+oqg6zaM=';				// payapp 연동key, 판매자 사이트 로그인 후 설정 메뉴에서 확인 가능
        $payapp_linkval	= '67Jxavz/oj9leJsAIF9UUpDbPmLgU/Imt3Oc/7Xz0T0=';				// payapp 연동value, 판매자 사이트 로그인 후 설정 메뉴에서 확인 가능
        $order_price = '1000';                      // 결제요청한 금액

        $check_userid	= isset($_POST['userid']) && $_POST['userid'] == $payapp_userid;
        $check_key	= isset($_POST['linkkey']) && $_POST['linkkey'] == $payapp_linkkey;
        $check_val	= isset($_POST['linkval']) && $_POST['linkval'] == $payapp_linkval;

        $check_price	= isset($_POST['price']) ; //&& $_POST['price'] == $order_price;
        /*echo "--". $check_userid  ."--";
        echo "--". $check_key  ."--";
        echo "--". $check_val  ."--";
        echo "--". $check_price  ."--";
        if( $check_userid && $check_key && $check_val && $check_price ) {
            echo "========";
        }
        dd($_POST);*/

        $aa = BoonCash::create(['user_id'=>1, 'title'=> 'Payapp에서 Post데이터 전송옴!' ]);

        /*
        userid, linkkey, linkval 값을 비교 확인 하고 동일한 경우에만 결제여부를 처리 하셔야 합니다.
        */
        if( $check_userid && $check_key && $check_val && $check_price )
        {
            switch( $_POST['pay_state'] )
            {
                case '4':
                    // 결제완료
                    // 결제요청한 결제건이 결제가 완료된 상태입니다.
                    // 이곳에서 결제완료에 대한 처리 (상품배송/서비스 제공 등)를 하시면 됩니다.
                    /*
                    TODO : 이곳에서 결제완료 처리를 합니다.
                    ex) UPDATE payrequest SET pay_state='결제완료', pay_date='{$_POST['pay_date']}' WHERE orderno='$_POST['var1']' AND mul_no={$_POST['mul_no']};
                    */

                    /*스텝 Step 1*/
                    $bc = BoonCash::where('pg_payid', $_POST['mul_no'] )->get()->first();
                    $bc->pg_status = $_POST['pay_state'];
                    $bc->confirmed = 1;
                    $bc->status_inner = '자동 확인완료';
                    $bc->status_show = '결제가 확인되었습니다';
                    $bc->save();

                    /*스텝 Step 2*/
                    $bs = BoonStatus::where('user_id', Auth::id())->get()->first();
                    $bs->boon_cash = $bs->boon_cash + $_POST['price'];
                    $bs->boon_point = $bs->boon_point + $_POST['price'];
                    $bs->save();

                    break;
                case '8':
                case '16':
                case '32':
                    // 요청취소
                    $aa = BoonCash::create(['user_id'=>1, 'title'=> '요청취소!' ]);
                    /*
                    TODO : 이곳에서 결제요청 취소 처리를 합니다. (결제하지 않은 상태에서 취소)
                    */

                    break;
                case '9':
                case '64':
                    // 승인취소
                    $aa = BoonCash::create(['user_id'=>1, 'title'=> '승인취소!' ]);

                    /*
                    TODO : 이곳에서 결제승인 취소 처리를 합니다. (결제완료 상태에서 취소)

                    ex) UPDATE payrequest SET pay_state='결제취소', pay_date='{$_POST['pay_date']}' WHERE orderno='$_POST['var1']' AND mul_no={$_POST['mul_no']};
                    */
                    /*스텝 Step 1*/
                    $bc = BoonCash::where('pg_payid', $_POST['mul_no'] )->get()->first();
                    $bc->pg_status = $_POST['state'];
                    $bc->confirmed = 1;
                    $bc->status_inner = '자동 결제취소';
                    $bc->status_show = '결제가 취소되었습니다';
                    $bc->save();

                    /*스텝 Step 2*/
                    $bs = BoonStatus::where('user_id', Auth::id())->get()->first();
                    $bs->boon_cash = $bs->boon_cash - $_POST['price'];
                    $bs->boon_point = $bs->boon_point - $_POST['price'];
                    $bs->save();

                    break;
                case '10':
                    // 결제대기
                    $aa = BoonCash::create(['user_id'=>1, 'title'=> '결제대기!' ]);

                    break;
                default:
                    break;
            }
        }



        // 처리응답
        // 결제요청시 checkretry이 'y'인 경우 응답이 'SUCCESS'가 아니면 재호출 합니다. (총 10회)
        echo 'SUCCESS';
        // 처리실패
        //echo 'FAIL';

        exit;
    }
}
