<?php

namespace App\Http\Controllers\Withdraw;

use App\Http\Controllers\Controller;
use App\Models\Withdraw;

class WithdrawController extends Controller
{
    public function index()
    {
        $withdrawals = Withdraw::with('user')->get();
        return view('dashboard.withdraws.withdraw', compact('withdrawals'));
    }

    public function approve($id)
    {
        $withdrawal = Withdraw::findOrFail($id);
        $withdrawal->status = 'approved';
        $withdrawal->save();

        return redirect()->route('withdrawals.index')->with('success', 'Withdrawal approved!');
    }

    public function reject($id)
    {
        $withdrawal = Withdraw::findOrFail($id);
        $withdrawal->status = 'rejected';
        $withdrawal->save();

        return redirect()->route('withdrawals.index')->with('success', 'Withdrawal rejected!');
    }
}
