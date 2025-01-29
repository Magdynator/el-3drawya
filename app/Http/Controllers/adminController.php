<?php

namespace App\Http\Controllers;

use App\Models\TransactionHistory;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Kreait\Firebase\Contract\Database;
use Session;
use Carbon\Carbon;


class adminController extends Controller
{
    public function __construct(Database $database)
    {
        $this->database = $database;
    }
    public function adminlogin()
    {
        return view('website/admin/adminlogin');
    }
    public function showAdminDashboard()
    {
        $input = Session::get('adminId');
        $gender = Session::get('gender');
        $data = $this->database->getReference("admin/{$gender}/{$input}")->getValue();
        if ($data) {
            $male = $this->database->getReference("users/{$gender}/")->getValue();
            $count = count($male);
            $transactionHistory = $this->database->getReference("transactionHistory/total")->getValue();
        
        $users = $this->database->getReference("users/{$gender}")->getValue();
        $preparedTransactions = [];
        foreach ($users as $key => $user) {
            $user['age'] = isset($user['date_of_birth'])
                ? Carbon::parse($user['date_of_birth'])->age
                : 'N/A';
            $preparedTransactions[$key] = $user;
        }
        $adminName = $data['first_name'];
        return view('website/admin/admindashboard', compact('count', 'preparedTransactions', 'adminName', 'transactionHistory'));
    } else if ($data == null){
        $count = 0;
        $transactionHistory  = 0;
        $adminName = 'Guest';
        $preparedTransactions = [];
        return view('website/admin/admindashboard', compact('count', 'preparedTransactions', 'adminName', 'transactionHistory'));
    }
}
    public function users()
    {
        $gender = Session::get('gender');
        $users = $this->database->getReference("users/{$gender}/")->getValue();
        return view('website/admin/adminsearchpage', compact('users'));
    }
    public function addUser()
    {
        return view('website/admin/addUser');
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
        if ($req->gender == 'male' && $req->role == 'admin') {
            $postRef = $this->database->getReference('admin/male/' . $req->pin);
            $postRef->set($postData);
        } else if($req->gender == 'male' && $req->role == 'user') {
            $postRef = $this->database->getReference('users/male/' . $req->pin);
            $postRef->set($postData);
        } if ($req->gender == 'female' && $req->role == 'admin'){
            $postRef = $this->database->getReference('admin/female/' . $req->pin);
            $postRef->set($postData);
        } else if($req->gender == 'female' && $req->role == 'user'){
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
