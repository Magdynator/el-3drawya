<?php

namespace App\Http\Controllers;

use App\Models\TransactionHistory;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Kreait\Firebase\Contract\Database;

class adminController extends Controller
{
    public function __construct(Database $database)
    {
        $this->database = $database;
    }
    public function adminlogin()
    {
        return view('website/adminlogin');
    }
    public function showAdminDashboard()
    {
        $gender = UserProfile::where("user_id", Auth::user()->id)->first();
        $count = UserProfile::where('gender', $gender->gender)->count();
        $transactionHistory = TransactionHistory::all()->count();
        $users = UserProfile::where('gender', $gender->gender)->get();
        $adminName = $gender->first_name;
        return view('website/admindashboard', compact('count', 'users', 'adminName', 'transactionHistory'));
    }
    public function users()
    {
        $gender = UserProfile::where("user_id", Auth::user()->id)->first();
        $users = UserProfile::where('gender', $gender->gender)->get();
        return view('website/adminsearchpage', compact('users'));
    }
    public function addUser()
    {
        return view('website/addUser');
    }
    public function reg(Request $req)
    {
        $req->validate([
            'pin' => 'required|min:6,max:6',
        ]);
        $image = $req->file('profile_picture');
        $extention = $image->getClientOriginalExtension();
        $fileName = time() . '.' . $extention;
        $image->move('uploads/users/', $fileName);
        $postData = [
            'pin' => $req->pin,
            'user_role' => $req->role,
            'personal_id' => $req->personal_id,
            'first_name' => $req->first_name,
            'last_name' => $req->last_name,
            'gender' => $req->gender,
            'barcode' => $req->barcode,
            'qrcode' => $req->qrcode,
            'point' => $req->points,
            'date_of_birth' => $req->dob,
            'bio' => $req->bio,
            'profile_picture' => $fileName,
            'phone_number' => $req->Phonenumber,
            'address' => $req->address,
        ];
        if ($req->gender == 'male') {
            $postRef = $this->database->getReference('users/male/' . $req->pin);
            $postRef->set($postData);
        } else {
            $postRef = $this->database->getReference('users/female/' . $req->pin);
            $postRef->set($postData);
        }
        /*
        $user = new User;
        $user-> pin = $req-> pin;
        $user -> user_role = $req->role;
        $user-> save();
        $profile = new UserProfile;
        $profile -> user_id = $user -> id;
        $profile -> personal_id = $req-> personal_id;
        $profile ->first_name = $req-> first_name;
        $profile ->last_name = $req->last_name;
        $profile ->gender = $req->gender;
        $profile ->barcode = $req->barcode;
        $profile ->qrcode = $req->qrcode;
        $profile ->point = $req->points;
        $profile ->date_of_birth = $req->dob;
        $profile ->bio = $req->bio;
        $image = $req->file('profile_picture');
        $extention = $image->getClientOriginalExtension();
        $fileName= time().'.'.$extention;
        $image->move('uploads/users/', $fileName);
        $profile ->profile_picture = $fileName;
        $profile ->phone_number = $req->Phonenumber;
        $profile ->address = $req->address;
        $profile -> save();
         */
        return redirect('/addUser');
    }

}
