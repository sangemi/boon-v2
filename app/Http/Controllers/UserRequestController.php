<?php namespace App\Http\Controllers;

use App\CcMailWork;
use App\UserRequest;
use App\Http\Requests;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;



class UserRequestController extends Controller {

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
		$tasks = UserRequest::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(9);

		return view('boon.userRequest.list', compact('tasks'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($id = null)
	{

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
	private function makePaperHTML($type, $content){
		// 서식 생성기. SK
		return $content;
	}
	public function store($fromWhere = null)
	{
		// 은행이체를 누른 경우
		//$fromWhere = ($fromWhere)?$fromWhere:'';

		$task = new UserRequest();
		$data = Request::all();

		$task->user_id = Auth::user()->id;
		if( isset($data['work_id']) ){
			$task->model_name = 'CcMailWork';
			$task->model_id = $data['work_id'];
			$title_text = CcMailWork::find($data['work_id'])->receiver_name;
		}else{
			$task->model_name = '';
			$task->model_id = '';
		}

		$task->title = $data['goodname']." / 수신 ". $title_text . " ";
		$task->ask_origin = " 결제액 : ". number_format($data['price_sum']) . "원  / 요청사항 : ". $data['ask_origin'];

		/*$worked_paper = \stdClass();
		$worked_paper->sender_name = $data['sender_name'];
		$worked_paper->sender_addr = $data['sender_addr'];
		$worked_paper->sender_phone = $data['sender_phone'];

		$worked_paper->receiver_name = $data['receiver_name'];
		$worked_paper->receiver_addr = $data['receiver_addr'];
		$worked_paper->receiver_phone = $data['receiver_phone'];

		$worked_paper->content = $data['content'];

		$task->worked_paper = $this->makePaperHTML('ccmail', $worked_paper);*/
		$task->worked_paper = $data['worked_paper'];

		$task->status_inner = '신청';
		$task->status_show = '접수되었습니다.';


		$ret = $task->save();
		if($ret){
			BoonStatusController::usePoint( $data['price_sum'] );

			Session::flash('message', '정상 신청되었습니다. 처리시 문자안내 드리오니 잠시 기다려 주세요. 감사합니다.');
		}
		else  Session::flash('message', '저장시 오류가 발생하였습니다. 에러No.5303');

		return redirect()->to('/request/'.$task->id);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id, $direction = null)
	{
		$task = UserRequest::findOrFail($id); /** 이렇게 하니까. view에서 $task->akak 없는 변수라도 에러가 안나네. ->paginate() 등 으로 처리하면 에러날때도.. 이부분 공부해야 */
		if( empty($task) ) abort(404, '자료가 없습니다.');
		else if($task->user_id != Auth::id()) abort(404, '자료를 볼 수 없습니다.'); // 자기것만

		/*if( $userReq->status_inner == '접수' || $userReq->status_inner == '' ){
			return view('boon.ccMail.work_show', compact('ccMail', 'id'));
		}else{

		}*/
		return view('boon.userRequest.show', compact('task', 'id'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$ccMail = UserRequest::find($id);
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

		if (Auth::check()) { // 로그인여부
			/*print_r(Request::all()); //보이지도 않고 지나가버림*/

			$validator = $this->validator(Request::all());

			if ($validator->fails()) {

				Session::flash('message', '입력값을 확인해주세요.');

				return Redirect::back()
					->withErrors($validator)
					->withInput(Request::except('password'));

			} else {

				/*이건 프로퍼티 방식이라고 함. 배열방식은 select없이 바로 update하는데, 보안때문에 모델에 fillable 지정해야.*/
				$ccmail = UserRequest::find($id);

				$data = Request::all();

				/*$ccmail->sample_id = $data['sample_id'];*/
				$ccmail->sender_name = $data['sender_name'];
				$ccmail->sender_addr = $data['sender_addr'];
				$ccmail->sender_phone = $data['sender_phone'];

				$ccmail->receiver_name = $data['receiver_name'];
				$ccmail->receiver_addr = $data['receiver_addr'];
				$ccmail->receiver_phone = $data['receiver_phone'];

				$ccmail->title = $data['title'];
				$ccmail->content = $data['content'];

				$ret = $ccmail->save();
				if($ret) Session::flash('message', '수정되었습니다.');
				else  Session::flash('message', '저장시 오류가 발생하였습니다.');

				return redirect()->to('/ccmail/work/'.$ccmail->id);
			}
			return response()->json(['result' => $ret, 'ccmail' => $ccmail],
				200, [], JSON_PRETTY_PRINT);

		}else{
			//Session::put('temp_ccmail_data', $_POST); // flash : 다음번 요청에서만 사용하기. <> put
			//Session::put('return_url', Request::url());

			return redirect()->to('/auth/login'); //->with('temp_ccmail_data', $_POST); //with는 Session::flash인듯. 다음번 요청에서만 사용.
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
		UserRequest::destroy($id);
		/*$work = $this->ccmail->findOrFail($id);
		$work->destroy($id);*/
		return $this->index();
		//return redirect()->route('dashboard.products.index')->with('alert-danger', 'Product successfully deleted.');

	}

}
