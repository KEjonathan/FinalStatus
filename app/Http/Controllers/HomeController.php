<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function showForexBots()
    {
        // Fetch forex bots from the database (example data)
        $forexBots = [
            (object)[
                'title' => 'Bot A',
                'description' => 'An advanced forex trading bot with high accuracy.',
                'price' => '150,000',
                'image_url' => 'https://via.placeholder.com/300',
                'purchase_url' => '/purchase/bot-a'
            ],
            (object)[
                'title' => 'Bot B',
                'description' => 'A reliable forex bot for daily trading.',
                'price' => '200,000',
                'image_url' => 'https://via.placeholder.com/300',
                'purchase_url' => '/purchase/bot-b'
            ],
            (object)[
                'title' => 'Bot C',
                'description' => 'A beginner-friendly forex trading bot.',
                'price' => '100,000',
                'image_url' => 'https://via.placeholder.com/300',
                'purchase_url' => '/purchase/bot-c'
            ]
        ];

        return view('dashboard.bots.bots', ['forexBots' => $forexBots]);
    }

    public function history()
    {
        // Fetch withdrawal history from the database (example data)
        $withdrawals = [
            (object)[
                'transaction_id' => 'TXN123456',
                'amount' => 150000,
                'details'=>'',
                'date' => '2024-09-01',
                'status' => 'completed',
                'id' => 1
            ],
            (object)[
                'transaction_id' => 'TXN654321',
                'amount' => 85000,
                'details'=>'',
                'date' => '2024-09-05',
                'status' => 'pending',
                'id' => 2
            ],
            (object)[
                'transaction_id' => 'TXN789012',
                'amount' => 120000,
                'details'=>'',
                'date' => '2024-09-07',
                'status' => 'failed',
                'id' => 3
            ]
        ];

        return view('dashboard.withdraws.withdraw', ['withdrawals' => $withdrawals]);
    }

    //UG Payments
    public function showPaymentMethods()
    {
        return view('dashboard.payments.pay');
    }

    public function processPayment(Request $request)
    {
        $paymentMethod = $request->input('payment_method');
        $amount = $request->input('amount');

        // Here, you can process the payment accordingly based on the selected method
        // For example, integrating with an API for each payment method

        // Redirect back or to a confirmation page after processing
        return redirect()->back()->with('status', 'Payment processed using ' . $paymentMethod . ' for ' . $amount . ' UGX');
    }

    public function Show_affiliates()
    {
        return view('dashboard.affiliates.affiliates');
    }



}
