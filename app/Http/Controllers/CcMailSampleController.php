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
		$ccMailsCate1s = DB::table('ccmail_samples')
			-> select(DB::raw('id, sum(used_cnt) as usedsum, cate1, count(*) as cnt'))
			-> groupBy('cate1')
			-> orderBy('usedsum', 'desc') -> get();
		$ccMailsCate2s = DB::table('ccmail_samples')
			-> select(DB::raw('id, sum(used_cnt) as usedsum, cate2, count(*) as cnt'))
			-> where('cate1', Request::input('cate1'))
			-> groupBy('cate1','cate2')
			-> orderBy('usedsum', 'desc') -> get();

		$ccMails = DB::table ( 'ccmail_samples' );
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
	public function create($id = null)
	{
		if( empty($id) ){
			$ccMail = new CcMailSample(); /*빈 모델. 첨부터 직접 작성*/
		}else{
			// /ccmail/sample/create/307 형식일때 샘플을 불러와서 작성함
			$ccMail = CcMailSample::findOrFail($id);
		}
		return view('boon.ccMail.sample_write', compact('ccMail', 'id'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	protected function validator(array $data)
	{
		return Validator::make($data, [
			'cate1' => 'required|max:255',
			'cate2' => 'max:255',
			'cate3' => 'required|max:255',
			'used_cnt' => 'numeric',
			'create_id' => 'max:255',
			'content' => 'required',
		]); //|email|max:255|unique:users 'password' => 'required|confirmed|min:6',
		// receiver. 에서 numeric|alpha 숫자+하이픈만 어떻게 하는지 모르겠네.....
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
			$task = new CcMailSample();
			$data = Request::all();

			$task->cate1 = $data['cate1'];
			$task->cate2 = $data['cate2'];
			$task->cate3 = $data['cate3'];
			$task->content = $data['content'];
			$task->create_id= Auth::id();

			$ret = $task->save();
			if($ret) Session::flash('message', '입력되었습니다.');
			else  Session::flash('message', '오류가 발생하였습니다. SK1083');
			return redirect()->to('/ccmail/sample/'.$task->id );

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
		$ccMail = CcMailSample::find($id);
		return view('boon.ccMail.sample_edit', compact('ccMail', 'id'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		if ( !Auth::check() ) { // 샘플은 누구나 볼수 있으니, 수정시 권한 체크


			// 권한 관리해야함. 지금은 로그인체크만 하는 상태..

			return redirect()->to('/auth/login'); //->with('temp_ccmail_data', $_POST); //with는 Session::flash인듯. 다음번 요청에서만 사용.
		}

		$validator = $this->validator(Request::all());
		if ($validator->fails()) {

			Session::flash('message', '입력값을 확인해주세요.');

			return Redirect::back()
				->withErrors($validator)
				->withInput(Request::except('password'));

		} else {

			/*이건 프로퍼티 방식이라고 함. 배열방식은 select없이 바로 update하는데, 보안때문에 모델에 fillable 지정해야.*/
			$task = CcMailSample::find($id);
			$data = Request::all();

			$task->cate1 = $data['cate1'];
			$task->cate2 = $data['cate2'];
			$task->cate3 = $data['cate3'];
			$task->content = $data['content'];

			$ret = $task->save();
			if($ret) Session::flash('message', '수정되었습니다.');
			else  Session::flash('message', '저장시 오류가 발생하였습니다.');
			return redirect()->to('/ccmail/sample/'.$task->id);
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
		//
	}

}
