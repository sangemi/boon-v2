<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class MainController extends Controller
{
    public function index()
    {
        /*if(Auth::user()){
            //return Redirect::to('/site/ccmail');
        }else{
            return view('boon.site.ccmail');

        }*/
        return view('boon.site.wave');
        return view('boon.site.ccmail'); // 잠시 안씀. 지급명령 등 나오면 통합 페이지를 열것.
    }
    public function ccmail()
    {
        return view('boon.site.ccmail');
    }
}
