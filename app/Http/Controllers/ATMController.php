<?php
namespace App\Http\Controllers;

use App\Models\TransactionHistory;
use App\Models\UserProfile;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ATMController extends Controller
{
    public function showLoginPage()
    {
        return view('website/home');
    }
    public function showDashboard()
    {
        $data = array();
        $point = UserProfile::where('user_id', '=', Auth::user()->id)->first();
        $data = ['point' => $point->point];
        return view('website/dashbord', compact('data'));
    }

    public function showWithdraw()
    {
        // Deduct amount and save transaction
        $data = array();
        $point = UserProfile::where('user_id', '=', Auth::user()->id)->first();
        $data = ['point' => $point->point];
        return view('website/withdraw', compact('data'));

    }

    public function withdrawn(Request $req)
    {
        // Deduct amount and save transaction
        $id = UserProfile::where('user_id', '=', Auth::user()->id)->first();
        if ($id) {
            if ($req->withdraw < $id->point) {
                $withdrwa = $id->point - $req->withdraw;
                TransactionHistory::create([
                    'user_id' => Auth::user()->id,
                    'point' => $req->withdraw,
                    'inOrOut' => 'out',
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString(),
                ]);
                $point = UserProfile::where('user_id', Auth::user()->id)->update(['point' => $withdrwa]);
                return redirect('/dashboard');
            } else {
                return redirect('withdraw');
            }
        } else {
            return back()->with('fail', 'This pin is not registered');
        }
    }

    public function showDeposit()
    {
        $data = array();
        $point = UserProfile::where('user_id', '=', Auth::user()->id)->first();
        $data = ['point' => $point->point];
        return view('website/deposit', compact('data'));
    }

    public function deposited(Request $req)
    {
        // Deduct amount and save transaction
        $id = UserProfile::where('user_id', '=', Auth::user()->id)->first();
        if ($id) {
            if ($req->Deposit > 0) {
                $withdrwa = $id->point + $req->Deposit;
                TransactionHistory::create([
                    'user_id' => Auth::user()->id,
                    'point' => $req->Deposit,
                    'inOrOut' => 'in',
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString(),
                ]);
                $point = UserProfile::where('user_id', Auth::user()->id)->update(['point' => $withdrwa]);
                return redirect('/dashboard');
            } else {
                return redirect('Deposit');
            }
        } else {
            return back()->with('fail', 'This pin is not registered');
        }
    }

    public function viewHistory()
    {
        $transactions = TransactionHistory::all();
        return view('website/transactions')->with('transactions', $transactions);
    }
}
