<?php namespace App\Http\Controllers;

use App\WaveClient;
use App\Http\Requests;

use App\Lib\skHelper;
use App\WaveFile;
use App\WaveSuit;
use Guzzle\Plugin\Cookie\Cookie;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;


class WaveFileController extends Controller {

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

		return "파일관리페이지. "; //view('boon.ccMail.sample_list', compact('ccMails', 'ccMailsCate1s', 'ccMailsCate2s', 'etc'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if ( !Auth::check() ) { // 샘플은 누구나 볼수 있으니, 수정시 권한 체크
			return redirect()->to('/auth/login');
		}
		$waveFile = new WaveFile(); /*빈 모델. 첨부터 직접 작성*/
		$data = Request::all();
		if(!empty($data['client_id'])){
			$client = WaveClient::find($data['client_id']);
			$suit = WaveSuit::find($client['suit_id']);

			/*기존 미리 입력되었던 파일을 검사해서... html에서 class에 써먹을수 있게 배열로 넘김*/
			$uploaded_files = WaveFile::where('client_id', $data['client_id'])->orderBy('title_no', 'asc')->get();
			$document_ok = array_fill(0, 100, 'document-no'); // 100개 증거번호에 모두 no 입력
			foreach($uploaded_files as $uploaded_files_){ // 업로드 된것만 ok로 변경
				$document_ok[$uploaded_files_['title_no']] = 'document-ok';
			}


			return view('boon.wave.file_write_'.$suit['id'] , compact('waveFile', 'client', 'suit', 'document_ok', 'uploaded_files'));
		}else {
			return "로그인 / 접수인단 error";
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	protected function validator(array $data)
	{
		return Validator::make($data, [
			'file_data' => 'required'
		]); //|email|max:255|unique:users 'password' => 'required|confirmed|min:6',
		// 숫자+하이픈=alpha_dash.... // laravel.com/docs/5.2/validation
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
			$task = new WaveFile();
			$data = Request::all();

			$client = WaveClient::find($data['client_id']);
			/*$suit = WaveSuit::find($client['suit_id']);*/

			if(Request::hasFile('file_data')){

				$file = Request::file('file_data'); //$data->file('file01');

				$task->client_id = $client['id'];
				$task->source_filename= $file->getClientOriginalName();

				$destinationPath = '/upload/wave/suit/'.$client['suit_id']; //public_path('/upload/wave/suit/'.$client['suit_id']);
				$real_filename = $client['id'].'-'.date("Ymd").'-'.$file->getClientOriginalName();
				$task->uploaded_filename= $destinationPath."/".$real_filename;

				$task->file_size = $file->getSize();
				$task->title_no = $data['title_no'];
				$task->title = $data['title'];
				$task->explain = $data['file_explain'];

				echo 'File Name: '.$file->getClientOriginalName(); echo '<br>';
				echo 'File Extension: '.$file->getClientOriginalExtension(); echo '<br>';
				echo 'File Real Path: '.$file->getRealPath(); echo '<br>';  //최초 업로드장소
				echo 'File Size: '.$file->getSize(); echo '<br>';
				echo 'File Mime Type: '.$file->getMimeType(); echo '<br>';

				//Move Uploaded File
				$file->move($destinationPath,$real_filename);
				$ret = $task->save();

			}else{
				return "파일X";
			}

			if($ret) Session::flash('message', '입력되었습니다.');
			else  Session::flash('message', '오류가 발생하였습니다. SK10183');
			return redirect()->back();

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
			return view('boon.wave.client_edit', compact('waveClient', 'id'));
		}else if( Auth::id() == '1'){ // 김상겸일 경우 모두 수정가능. Auth 권한관리해야함.
			return view('boon.wave.client_edit', compact('waveClient', 'id'));
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

		$validator = $this->validator(Request::all());
		if ($validator->fails()) {

			Session::flash('message', '입력값을 확인해주세요.');

			return Redirect::back()
				->withErrors($validator); /*->withInput(Request::except('password'));*/

		} else {

			/*이건 프로퍼티 방식이라고 함. 배열방식은 select없이 바로 update하는데, 보안때문에 모델에 fillable 지정해야.*/
			$task = WaveClient::find($id);
			$data = Request::all();

			/*$task->suit_id = '1'; // 코웨이 중금속 사건. 다른 소송일경우. 변경해야.
			$task->status_id = '1'; // 처음 접수시에는 무조건 신청확인중.*/

			$task->name = $data['name'];
			$task->jumin = $data['jumin'];
			$task->phone = $data['phone'];

			$task->addr = $data['addr'];
			$task->addr2 = $data['addr2'];
			$task->postcode = $data['postcode'];

			$task->data01 = $data['data01'];
			$task->data02 = $data['data02'];
			$task->data03 = $data['data03'];
			$task->data04 = $data['data04'];
			$task->data05 = $data['data05'];
			$task->data06 = $data['data06'];
			$task->data07 = $data['data07'];
			$task->data08 = $data['data08'];
			$task->data09 = $data['data09'];
			$task->data10 = $data['data10'];

			$task->data11 = $data['data11'];
			$task->data12 = $data['data12'];

			/*$task->data12 = $data['data12'];
			$task->data13 = $data['data13'];
			$task->data14 = $data['data14'];
			*/

			$task->data15 = $data['data15']; //A타입, B타입

			$ret = $task->save();
			if($ret) Session::flash('message', '수정되었습니다.');
			else  Session::flash('message', '오류가 발생하였습니다. SK1088');
			return redirect()->to('/wave/mypage' ); /*return redirect()->to('/ccmail/sample/'.$task->id);*/
		}

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		WaveClient::destroy($id); //CcMailSample::find($id)->delete();
		Session::flash('message', '삭제되었습니다.');
		return $this->index();
	}

}
