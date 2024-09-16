<?php

namespace App\Http\Controllers\subscriptions;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Illuminate\Http\Request;

class AdminSubscriptionController extends Controller
{
    public function index()
    {
        // Fetch all subscriptions with their related user and package
        $subscriptions = Subscription::with('user', 'package')->get();
        return view('admin.subscriptions.index', compact('subscriptions'));
    }

    public function approve(Request $request, Subscription $subscription)
    {
        // Update subscription status to 'paid'
        $subscription->update(['status' => 'paid']);

        // Redirect back with success message
        return redirect()->route('admin.admin.subscriptions')->with('success', 'Subscription approved successfully!');
    }
}
