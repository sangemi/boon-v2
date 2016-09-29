<?php

namespace App\Http\Controllers;

use App\Lib\skHelper;
use App\Models\Wave\WaveEventHistory;
use App\Recommend;
use App\User;
use App\UserMemo;
use App\WaveClient;

use App\WaveFile;
use App\WaveSuit;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WaveMainController extends Controller
{
    public function index(Request $request)
    {
        if (isset($request->suit_number)) {
            return view('boon.site.wave' . $request->suit_number, compact('request'));
        } else {
            return view('boon.site.wave0', compact('request'));
        }

    }

    /*추천활동 내역*/
    public function recommendResult(Request $request)
    {
        if (Auth::check()) {
            //$recommend_data = Recommend::where('recommending_id', Auth::user()->id)->where('category', '=', 'wave')->paginate(10); // ->get();
            $recommend_click = DB::table('recommend_users')
                ->where('recommending_id', Auth::user()->id)
                ->where('category', '=', 'wave')->paginate(20);
            $recommend_join = DB::table('recommend_users')
                ->leftJoin('users', 'recommend_users.recommended_id', '=', 'users.id')
                ->select('recommend_users.*', 'users.name', 'users.created_at as user_created_at')
                ->where('recommending_id', Auth::user()->id)
                ->where('recommended_id', '<>', '0')
                ->where('category', '=', 'wave')->get();
            $recommend_pay = DB::table('recommend_users')
                ->leftJoin('users', 'recommend_users.recommended_id', '=', 'users.id')
                ->leftJoin('wave_clients', 'recommend_users.recommended_id', '=', 'wave_clients.user_id')
                ->select('recommend_users.*', 'users.name', 'wave_clients.chk_payment')
                ->where('recommending_id', Auth::user()->id)
                ->where('recommended_id', '<>', '0')
                ->where('category', '=', 'wave')->get();

            return view('boon.wave.recommend_result', compact('recommend_click', 'recommend_join', 'recommend_pay'));
        } else {
            return redirect()->to('/auth/login'); //로그인
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
    private function recordRecommend($data)
    {

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

    /*필요 서류 자동완성기*/
    public function papers(Request $request, $paper_name, $paper_number)
    {
        if (Auth::check()) {
            if ($paper_name == 'clientlist') {
                $wave_suit = WaveSuit::find($paper_number);
                $wave_client = WaveClient::where('suit_id', $paper_number)->where('chk_payment', '입금완료')->get(); //->paginate(500)

                return view('boon.wave.paper_client', compact('wave_client', 'wave_suit', 'request'));
            }
        }
    }
    public function tasks(Request $request, $task_name) // ajax 요청들.. // $row_id : client_id
    {
        /*      $('#task').val(data.id);
                $('#task').val(data.task);
                $('#description').val(data.description); */

        /*                 여기서 어드민체크!!!!!!!!!!!!!!!!!!!!!!!!!                                     */
        if ( !Auth::check() ) { $task = array("data" => "값을 선택해주세요 2", "result" => "fail"); return response()->json($task); }

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
                $uploaded_files = WaveFile::where('client_id', $wave_client['id'])->orderBy('title_no', 'asc')->get();
                $user_info = User::find($wave_client['user_id']);

                $task["data"] = $wave_client;
                $task["file"] = $uploaded_files;
                $task["user"] = $user_info;
                $task["result"] = "success";

            }else {
                $task = array("data" => "값을 선택해주세요 2", "result" => "fail");
            }

        }else if($task_name == 'save-event-result'){

            if(!$request->event_title) return array("result" => '제목 입력해주세요');

            $event_history = new WaveEventHistory();
            $event_history->title = $request->event_title;
            $event_history->explain = $request->event_explain;
            $event_history->start_client_id = "0";
            $event_history->end_client_id = "1000";
            $event_history->client_id_list = $request->selected_ids;
            $saved = $event_history->save();

            $selected_ids_arr = explode(",", $request->selected_ids);
            /*     여러개의 이벤트도 포함할 수 있도록
            DB::table('wave_clients')->whereIn('id', $selected_ids_arr )->update(['event_result' => 'event_result' . ','. $event_history->id]);
            event_result = '1, 4, 6' 식으로 여러개의 이벤트도 포함할 수 있도록 하고 싶음. 근데 쿼리빌더 모르겠네. raw builder로 해야하나.
            */
            DB::table('wave_clients')->whereIn('id', $selected_ids_arr )->update(['event_result' => $event_history->id]);

            if($saved) return array("result" => 'success');
            else  return array("result" => 'fail');

        }else{
            $task = array("data" => "업무가 없음. SK1 Error", "result" => "fail");
        }


        return response()->json($task); //return Response::json($task); 5.1에서는 이거 쓰지 마. 헬퍼클래스 쓰면 됨.

    }

    /*어드민관리*/
    public function dashboard(Request $request)
    {
        if(!Auth::check()) return redirect()->to('/auth/login');

        $current_id = Auth::user()->id;

        if ($current_id == 1 || $current_id == 231 || $current_id == 294 || $current_id == 300 || $current_id == 16) { // SK 또는 이준호, 곽지영, 김진한
            if(isset($request->suit_id)){
                $wave_client = WaveClient::where('suit_id', $request->suit_id)->get(); //->paginate(500)
                return view('boon.wave.dashboard', compact('wave_client', 'request'));
            }else{
                $wave_client = WaveClient::paginate(500); //all()
                return view('boon.wave.dashboard', compact('wave_client', 'request'));
            }
        } else {

            return "권한없음. 접속오류 : ". $current_id. " <a href='/auth/logout'>로그아웃</a>";

        }

    }

    /* event */
    public function event(Request $request)
    {
        if(!Auth::check()) return redirect()->to('/auth/login');

        // 이벤트 당첨할때
        //$wave_client = WaveClient::where('suit_id', $request->suit_id)->where('chk_payment', '입금완료')->orderby('id', 'asc')->take(1000)->get(); // skip(1000)->take(1000)

        // 이벤트 확인할때
        $event_number = 2;
        $wave_client = WaveClient::where('suit_id', $request->suit_id)->where('event_result', $event_number)->orderby('id', 'asc')->take(1000)->get();

        return view('boon.wave.admin_event', compact('wave_client','request') );
    }

    /*/wave/mypage/client_id 이면 상세 접수내용. */
    private function mypageEach(Request $request)
    {
        if ( !Auth::check() ) { return redirect()->to('/auth/login'); }

        $wave_client = WaveClient::find($request->client_id);

        /*forum 정보 읽어오기. 하드코딩ㅜ.ㅜ*/
        $wave_suit = $wave_client->suit()->first();
        $category_id = $wave_client->suit()->first()->forum_category_id; // wave_suits T에 공지 forum 번호

        $forum_threads = DB::table('forum_threads')->where('category_id', $category_id)->paginate(20); //get();
        // 인터파크 //$category = route("forum.api.category.fetch", $request->route('category'));

        $uploaded_files = WaveFile::where('client_id', $request->client_id)->orderBy('title_no', 'asc')->get();

        $wave_status = $wave_client->status()->first();

        return view('boon.wave.mypage_each', compact('wave_client', 'wave_suit', 'wave_status', 'forum_threads', 'uploaded_files'));
    }

    /*그냥 /wave/mypage 이면 메인 상황실.*/
    private function mypageAll()
    {
        if ( !Auth::check() ) { return redirect()->to('/auth/login'); }
        $wave_suits = WaveSuit::all();

        $wave_client = WaveClient::where('user_id', Auth::id())->get(); //->get() //all() 에는 get()이 포함되어 있음.
        $my_suits = Array();
        foreach($wave_client as $clien){
            $suit_obj = $clien->suit()->first();
            $my_suits[]= $suit_obj;

            $status_obj = $clien->status()->first();
            $my_status[] = $status_obj;
            /*if(count($status_obj))
                $my_status[]['title'] = $status_obj->title;
            else $my_status[]['title'] = "배정전";*/
        }

        /*forum 정보 읽어오기. 하드코딩ㅜ.ㅜ*/
        $category_id = 7; // 응원게시판
        $forum_threads = DB::table('forum_threads')->where('category_id', $category_id)->orderby('id', 'desc')->limit(10)->get(); // 인터파크 //$category = route("forum.api.category.fetch", $request->route('category'));

        return view('boon.wave.mypage_all', compact('wave_client', 'my_suits', 'my_status', 'wave_suits', 'forum_threads'));

    }

    public function mypage(Request $request)
    {
        if ( !Auth::check() ) { return redirect()->to('/auth/login'); }

        /*먼저 접수되어 있는 것 확인 > 하나도 접수X면 바로 접수페이지로*/
        $wave_client = WaveClient::where('user_id', Auth::id())->get();
        if(count($wave_client)){
            if(isset($request->client_id)){
                // 자기 소송인것 확인해야함.
                $wave_client_this = WaveClient::find($request->client_id);
                if($wave_client_this['user_id'] == Auth::user()->id)
                    return $this->mypageEach($request);
                else return "잘못된 접근입니다. SK45810";
            }else{
                return $this->mypageAll();
            }
        }else{
            // 없으면 바로 소송접수!
            return redirect('wave/client/create?suit_id='.$request->suit_id); //Route::resource('wave/client', 'WaveClientController');
        }

    }
    public function mypage_del(Request $request)
    {
        if ( !Auth::check() ) { return redirect()->to('/auth/login'); }
        $wave_suits = WaveSuit::all(); //->get() //all() 에는 get()이 포함되어 있음.

        /*그냥 /wave/mypage 이면 메인 상황실.*/
        if(!isset($request->suit_id)){
            $wave_client = WaveClient::where('user_id', Auth::id())->get(); //->get() //all() 에는 get()이 포함되어 있음.
            $my_suits = Array();
            foreach($wave_client as $clien){
                $suit_obj = $clien->suit()->first();
                $my_suits[]= $suit_obj;

                $status_obj = $clien->status()->first();
                $my_status[] = $status_obj;
                /*if(count($status_obj))
                    $my_status[]['title'] = $status_obj->title;
                else $my_status[]['title'] = "배정전";*/
            }

            /*forum 정보 읽어오기. 하드코딩ㅜ.ㅜ*/
            $category_id = 7; // 응원게시판
            $forum_threads = DB::table('forum_threads')->where('category_id', $category_id)->orderby('id', 'desc')->get(); // 인터파크 //$category = route("forum.api.category.fetch", $request->route('category'));

            return view('boon.wave.mypage_all', compact('wave_client', 'my_suits', 'my_status', 'wave_suits', 'forum_threads'));

        /*/wave/mypage/suit_id 이면 suit_id 사건에 접수된거 확인하고, 있으면 상황실로/없으면 신청페이지로*/
        }else{
            $wave_client = WaveClient::where('user_id', Auth::id())->where('suit_id', $request->suit_id)->get();
            $my_suits = Array();
            foreach($wave_client as $clien){
                $suit_obj = $clien->suit()->first();
                $my_suits[]= $suit_obj;

                $status_obj = $clien->status()->first();
                $my_status[] = $status_obj;
            }
            if($wave_client->count()) {
                /*한 집단소송에 신청 2명일수도 있으니까

                이게 아니라, 하나만 나오네 지금............ 그냥
                mypage/{client_id} 이렇게 넘거야겠다.



                */
                foreach ($wave_client as $wclient) {
                    if ($wclient['suit_id'] == $request->suit_id) { /*suit_id 사건에 접수된게 있음*/

                        /*forum 정보 읽어오기. 하드코딩ㅜ.ㅜ*/
                        $category_id = $wclient->suit()->first()->forum_category_id; // wave_suits T에 forum 정보 저장.
                        $forum_threads = DB::table('forum_threads')->where('category_id', $category_id)->get(); // 인터파크 //$category = route("forum.api.category.fetch", $request->route('category'));

                        $uploaded_files = WaveFile::where('client_id', $wclient['id'])->orderBy('title_no', 'asc')->get();

                        return view('boon.wave.mypage_each', compact('wave_client', 'my_suits', 'my_status', 'wave_suits', 'forum_threads', 'uploaded_files'));
                    }
                }
            }
        }
        // 없으면 바로 소송접수! / 접수된게 있지만 다른소송이면 소송접수
        return redirect('wave/client/create?suit_id='.$request->suit_id); //Route::resource('wave/client', 'WaveClientController');
    }

    /*  echo $phone->user()->first()->email; //사용자의 이메일을 다음처럼 표시하기 보다:
    echo $phone->user->email;  // 보다 짧고 간단하게 표시할 수 있습니다: */
    /* $name = (string) $clien->name; // If a collection is cast to a string, it will be returned as JSON: ㅜ.ㅜ 삽질2시간.
       //echo (string) $clien->suit_id . " - ". $name;*/

    public function wave() //??
    {
        return view('boon.site.wave0');
    }
}
