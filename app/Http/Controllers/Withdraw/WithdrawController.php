<?php

namespace App\Http\Controllers\Withdraw;

use App\Http\Controllers\Controller;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function create()
    {
        $user = auth()->user();

        // Check if the user has a premium subscription with status 'paid'
        $hasPremiumSubscription = $user->subscriptions()
            ->where('package_id', function($query) {
                $query->select('id')
                    ->from('packages')
                    ->where('type', 'premium');
            })
            ->where('status', 'paid')
            ->exists();

        if (!$hasPremiumSubscription) {
            return redirect()->route('packages.index')->with('error', 'Only users with a Premium Package and an active paid subscription can make a withdrawal request.');
        }

        return view('dashboard.withdraws.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'screenshot' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle file upload
        if ($request->hasFile('screenshot')) {
            $screenshotPath = $request->file('screenshot')->store('withdrawal_screenshots', 'public');
        }

        // Save the withdrawal request
        Withdraw::create([
            'user_id' => Auth::id(),
            'screenshot' => $screenshotPath,
            'status' => 'pending',
        ]);

        return redirect()->route('admin.admin.withdrawals.index')->with('success', 'Withdrawal request submitted successfully!');
    }
}
