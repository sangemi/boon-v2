<?php namespace App\Http\Controllers;

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

		$ccMails = CcMailWork::where('create_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(9);
		//$ccMails = DB::table('ccmails_work')->orderBy('id', 'desc')->paginate(9);

		return view('boon.ccMail.work_list', compact('ccMails'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($id)
	{
		// /ccmail/work/create/307 형식일때 샘플을 불러와서 작성함!
		$ccMail = CcMailSample::find($id);  /*ccmails_sample table에 접속 */
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
			'sender_phone' => 'required|numeric',
			'receiver_name' => 'required|max:255',
			'receiver_addr' => 'required|max:255',
			'receiver_phone' => 'max:255',
			'content' => 'required',
		]); //|email|max:255|unique:users 'password' => 'required|confirmed|min:6',
		// receiver. 에서 numeric|alpha 숫자+하이픈만 어떻게 하는지 모르겠네.....
	}
	public function store()
	{

		if (Auth::check()) { // 로그인여부
			print_r(Input::all());
			$validator = $this->validator(Input::all());
			//dd($validator);
			if ($validator->fails()) {
				Session::flash('message', 'Successfully created nerd!');
				return Redirect::to('ccmail/write/'.Input::get('sample_id'))
					->withErrors($validator)
					->withInput(Input::except('password'));
			} else {
				$data = Input::all();
				$ccmail = new CcMailWork();

				$ccmail->sample_id = $data['sample_id'];
				$ccmail->sender_name = $data['sender_name'];
				$ccmail->sender_addr = $data['sender_addr'];
				$ccmail->sender_phone = $data['sender_phone'];

				$ccmail->receiver_name = $data['receiver_name'];
				$ccmail->receiver_addr = $data['receiver_addr'];
				$ccmail->receiver_phone = $data['receiver_phone'];

				$ccmail->content = $data['content'];

				$ret = $ccmail->save();

				Session::flash('message', 'Successfully created nerd!');
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
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id, $direction = null)
	{
		$ccMail = CcMailWork::find($id);
		if( empty($ccMail) ) abort(404, '자료가 없습니다.');

		/*if( $ccMail->status_inner == '접수' || $ccMail->status_inner == '' ){
			return view('boon.ccMail.work_show', compact('ccMail', 'id'));
		}else{

		}*/
		return view('boon.ccMail.work_show', compact('ccMail', 'id'));
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
		/*이건 프로퍼티 방식이라고 함. 배열방식은 select없이 바로 update하는데, 보안때문에 모델에 fillable 지정해야.*/




		/*여기 작업합시다.......*/









		$task = CcMailWork::find($id);

		/*어떤 상품을 선택하였는지? 이렇게 하지 말고... 별도 테이블&모델을 만들까ㅋ*/

		$task->sender_name = '';
		$task->project_id = 1;
		$task->description = 'insert 예제 작성';

		$ret = $task->save();

		return response()->json(['result' => $ret, 'task' => $task],
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
		CcMailWork::destroy($id);
		/*$work = $this->ccmail->findOrFail($id);
		$work->destroy($id);*/
		return $this->index();
		//return redirect()->route('dashboard.products.index')->with('alert-danger', 'Product successfully deleted.');

	}

}
