<?php

namespace App\Http\Controllers;

use App\Lib\skHelper;
use App\WaveClient;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class WaveMainController extends Controller
{
    public function index()
    {


        return view('boon.site.wave');

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
            return view('boon.site.wave');
        }


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
        $wave_client = WaveClient::all();
        return view('boon.wave.dashboard', compact('wave_client'));
    }

    public function mypage()
    {
        //$wave_client = WaveClient::where('user_id', Auth::id());
        $wave_client = WaveClient::where('user_id', Auth::id())->get(); //->get() //all() 에는 get()이 포함되어 있음.
        $suit_title = Array();

        foreach($wave_client as $clien){
            $suit_obj = $clien->suit()->first();
            $my_suit[]= $suit_obj;

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
        // 접수된게 있으면 메인 관리페이지,
        if($wave_client->count())
            return view('boon.wave.mypage', compact('wave_client', 'my_suit', 'my_status'));

        // 없으면 바로 소송접수!
        else
            return redirect('wave/client/create'); //Route::resource('wave/client', 'WaveClientController');
    }
    public function wave() //??
    {
        return view('boon.site.wave');
    }
}
