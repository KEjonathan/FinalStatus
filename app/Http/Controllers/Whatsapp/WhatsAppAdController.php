<?php

namespace App\Http\Controllers\Whatsapp;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use App\Models\Subscription;
use Illuminate\Http\Request;

class WhatsAppAdController extends Controller
{

    public function showAds()
    {
        $user = auth()->user();

        // Check if the user has an active subscription with status 'paid'
        $subscription = Subscription::where('user_id', $user->id)
            ->where('status', 'paid') // Ensure the subscription is paid
            ->whereDate('subscribed_at', '>=', now()->subMonth()) // Assuming subscriptions are valid for one month
            ->first(); // Fetch the subscription

        if (!$subscription) {
            return redirect()->route('packages.index')
                ->with('error', 'Sorry, only users with an active subscription package have access to WhatsApp ads. Kindly purchase the package to have access.');
        }

        // Fetch all ads if subscription is active and paid
        $ads = Ad::all();
        return view('admin.whatsapp.index', compact('ads'));
    }


    public function create()
    {
        return view('admin.whatsapp.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Store the image in the public/images folder
        $imagePath = $request->file('image')->store('images/whatsapp_ads', 'public');

        Ad::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.whatsapp.create')->with('success', 'WhatsApp Ad added successfully!');
    }
}
