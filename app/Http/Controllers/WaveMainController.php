<?php

namespace App\Http\Controllers;

use App\Lib\skHelper;
use App\Recommend;
use App\WaveClient;
use App\WaveSuit;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class WaveMainController extends Controller
{
    public function index(Request $request)
    {
        if(isset($request->suit_number)){
            return view('boon.site.wave' . $request->suit_number, compact('request'));
        }else{
            return view('boon.site.wave0', compact('request'));
        }

        /*로그인 상태면 바로 관리화면으로!*/
        if(Auth::user()){
            $wave_client = DB::table ( 'wave_clients' );
            $wave_client = $wave_client -> where (function($query){
                $query  -> where('user_id', Auth::id() );
                    //-> orWhere ( 'content', 'like', '%aa%');
            } );
            $wave_client = $wave_client -> paginate(10);

            return view('boon.wave.mypage', compact('wave_client'));

        }else{
            return view('boon.site.wave0');
        }


    }

    /*추천활동 내역*/
    public function recommendResult(Request $request)
    {
        if(Auth::check()) {
            //$recommend_data = Recommend::where('recommending_id', Auth::user()->id)->where('category', '=', 'wave')->paginate(10); // ->get();
            $recommend_click = DB::table('recommend_users')
                ->where('recommending_id', Auth::user()->id)
                ->where('category', '=', 'wave')->paginate(20);
            $recommend_join = DB::table('recommend_users')
                ->leftJoin('users', 'recommend_users.recommended_id', '=', 'users.id')
                ->select('recommend_users.*', 'users.name', 'users.created_at as user_created_at')
                ->where('recommending_id', Auth::user()->id)
                ->where('recommended_id', '<>', '0')
                ->where('category', '=', 'wave')->paginate(10);
            $recommend_pay = DB::table('recommend_users')
                ->leftJoin('users', 'recommend_users.recommended_id', '=', 'users.id')
                ->select('recommend_users.*', 'users.name')
                ->where('recommending_id', Auth::user()->id)
                ->where('category', '=', 'wave')->paginate(10);

            return view('boon.wave.recommend_result', compact('recommend_click', 'recommend_join', 'recommend_pay'));
        }else{
            return "로그인해주세요";
        }


    }

    /*추천인 링크 Route::get('/wave/{suit_number}/recom/{recommend_id}', 'WaveMainController@recommend');*/
    public function recommendLink(Request $request)
    {
        self::recordRecommend($request);
        if (isset($request->suit_number)) { /*무조건여기*/
            return view('boon.site.wave' . $request->suit_number, compact('request'));
        } else {
            return view('boon.site.wave0');
        }
    }
    /*추천링크 DB 기록*/
    private function recordRecommend($data){

        $recommend_data = new Recommend();
        $recommend_data->category = 'wave';
        $recommend_data->cate_number = $data->suit_number;
        $recommend_data->recommending_id = $data->recommending_id; // 추천한 사람 id
        $recommend_data->recommended_id = 0; // 추천받아 가입한 사람
        $recommend_data->ip_addr = $_SERVER['REMOTE_ADDR'];

        $recommend_data->save();
    }
    /*공익활동 프로보노. 추천현황확인*/
    public function probono(Request $request)
    {
        return view('boon.wave.probono', compact('request'));
    }
    public function tasks(Request $request, $task_name) // ajax 요청들.. // $row_id : client_id
    {
        /*      $('#task').val(data.id);
                $('#task').val(data.task);
                $('#description').val(data.description); */

        if($task_name == 'change-payment') {
            //$task = ['task-title' => '입금처리', 'task-description' => '']; //Task::find($task_id);
            if($request->chk_payment){ //  && $request->amt_payment 입금액은 없을수도 있음.
                $wave_client = WaveClient::find($request->row_id);

                $wave_client->chk_payment = $request->chk_payment; //'입금완료';
                $wave_client->amt_payment = $request->amt_payment;

                $wave_client->save();
                $task["data"] = $wave_client;
                $task["result"] = "success";
            }else{
                $task = array("data"=>"값을 선택해주세요", "result"=>"fail");

            }
        }else if($task_name == 'show-detail-info'){
            $wave_client = WaveClient::find($request->row_id);
            if(count($wave_client)) { //  && $request->amt_payment 입금액은 없을수도 있음.
                $task["data"] = $wave_client;
                $task["result"] = "success";

            }else {
                $task = array("data" => "값을 선택해주세요 2", "result" => "fail");
            }
        }else{
            $task = array("data" => "업무가 없음. SK1 Error", "result" => "fail");
        }


        return response()->json($task); //return Response::json($task); 5.1에서는 이거 쓰지 마. 헬퍼클래스 쓰면 됨.

    }


    public function dashboard()
    {
        if(Auth::check()) {
            $current_id = Auth::user()->id;
            if ($current_id == 1 || $current_id == 294 || $current_id == 300 || $current_id == 16) { // SK 또는 이준호, 곽지영, 김진한
                $wave_client = WaveClient::all();
                return view('boon.wave.dashboard', compact('wave_client'));
            } else {
                return "권한없음. 접속오류";
            }
        }else{
            return redirect()->to('/auth/login');
        }
    }

    public function mypage(Request $request)
    {
        if ( !Auth::check() ) {
            return redirect()->to('/auth/login');
        }

        $wave_suits = WaveSuit::all(); //->get() //all() 에는 get()이 포함되어 있음.
        //$wave_client = WaveClient::where('user_id', Auth::id());
        $wave_client = WaveClient::where('user_id', Auth::id())->get(); //->get() //all() 에는 get()이 포함되어 있음.
        $suit_title = Array();

        foreach($wave_client as $clien){
            $suit_obj = $clien->suit()->first();
            $my_suits[]= $suit_obj;

            $status_obj = $clien->status()->first();
            $my_status[] = $status_obj;
            /*if(count($status_obj))
                $my_status[]['title'] = $status_obj->title;
            else $my_status[]['title'] = "배정전";*/


            /*  echo $phone->user()->first()->email; //사용자의 이메일을 다음처럼 표시하기 보다:
                echo $phone->user->email;  // 보다 짧고 간단하게 표시할 수 있습니다: */
            /* $name = (string) $clien->name; // If a collection is cast to a string, it will be returned as JSON: ㅜ.ㅜ 삽질2시간.
               //echo (string) $clien->suit_id . " - ". $name;*/
        }
//dd($my_status);
        /*그냥 /wave/mypage 이면 메인 상황실로.
        /wave/mypage/suit_id 이면 suit_id 사건에 접수된거 체크하고, 있으면 상황실로/없으면 신청페이지로*/

        if(!isset($request->suit_id)){
            return view('boon.wave.mypage', compact('wave_client', 'my_suits', 'my_status', 'wave_suits'));
        }else if($wave_client->count()) {
            foreach ($wave_client as $wclient) {

                if ($wclient['suit_id'] == $request->suit_id) {
                    return view('boon.wave.mypage', compact('wave_client', 'my_suits', 'my_status', 'wave_suits'));
                }
            }
        }
        // 없으면 바로 소송접수! / 접수된게 있지만 다른소송이면 소송접수
        return redirect('wave/client/create?suit_id='.$request->suit_id); //Route::resource('wave/client', 'WaveClientController');
    }
    public function wave() //??
    {
        return view('boon.site.wave0');
    }
}
