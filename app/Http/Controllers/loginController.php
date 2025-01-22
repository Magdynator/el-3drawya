<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User;
use Kreait\Firebase\Contract\Database;


class loginController extends Controller
{
    public function __construct(Database $database)
    {
        $this->database = $database;

    } 
    
    public function user(Request $req)
    {
        $req->validate([
            'pin'=>'required|max:6',
        ]);
        // $emaildetails = User::where('pin', '=', $req->pin)->first();
        $input = $req->input('pint');
        $emaildetails= $this->database->getReference("users/{$input}")->getValue();
        if($emaildetails){
            Auth::login($emaildetails);
            return redirect()->intended('dashboard');
            
         } else {
             return back()->with('fail','This pin is not registered');
         }
    }
    public function admin(Request $req) {
        $req->validate([
            'pin'=>'required|max:6',
        ]);
        $emaildetails = User::where('pin', '=', $req->pin)->first();
        if($emaildetails){    
        if($req->pin == $emaildetails->pin){
            if ($emaildetails->user_role == 'admin'){
                Auth::login($emaildetails);
                return redirect('/admindashboard');
        }else{
             return redirect('/');
        }
    }else {
        return redirect('/');
 
    }

    } else {
        return back()->with('fail','This pin is not registered');
    }
       
    }
}
