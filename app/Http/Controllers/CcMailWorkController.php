<?php namespace App\Http\Controllers;

use App\BoonStatus;
use App\CcMailWork;
use App\CcMailSample;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Guzzle\Plugin\Cookie\Cookie;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;



class CcMailWorkController extends Controller {

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
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		//$ccMails = CcMailWork::where('create_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(9);
		//$ccMails = Auth::user()->ccMailWork()->orderBy('id', 'desc')->paginate(9);
		//$ccMails = auth()->user()->ccMailWork; => 변수형식으로 하면, query 실행해버림! 따라서 ()함수형식으로 연결연결..
		$ccMails = auth()->user()->ccMailWork()->orderBy('id', 'desc')->paginate(9);

		//$ccMails = DB::table('ccmails_work')->orderBy('id', 'desc')->paginate(9);

		return view('boon.ccMail.work_list', compact('ccMails'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($id = null)
	{
		if( empty($id) ){
			$ccMail = new CcMailSample(); /*빈 모델. 첨부터 직접 작성*/
		}else{
			// /ccmail/work/create/307 형식일때 샘플을 불러와서 작성함!
			$ccMail = CcMailSample::findOrFail($id);  /*ccmail_samples table에 접속 */
		}
		return view('boon.ccMail.work_write', compact('ccMail', 'id'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	protected function validator(array $data)
	{
		return Validator::make($data, [
			'sender_name' => 'required|max:255',
			'sender_addr' => 'max:255',
			'sender_phone' => 'required|max:255',
			'receiver_name' => 'required|max:255',
			'receiver_addr' => 'required|max:255',
			'receiver_phone' => 'max:255',
			'title' => 'max:255',
			'content' => 'required',
		]); //|email|max:255|unique:users 'password' => 'required|confirmed|min:6',
		// receiver. 에서 numeric|alpha 숫자+하이픈만 어떻게 하는지 모르겠네.....
	}
	public function store()
	{

		if (Auth::check()) { // 로그인여부
			/*print_r(Request::all());
			print_r(Input::all());*/
			$validator = $this->validator(Input::all());

			if ($validator->fails()) {

				Session::flash('message', '입력값을 확인해주세요.');

				return Redirect::to('ccmail/work/create/'.Input::get('sample_id'))
					->withErrors($validator)
					->withInput(Input::except('password'));

			} else {
				$data = Input::all();
				$ccmail = new CcMailWork();

				$ccmail->user_id = Auth::id();
				$ccmail->sample_id = $data['sample_id'];
				$ccmail->sender_name = $data['sender_name'];
				$ccmail->sender_addr = $data['sender_addr'];
				$ccmail->sender_phone = $data['sender_phone'];

				$ccmail->receiver_name = $data['receiver_name'];
				$ccmail->receiver_addr = $data['receiver_addr'];
				$ccmail->receiver_phone = $data['receiver_phone'];

				$ccmail->content = $data['content'];

				$ccmail->save();

				Session::flash('message', '보관함에 저장되었습니다.');
				return redirect()->to('/ccmail/work/'.$ccmail->id);
			}

		}else{
			//Session::put('temp_ccmail_data', $_POST); // flash : 다음번 요청에서만 사용하기. <> put
			//Session::put('return_url', Request::url());

			return redirect()->to('/auth/login'); //->with('temp_ccmail_data', $_POST); //with는 Session::flash인듯. 다음번 요청에서만 사용.
		}

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id, $direction = null)
	{
		$ccMail = CcMailWork::find($id);
		if( empty($ccMail) ) abort(404, '자료가 없습니다.');
		else if($ccMail->user_id != Auth::id()) abort(404, '자료를 볼 수 없습니다.'); // 자기것만

		$point = BoonStatusController::getPoint();

		/*if( $ccMail->status_inner == '접수' || $ccMail->status_inner == '' ){
			return view('boon.ccMail.work_show', compact('ccMail', 'id'));
		}else{

		}*/
		return view('boon.ccMail.work_show', compact('ccMail', 'id', 'point'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$ccMail = CcMailWork::find($id);
		return view('boon.ccMail.work_edit', compact('ccMail', 'id'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

		if ( !Auth::check() ) { // 샘플은 그냥 다 볼수 있으니, 수정시 로그인여부 체크!
			//Session::put('temp_ccmail_data', $_POST); // flash : 다음번 요청에서만 사용하기. <> put
			//Session::put('return_url', Request::url());

			return redirect()->to('/auth/login'); //->with('temp_ccmail_data', $_POST); //with는 Session::flash인듯. 다음번 요청에서만 사용.
		}
		/*print_r(Request::all()); //보이지도 않고 지나가버림*/

		$validator = $this->validator(Request::all());

		if ($validator->fails()) {

			Session::flash('message', '입력값을 확인해주세요.');

			return Redirect::back()
				->withErrors($validator)
				->withInput(Request::except('password'));

		} else {

			/*이건 프로퍼티 방식이라고 함. 배열방식은 select없이 바로 update하는데, 보안때문에 모델에 fillable 지정해야.*/
			$task = CcMailWork::find($id);

			$data = Request::all();

			/*$task->sample_id = $data['sample_id'];*/
			$task->sender_name = $data['sender_name'];
			$task->sender_addr = $data['sender_addr'];
			$task->sender_phone = $data['sender_phone'];

			$task->receiver_name = $data['receiver_name'];
			$task->receiver_addr = $data['receiver_addr'];
			$task->receiver_phone = $data['receiver_phone'];

			$task->title = $data['title'];
			$task->content = $data['content'];

			$ret = $task->save();
			if($ret) Session::flash('message', '수정되었습니다.');
			else  Session::flash('message', '저장시 오류가 발생하였습니다.');

			return redirect()->to('/ccmail/work/'.$task->id);
		}
		return response()->json(['result' => $ret, 'ccmail' => $task],
			200, [], JSON_PRETTY_PRINT);

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		CcMailWork::destroy($id); /*$work = $this->ccmail->findOrFail($id)->destroy($id);*/
		Session::flash('message', '삭제되었습니다.');
		return $this->index();
		//return redirect()->route('dashboard.products.index')->with('alert-danger', 'Product successfully deleted.');

	}

}
