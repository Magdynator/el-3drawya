<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserProfile;
use Kreait\Firebase\Contract\Database;

class userController extends Controller
{
    public function __construct(Database $database)
    {
        $this->database = $database;
    }
    public function portfolio($gender, $pin)
    {
        $portfolio = $this->database->getReference("users/{$gender}/{$pin}")->getValue();   
        return view('website/user/portfolio', compact('portfolio'));
    }    
    public function scanBarcode(Request $req) {
        $barcode = $req->input('barcode');
        $user = UserProfile::where('barcode', $barcode )-> first();
        if (!$user){
            return response()->jason(['message'=> 'User not found']);
        }
        $user-> point += 10 ;
        $user-> save();
        return response()->jason(['message'=> 'Points added succssefully' , 'user' => $user-> first_name]);
    } 
}
