<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        /*if(Auth::user()){
            //return Redirect::to('/site/ccmail');
        }else{
            return view('boon.site.ccmail');

        }*/
        echo Auth::check(). "========이상하네";
        if (Auth::check() && (Auth::user()->name == '김상겸' || Auth::user()->name == '정지혜'
                || Auth::user()->name == '김수로' || Auth::user()->name == '최다현')
        ){

            return view('boon.admin.index');
        }else{
            echo "제한";
        }

    }
}
