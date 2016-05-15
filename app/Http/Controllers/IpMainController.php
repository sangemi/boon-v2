<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class IpMainController extends Controller
{
    public function index()
    {
        return view('boon.site.ip');

        /*로그인 상태면 바로 관리화면으로!*/
        if(Auth::user()){
            $ccMailsCate1s = DB::table('ccmail_samples')
                -> select(DB::raw('id, sum(used_cnt) as usedsum, cate1, count(*) as cnt'))
                -> groupBy('cate1')
                -> orderBy('usedsum', 'desc') -> get();
            $ccMails = DB::table ( 'ccmail_samples' );
            $ccMails = $ccMails -> where (function($query){
                $query  -> where('cate3', 'like', '%aa%')
                    -> orWhere ( 'content', 'like', '%aa%');
            } );
            $ccMails = $ccMails -> paginate(10);

            return view('boon.ip.dashboard', compact('ccMails', 'ccMailsCate1s'));

        }else{
            return view('boon.site.ip');
        }


    }
    public function ccmail()
    {
        return view('boon.site.ccmail');
    }
}
