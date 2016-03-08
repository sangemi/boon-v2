<?php namespace App\Http\Controllers;

use App\CcMailSample;
use App\Http\Requests;

use Guzzle\Plugin\Cookie\Cookie;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class CcMailSampleController extends Controller {

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

		//$ccMails = CcMail::paginate(5);
		$ccMailsCate1s = DB::table('ccmails_sample')
			-> select(DB::raw('id, sum(used_cnt) as usedsum, cate1, count(*) as cnt'))
			-> groupBy('cate1')
			-> orderBy('usedsum', 'desc') -> get();
		$ccMailsCate2s = DB::table('ccmails_sample')
			-> select(DB::raw('id, sum(used_cnt) as usedsum, cate2, count(*) as cnt'))
			-> where('cate1', Request::input('cate1'))
			-> groupBy('cate1','cate2')
			-> orderBy('usedsum', 'desc') -> get();

		$ccMails = DB::table ( 'ccmails_sample' );
		if(Request::input('cate2')) {
			$ccMails = $ccMails -> where ( 'cate1', Request::input('cate1'))
								-> where ( 'cate2', Request::input('cate2'))
								-> orderBy('created_at', 'desc');
		}else if(Request::input('cate1')){
			$ccMails = $ccMails -> where ( 'cate1', Request::input('cate1'))
								-> orderBy('created_at', 'desc');
		}
		if(Request::input('q')) { //
			$ccMails = $ccMails -> where (function($query){
				$query  -> where('cate3', 'like', '%'.Request::input('q').'%')
						-> orWhere ( 'content', 'like', '%'.Request::input('q').'%');
			} );

		}

		if(!Request::input('cate1') && !Request::input('cate2') && !Request::input('q')){ // 카테고리 둘다 없을 때
			$ccMails = null;

		}else{
			/* sql만들고 마지막에 get 또는 paginate */
			$ccMails = $ccMails -> paginate(10);
		}
		//\SKHelper::p($ccMails);

		return view('boon.ccMail.sample_list', compact('ccMails', 'ccMailsCate1s', 'ccMailsCate2s'));
		//return view('boon.ccMail.list', compact('ccMailstt')); // resources/views/boon/ccMail/sample_list.blade.php 불러옴 //So compact('var1', 'var2') is the same as saying array('var1' => $var1, 'var2' => $var2) as long as $var1 and $var2 are set.
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($id)
	{
		$ccMail = CcMail::find($id);  /*ccmails_sample table에 접속 */
		return view('boon.ccMail.result_write', compact('ccMail', 'id'));

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
			print_r(Request::all());
			$validator = $this->validator(Request::all());
			//dd($validator);
			if ($validator->fails()) {
				Session::flash('message', '입력값 확인 바랍니다.!');
				return Redirect::to('ccmail/write/'.Request::input('sample_id'))
					->withErrors($validator)
					->withInput(Request::except('password'));
			} else {
				$data = Request::all();
				$ccmail = new CcMail('result'); /*ccmails_result table에 접속 */

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
				return redirect()->to('/ccmail/result/'.$ccmail->id);
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
		if( empty($direction) ){
			$ccMail = CcMailSample::find($id);
			if( empty($ccMail) ) abort(404, '자료가 없습니다.');
			return view('boon.ccMail.sample_show', compact('ccMail', 'id'));
		}else if($direction == 'prev'){ //이전버튼
			$id = CcMailSample::where('id', '<', $id)->max('id');
			return redirect()->to('/ccmail/sample'.$id);
		}else if($direction == 'next'){ //다음버튼
			$id = CcMailSample::where('id', '>', $id)->min('id');
			return redirect()->to('/ccmail/sample'.$id);
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
		return view('boon.ccMail.list', compact('ccMails', 'ccMailsCate1s', 'ccMailsCate2s'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		/* apibox SMS */
		$sms['from']	= "02-2135-5251";
		$sms['to']		= "010-4775-0852";
		$sms['message']	= "Test 감사합니다. 몇자까지 될까요?";
		$return = $apibox->sms($sms);

		/*이건 프로퍼티 방식이라고 함. 배열방식은 select없이 바로 update하는데, 보안때문에 모델에 fillable 지정해야.*/
		$task = CcMail::find($id);

		$task->name = '';
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
		//
	}

}
