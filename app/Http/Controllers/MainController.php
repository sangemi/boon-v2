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
        /*메일 보내는 방법
        $data['message'] = '김수로님';
        Mail::send('emails.welcome', $data, function($message)
        {
            $message->to('sangemi@daum.net', 'John Smith')->subject('[분쟁제로] 사이트 이용방법');
        });*/
        return view('boon.site.main-v1');

        if(Auth::user()){
            //return Redirect::to('/site/main-v1');
        }else{
            return view('boon.site.main-v1');

        }


    }

}
