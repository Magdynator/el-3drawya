<?php
namespace App\Http\Controllers;

use App\Models\TransactionHistory;
use App\Models\UserProfile;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Kreait\Firebase\Contract\Database;
use Session;

class ATMController extends Controller
{
    public function __construct(Database $database)
    {
        $this->database = $database;

    } 
    
    public function showLoginPage()
    {
        return view('website/user/home');
    }
    public function showDashboard()
    {
        $data = array();
        $point = $this->database->getReference("users/male/" . Session::get("loginId"))->getValue(); 
        $data = ['point' => $point['point']];
        return view('website/user/dashbord', compact('data'));
    }

    public function showWithdraw()
    {
        // Deduct amount and save transaction
        $data = array();
        $point = $this->database->getReference("users/male/" . Session::get("loginId"))->getValue(); 
        $data = ['point' => $point['point']];
        return view('website/user/withdraw', compact('data'));

    }

    public function withdrawn(Request $req)
    {
        // Deduct amount and save transaction
        $id = $this->database->getReference("users/male/" . Session::get("loginId"))->getValue(); 
        if ($id) {
            if ($req->withdraw < $id['point']) {
                $withdrwa = $id['point'] - $req->withdraw;
                $transactionHistory = [ 
                    'type'=>'withdraw',
                    'amount'=>$req->withdraw,
                    'timestamp' => Carbon::now()->toDateTimeString(),
                ];
                $ref = $this->database->getReference("users/male/" . Session::get("loginId"));
                $tran = $this->database->getReference("users/male/" . Session::get("loginId")."/transactionHistory");
                $updatedData = [
                'point' => $withdrwa,
                ];
                $currentHistory = $tran->getValue();
                $updatedHistory = $currentHistory ?? [];
                $updatedHistory[] = $transactionHistory;
                $tran->set($updatedHistory);
                $ref->update($updatedData);
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
        $point = $this->database->getReference("users/male/" . Session::get("loginId"))->getValue(); 
        $data = ['point' => $point['point']];
        return view('website/user/deposit', compact('data'));
    }

    public function deposited(Request $req)
    {
        // Deduct amount and save transaction
        $id = $this->database->getReference("users/male/" . Session::get("loginId"))->getValue(); 
        if ($id) {
            if ($req->Deposit > 0) {
                $deposit = $id['point'] + $req->Deposit;
                $transactionHistory = [
                    'type'=>'deposit',
                    'amount'=>$req->Deposit,
                    'timestamp' => Carbon::now()->toDateTimeString(),

                ];

                $ref = $this->database->getReference("users/male/" . Session::get("loginId"));
                $updatedData = [
                 'point' => $deposit,
                 ];
                $tran = $this->database->getReference("users/male/" . Session::get("loginId")."/transactionHistory");
                $currentHistory = $tran->getValue();
                $updatedHistory = $currentHistory ?? [];
                $updatedHistory[] = $transactionHistory;
                $tran->set($updatedHistory);
                $ref->update($updatedData);
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
        $transactions = $this->database->getReference("users/male/" . Session::get("loginId")."/transactionHistory")->getValue();
        $preparedTransactions = [];
        foreach ($transactions as $key => $transaction) {
            $transaction['timestamp_human'] = isset($transaction['timestamp'])
                ? Carbon::parse($transaction['timestamp'])->diffForHumans()
                : 'N/A';
            $preparedTransactions[$key] = $transaction;
        }
        return view('website/user/transactions')->with('transactions', $preparedTransactions);
    }
}


// TransactionHistory::create([
                //     'user_id' => Auth::user()->id,
                //     'point' => $req->Deposit,
                //     'inOrOut' => 'in',
                //     'created_at' => Carbon::now()->toDateTimeString(),
                //     'updated_at' => Carbon::now()->toDateTimeString(),
                // ]);
                // $point = UserProfile::where('user_id', Auth::user()->id)->update(['point' => $withdrwa]);