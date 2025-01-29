<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
class logoutController extends Controller
{
    public function logout(Request $request) {
     
        if(Session::has("adminId")){
            Session::pull("adminId");
            Session::pull('gender');
            return redirect('/');
        } else if(Session::has("loginId")){
            Session::pull("loginId");
            return redirect('/');

        }
    
    }
}
