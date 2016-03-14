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

					'title' => 'max:255',
			'content' => 'required',
		]); //|email|max:255|unique:users 'password' => 'required|confirmed|min:6',
		// receiver. 에서 numeric|alpha 숫자+하이픈만 어떻게 하는지 모르겠네.....
	}

	public function store($fromWhere)
	{

	}


	/**
	 */
	public function show($id, $direction = null)
	{
		// 여기는 안쓰는듯.
		$task = BoonStatus::findOrFail($id);
		if( empty($value) ) abort(404, '자료가 없습니다.');
		else if($task->user_id != Auth::id()) abort(404, '자료를 볼 수 없습니다.'); // 자기것만

		/*if( $userReq->status_inner == '접수' || $userReq->status_inner == '' ){
			return view('boon.ccMail.work_show', compact('ccMail', 'id'));
		}else{

		}*/
		return view('boon.point.show', compact('$task', 'id'));
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

	/**
	 */
	static public function getPoint($user_id = null)
	{
		if (empty($user_id)) $user_id = Auth::id();
		$boonStatus = User::find($user_id)->boonStatus;
		if ($boonStatus->boon_point == $boonStatus->boon_cash + $boonStatus->boon_free){
			//맞음.
		}else{
			//뭔가이상..... 자동update 할까..
		}

		return [
			'point' =>$boonStatus->boon_cash + $boonStatus->boon_free,
			'cash' =>$boonStatus->boon_cash,
			'free'=>$boonStatus->boon_free
		];
	}

	/**
	 */
	static public function usePoint($use_amt, $use_what = null, $user_id = null)
	{
		if (empty($user_id)) $user_id = Auth::id(); //자신하고 관리자만 감할 수 있어야.. 하는데 권한관리 후에 수정하자.

		//$statusUpdate = BoonStatus::where('user_id', Auth::id()); // Builder Obj
		$statusNow = BoonStatus::where('user_id', Auth::id())->get()->first(); // Collection Obj

		$point_sum = $statusNow->boon_cash + $statusNow->boon_free;

		/*if use_what = null 이면, 캐쉬를 우선 사용 -> 이후 포인트 사용*/
		if( !isset($use_what) ){
			if ($use_amt >= $statusNow->boon_cash ) {
				/*use_amt =====================
				  cash    ==========
				  free              ==================*/
				$statusNow->boon_cash = 0; //다씀
				$statusNow->boon_free = $point_sum - $use_amt;
				$statusNow->boon_point = $point_sum - $use_amt;

			}else if($use_amt < $statusNow->boon_cash ) {
				/*use_amt ======
				  cash    ==========
				  free              ==================*/
				$statusNow->boon_cash = $statusNow->boon_cash - $use_amt;
				//$statusUpdate->boon_free = $statusUpdate->boon_free; //안변함
				$statusNow->boon_point = $point_sum - $use_amt;
			}
		}

		$statusNow->save();

		return [
			'point' => $statusNow->boon_cash + $statusNow->boon_free,
			'cash'  => $statusNow->boon_cash,
			'free'  => $statusNow->boon_free
		];
	}

}
