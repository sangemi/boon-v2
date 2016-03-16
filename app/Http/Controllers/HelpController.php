<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class HelpController extends Controller
{
    public function ccmail()
    {
        return view('boon.help.ccmail');
    }
}
