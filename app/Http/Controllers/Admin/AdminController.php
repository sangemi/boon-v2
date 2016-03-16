<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function index()
    {
        /*if(Auth::user()){
            //return Redirect::to('/site/ccmail');
        }else{
            return view('boon.site.ccmail');

        }*/
        return view('boon.admin.index');
    }
}
