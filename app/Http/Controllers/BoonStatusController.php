<?php namespace App\Http\Controllers;

use App\BoonStatus;
use App\Http\Requests;

use App\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;



class BoonStatusController extends Controller {

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
	 */
	public function index()
	{

		//$list = BoonStatus::where('user_id', Auth::user()->id)->get();
		$list = Auth::user()->boonStatus; // array가 아니라 한행이 반환됨. 따라서 foreach불가


		//$ccMails = DB::table('ccmails_order')->orderBy('id', 'desc')->paginate(9);
		return view('boon.point.status', compact('list'));
	}

	/**
	 */
	public function create($id = null)
	{
	}

	/**
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
	public function store($fromWhere)
	{
		//if (Auth::check()) { // 로그인여부는 route에서..
		if ( 1 ) {
			// 은행이체를 누른 경우
			$fromWhere = ($fromWhere)?$fromWhere:'';

			$userReq = new BoonStatus();
			$data = Request::all();

			$userReq->user_id = Auth::user()->id;
			$userReq->model_name = $data['model_name'];
			$userReq->model_id = $data['model_id'];
			$userReq->ask_origin = $data['ask_origin'];

			$worked_paper = \stdClass();
			$worked_paper->sender_name = $data['sender_name'];
			$worked_paper->sender_addr = $data['sender_addr'];
			$worked_paper->sender_phone = $data['sender_phone'];

			$worked_paper->receiver_name = $data['receiver_name'];
			$worked_paper->receiver_addr = $data['receiver_addr'];
			$worked_paper->receiver_phone = $data['receiver_phone'];

			$worked_paper->content = $data['content'];

			$userReq->worked_paper = $this->makePaperHTML('ccmail', $worked_paper);

			$userReq->status_inner = $data['status_inner'];
			$userReq->status_show = $data['status_show'];


			$ret = $userReq->save();

			Session::flash('message', '보관함에 저장되었습니다.');
			return redirect()->to('/ccmail/work/'.$userReq->id);
		}
	}


	/**
	 */
	public function show($id, $direction = null)
	{

		$value = BoonStatus::findOrFail($id);
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
		$value = BoonStatus::find($id);
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
