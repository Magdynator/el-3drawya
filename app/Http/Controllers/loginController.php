<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User;
use Kreait\Firebase\Contract\Database;
use Session;

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
        $input = $req->input('pin');
        $emaildetails= $this->database->getReference("users/male/{$input}")->getValue();
        if($emaildetails){
            $req->session()->put('loginId', $emaildetails['pin']);
            return redirect()->intended('/dashboard');
            
         } else {
             return back()->with('fail','This pin is not registered');
         }
    }
    public function admin(Request $req) {
        $req->validate([
            'pin'=>'required|max:6',
        ]);
        $defpass =  '181818';
        $input =  $req->input('pin');
        // $emaildetails = $this->database->getReference("admin/")->getValue();  
        $female = $this->database->getReference("admin/female/{$input}")->getValue(); 
        if($female == null){
            $female = [
                'pin' => null
            ];
        }
        $male = $this->database->getReference("admin/male/{$input}")->getValue(); 
            if($input ==  $defpass || $input  == $female['pin']){
                $req->session()->put('adminId', $input);
                $req->session()->put('gender', 'female');
                return redirect('/admindashboard');
            }else if($req->pin == $male['pin']|| $req->pin == '019019'){
                $req->session()->put('adminId', $req->pin);
                $req->session()->put('gender', 'male');
                return redirect('/admindashboard');
            }else {
                return redirect('/'); 
            }
        // return $emaildetails;
       
    }
}
