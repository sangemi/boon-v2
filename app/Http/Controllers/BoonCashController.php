<?php namespace App\Http\Controllers;

use App\BoonCash;
use App\BoonStatus;
use App\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;



class BoonCashController extends Controller {

	/*
	 * 	GET			/photo				index	photo.index		리스트
		GET			/photo/create		create	photo.create	입력폼
		POST		/photo				store	photo.store		> DB저장
		GET			/photo/{photo}		show	photo.show		특정view
		GET			/photo/{photo}/edit	edit	photo.edit		수정폼
		PUT/PATCH	/photo/{photo}		update	photo.update	> DB업뎃
		DELETE		/photo/{photo}		destroy	photo.destroy	DB삭제
	 * index 	create 	store	show 	 edit	update	destroy
	 *
	 */
	public function __construct()
	{

	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//$list = BoonCash::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(9);
		$list = Auth::user()->boonCash;
		//$ccMails = DB::table('ccmails_order')->orderBy('id', 'desc')->paginate(9);

		return view('boon.point.cash_list', compact('list'));
	}

	/**
	 * /boon/status 에서 계좌이체 누르면/ 입금내역 생성.
	 * payapp_response.php 에서 올 경우 구분.
	 */
	public function create()
	{

		if( empty($id) ){
			$ccMail = new BoonCash(); /*빈 모델. 첨부터 직접 작성*/
		}else{
			// /ccmail/work/create/307 형식일때 샘플을 불러와서 작성함!
			$ccMail = CcMailSample::findOrFail($id);  /*ccmails_sample table에 접속 */
		}
		return view('boon.ccMail.work_write', compact('ccMail', 'id'));

	}


	public function store($where = null)
	{
		$boon_cash = new BoonCash(); /*빈 모델. 첨부터 직접 작성*/
		$data = Request::all();

		/*user_info 테이블의 phone이 비어있을 때 입력하기*/
		$user_info = Auth::user()->userInfo;
		if( empty($user_info->phone) && $data['recvphone']){
			$user_info->phone = $data['recvphone'];
			$user_info->save();
		}


		// 은행이체했다고 클릭시.
		if( empty($data['linkval']) ){
			$boon_cash->user_id = Auth::user()->id;
			$boon_cash->title = '은행이체';
			$boon_cash->pay_memo = "입금자명 : ".$data['bank_owner']." / 전번 : ".$data['recvphone'];
			$boon_cash->pay_amt = $data['price'];

			$boon_cash->confirmed = false;
			$boon_cash->save();

		}else{ // if payapp의 Feedbackurl 경로로 자동 로드된거면
			/*https://payapp.kr/home/apiman/developers.html*/
			if($data['linkval'] != '67Jxavz/oj9leJsAIF9UUpDbPmLgU/Imt3Oc/7Xz0T0=') {
				Session::flash('message', '연동 value 오류입니다. 관리자 문의 부탁합니다. 02-2135-5251');
				return redirect()->to('/boon/status');
			}
			$boon_cash->user_id = Auth::user()->id;
			$boon_cash->title = '간편결제'; //카드, 휴대폰결제
			$boon_cash->pay_memo = "전번 : ".$data['recvphone']." / 변수1 : ".$data['var1']." / 변수2 : ".$data['var2'];
			$boon_cash->pay_amt = $data['price'];

			$boon_cash->pg_company = 'payapp';
			$boon_cash->pg_payid = $data['mul_no'];
			$boon_cash->pg_card_url = $data['csturl']; //매출전표

			$boon_cash->pg_status = $data['pay_state']; //1:요청, 4:결제완료, 8,16,32:요청취소, 9,64:승인취소, 10:결제대기

			$boon_cash->confirmed = true;
			$boon_cash->save();

			/*캐쉬 이력 넣은 후, payapp 이면 boon_status 변경 / 계좌이체 누른거면 관리자페이지에서 status변경.*/
			$boon_status = BoonStatus::firstOrNew( ['id' => Auth::user()->id] ); // 해당 user table
			$boon_status->boon_cash = $boon_status->boon_cash + $data['price'];
			$boon_status->save();

		}

		Session::flash('message', '정상처리 되었습니다. 감사합니다. (최종 반영시까지 시간이 다소 걸릴 수 있습니다)');
		return redirect()->to('/boon/status'); //.$boon_status->id
	}


	/**
	 */
	public function show($id, $direction = null)
	{

		$value = BoonSystem::findOrFail($id);
		if( empty($value) ) abort(404, '자료가 없습니다.');

		/*if( $userReq->status_inner == '접수' || $userReq->status_inner == '' ){
			return view('boon.ccMail.work_show', compact('ccMail', 'id'));
		}else{

		}*/
		return view('boon.point.show', compact('value', 'id'));
	}

	/**
	 */
	public function edit($id)
	{
		$value = BoonSystem::find($id);
		return view('boon.point.edit', compact('value', 'id'));
	}

	/**
	 */
	public function update($id)
	{
	}

	/**
	 */
	public function destroy($id)
	{

	}

}
