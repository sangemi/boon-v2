<?php namespace App\Http\Controllers;

use App\WaveClient;
use App\Http\Requests;

use App\Lib\skHelper;
use Guzzle\Plugin\Cookie\Cookie;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;


class WaveClientController extends Controller {

	/*
	 * 	GET			/photo				index	photo.index		리스트
		GET			/photo/create		create	photo.create	입력폼
		POST		/photo				store	photo.store		> DB저장
		GET			/photo/{photo}		show	photo.show		특정view
		GET			/photo/{photo}/edit	edit	photo.edit		수정폼
		PUT/PATCH	/photo/{photo}		update	photo.update	> DB업뎃
		DELETE		/photo/{photo}		destroy	photo.destroy	DB삭제
	 * index 	create 	store	show 	 edit	update	destroy
	 */

	/** 기본 전체 리스트
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() // 여긴 쓸일음슴....? dashboard에서 다함.
	{
		//$ccMails = CcMail::paginate(5);
		$waveSuits = DB::table('wave_suits')
			-> orderBy('created_at', 'desc') -> get();

		return ""; //view('boon.ccMail.sample_list', compact('ccMails', 'ccMailsCate1s', 'ccMailsCate2s', 'etc'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($id = null)
	{
		$waveClient = new WaveClient(); /*빈 모델. 첨부터 직접 작성*/
		$data = Request::all();
		if(!count($data) || !$data['suit_id']){
			/*$data['suit_id'] = 1; // 기본 소송(코웨이)
			$data['suit_id'] = 5; // 코웨이 중금속 얼음정수기
			$data['suit_id'] = 6; // 인터파크 정보유출*/

			/*소송을 고르는 루틴*/

			return  view("boon.wave.client_write_select");
		}
		if(Auth::check()){
			if(count($waveClient)){
				return view('boon.wave.client_write_'.$data['suit_id'], compact('waveClient', 'data'));
			}else{
				return "자료가 없습니다.<br><br><a href='javascript:history.back()'>BACK</a>";
			}
		}else{
			return redirect()->to('/auth/login');
		}
		//return view('boon.ccMail.sample_write', compact('waveClient'));
		return view('boon.wave.client_write_'.$waveClient['suit_id'], compact('waveClient', 'data'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */

	protected function validator(array $data)
	{
		if(isset($data['suit_id'])){
			if( $data['suit_id'] == 1 || $data['suit_id'] == 5 ) { // 코웨이
				return Validator::make($data, [
					'suit_id' => 'required|max:255',
					'name' => 'required|max:255',
					'jumin' => 'max:255',
					'phone' => 'required|max:255',
					'data01' => 'required|max:255',
					'data09' => 'alpha_dash',
					'data15' => 'required',
					'약정동의' => 'required'
				]); //|email|max:255|unique:users 'password' => 'required|confirmed|min:6',
				// 숫자+하이픈=alpha_dash.... // laravel.com/docs/5.2/validation
			}else if( $data['suit_id'] == 6 ) { // 인터파크
				return Validator::make($data, [
					'suit_id' => 'required|max:255',
					'name' => 'required|max:255',
					'jumin' => 'max:255',
					'phone' => 'required|max:255',
					'약정동의' => 'required'
				]);
			}

		}
		return Validator::make($data, [
			'suit_id' => 'required|max:255',
			'name' => 'required|max:255',
			'phone' => 'required|max:255',
			'약정동의' => 'required'
		]);

	}
	public function store()
	{
		if ( !Auth::check() ) { // 샘플은 누구나 볼수 있으니, 수정시 권한 체크

			// 권한 관리해야함. 지금은 로그인체크만 하는 상태..

			return redirect()->to('/auth/login');
		}

		$validator = $this->validator(Request::all());
		//dd($validator);
		if ($validator->fails()) {
			Session::flash('message', '입력을 확인해주세요.');
			return redirect()->back()
				->withErrors($validator)
				->withInput(Request::except('password'));
		} else {
			$task = new WaveClient();
			$data = Request::all();

			$task->user_id = Auth::id();
			if(isset($data['suit_id'])) $task->suit_id = $data['suit_id']; // 코웨이 중금속 사건. 다른 소송일경우. 변경해야.
			$task->status_id = '1'; // 처음 접수시에는 무조건 신청확인중.

			if(isset($data['name']))	$task->name = $data['name'];
			if(isset($data['jumin']))	$task->jumin = $data['jumin'];
			if(isset($data['phone']))	$task->phone = $data['phone'];

			if(isset($data['addr']))	$task->addr = $data['addr'];
			if(isset($data['addr2']))	$task->addr2 = $data['addr2'];
			if(isset($data['postcode']))	$task->postcode = $data['postcode'];

			if(isset($data['data01']))	$task->data01 = $data['data01'];
			if(isset($data['data02']))	$task->data02 = $data['data02'];
			if(isset($data['data03']))	$task->data03 = $data['data03'];
			if(isset($data['data04']))	$task->data04 = $data['data04'];
			if(isset($data['data05']))	$task->data05 = $data['data05'];
			if(isset($data['data06']))	$task->data06 = $data['data06'];
			if(isset($data['data07']))	$task->data07 = $data['data07'];
			if(isset($data['data08']))	$task->data08 = $data['data08'];
			if(isset($data['data09']))	$task->data09 = $data['data09'];
			if(isset($data['data10']))	$task->data10 = $data['data10'];

			if(isset($data['data11']))	$task->data11 = $data['data11'];
			if(isset($data['data12']))	$task->data12 = $data['data12'];


			if(isset($data['data13']))	$task->data13 = $data['data13'];
			if(isset($data['data14']))	$task->data14 = $data['data14'];


			if(isset($data['data15']))	$task->data15 = $data['data15']; //A타입, B타입

			if(isset($data['bank_name']))		$task->bank_name = $data['bank_name'];
			if(isset($data['bank_number']))	$task->bank_number = $data['bank_number'];
			if(isset($data['bank_owner']))		$task->bank_owner = $data['bank_owner'];


			$ret = $task->save();
			if($ret) Session::flash('message', '입력되었습니다.');
			else  Session::flash('message', '오류가 발생하였습니다. SK1083');
			return redirect()->to('/wave/mypage' );

		}
	}


	/**
	 * @param  int  $search_text
	 * @return Response
	 * ccmail/sample/4 : 4번 샘플
	 * ccmail/sample/4/prev : 4번 다음 샘플
	 */
	public function show($search_text, $direction = null)
	{
		if( !count($direction) ){

			if( is_numeric($search_text)){
				$ccMail = CcMailSample::find($search_text);
				$id = $search_text;
				if( !count($ccMail) ) abort(404, '자료가 없습니다.');

			}else{ // ccmail/sample/임대차-관계에서-..-경우  주소인 경우.

				// 업무 라는 글자가 들어가면 Object not found! 에러가 나옴...... 뭐지?? -_- 뭐지?
				// 여긴 자연어 검색해야... ㅎ
				$ccMail = CcMailSample::where('cate3', str_replace('-', ' ', $search_text) )->first();

				if( !count($ccMail) ) abort(404, '자료가 없습니다.'); // 메인 리스트로 보내자.
				$id = $ccMail->id;
			}

			// 해당 카테고리 다른샘플
			$lists = CcMailSample::where('cate1', $ccMail->cate1)->orderByRaw("RAND()")->take(15)->get();

			return view('boon.ccMail.sample_show', compact('ccMail', 'id', 'lists'));
		}else if($direction == 'prev'){ //이전버튼
			$id = CcMailSample::where('id', '<', $search_text)->max('id');
			return redirect()->to('/ccmail/sample/'.$id);
		}else if($direction == 'next'){ //다음버튼
			$id = CcMailSample::where('id', '>', $search_text)->min('id');
			return redirect()->to('/ccmail/sample/'.$id);
		}

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$waveClient = WaveClient::find($id); /*빈 모델. 첨부터 직접 작성*/

		if( Auth::check() && Auth::user()->id == $waveClient->user_id ) {
			return view('boon.wave.client_edit_'.$waveClient['suit_id'], compact('waveClient', 'id'));
		}else if( Auth::id() == '1'){ // 김상겸일 경우 모두 수정가능. Auth 권한관리해야함.
			return view('boon.wave.client_edit_'.$waveClient['suit_id'], compact('waveClient', 'id'));
		}else {
			return "잘못된 접근입니다.<br><br><a href='/'>HOME</a>";
		}


		/*$ccMail = CcMailSample::find($id);
		return view('boon.ccMail.sample_edit', compact('ccMail', 'id'));*/
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		if ( !Auth::check() ) { // 수정시 권한 체크해야함..


			// 권한 관리해야함. 지금은 로그인체크만 하는 상태..

			return redirect()->to('/auth/login'); //->with('temp_ccmail_data', $_POST); //with는 Session::flash인듯. 다음번 요청에서만 사용.
		}

		$request = Request::all();

		$validator = Validator::make($request, [
			'name' => 'required|max:255',
			'phone' => 'required|max:255'
		]);
		if ($validator->fails()) {
			Session::flash('message', '입력을 확인해주세요.');
			return redirect()->back()
				->withErrors($validator)
				->withInput(Request::except('password'));
		}
		/*이건 프로퍼티 방식이라고 함. 배열방식은 select없이 바로 update하는데, 보안때문에 모델에 fillable 지정해야.*/
		$task = WaveClient::find($id);

		/*$task->suit_id = '1'; // 코웨이 중금속 사건. 다른 소송일경우. 변경해야.
		$task->status_id = '1'; // 처음 접수시에는 무조건 신청확인중.*/

		if(isset($request['name']))	$task->name = $request['name'];
		if(isset($request['jumin']))	$task->jumin = $request['jumin'];
		if(isset($request['phone']))	$task->phone = $request['phone'];

		if(isset($request['addr']))	$task->addr = $request['addr'];
		if(isset($request['addr2']))	$task->addr2 = $request['addr2'];
		if(isset($request['postcode']))	$task->postcode = $request['postcode'];

		if(isset($request['data01']))	$task->data01 = $request['data01'];
		if(isset($request['data02']))	$task->data02 = $request['data02'];
		if(isset($request['data03']))	$task->data03 = $request['data03'];
		if(isset($request['data04']))	$task->data04 = $request['data04'];
		if(isset($request['data05']))	$task->data05 = $request['data05'];
		if(isset($request['data06']))	$task->data06 = $request['data06'];
		if(isset($request['data07']))	$task->data07 = $request['data07'];
		if(isset($request['data08']))	$task->data08 = $request['data08'];
		if(isset($request['data09']))	$task->data09 = $request['data09'];
		if(isset($request['data10']))	$task->data10 = $request['data10'];

		if(isset($request['data11']))	$task->data11 = $request['data11'];
		if(isset($request['data12']))	$task->data12 = $request['data12'];

		if(isset($request['data13']))	$task->data13 = $request['data13'];
		if(isset($request['data14']))	$task->data14 = $request['data14'];

		if(isset($request['data15']))	$task->data15 = $request['data15']; //A타입, B타입

		if(isset($request['bank_name']))	$task->bank_name = $request['bank_name'];
		if(isset($request['bank_number']))	$task->bank_number = $request['bank_number'];
		if(isset($request['bank_owner']))	$task->bank_owner = $request['bank_owner'];

		$ret = $task->save();
		if($ret) Session::flash('message', '수정되었습니다.');
		else  Session::flash('message', '오류가 발생하였습니다. SK1088');
		return redirect()->to('/wave/mypage' ); /*return redirect()->to('/ccmail/sample/'.$task->id);*/


	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		WaveClient::destroy($id);
		Session::flash('message', '삭제되었습니다.');
		$return = array("data" => "삭제완료", "result" => "success");
		return response()->json($return); //return "success"; //$this->index();
	}

}
