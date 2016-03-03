<?php namespace App\Http\Controllers;

use App\Lib\Coolsms;
use Illuminate\Support\Facades\Request;

class SmsController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| SMS Controller
	|--------------------------------------------------------------------------
	|
	| 문자발송. Cool sms 우선 씀. 2016.
	| 나중
	*/
	public function __construct()
	{
	}




	/**
	 *
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('home');


		/*메일 보내는 방법
        $data['message'] = '김수로님';
        Mail::send('emails.welcome', $data, function($message)
        {
            $message->to('sangemi@daum.net', 'John Smith')->subject('[분쟁제로] 사이트 이용방법');
        });*/

	}

	/*[group_id] => R1G56D7DF74F02DA
    [success_count] => 1
    [error_count] => 0
    [result_code] => 00
    [result_message] => Success*/
	public function sendSms() /*$to='', $from, $text, $goto = ''*/
	{
		$data = Request::all();
		$rest = new Coolsms();
		//$senderid = $rest->get_senderid_list($options)->getResult();
		$options = new \stdClass();

		$options->to = $data['to'];
		$options->from = $data['from'];
		$options->text = $data['text'];
		$result = $rest->send($options)->getResult();

		// Return the message object to the browser as JSON
		if( !isEmpay($data['goto']) ){
			return redirect( $data['goto'] );
		}else
			return redirect()->back();

	}


}
