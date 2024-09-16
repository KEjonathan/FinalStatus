<?php

namespace App\Http\Controllers\packages;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PackageController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $country = $user->country; // Assuming the user's country is stored in 'country' field during registration

        $currencyCode = $this->getCurrencyCode($country);
        $currencySymbol = $this->getCurrencySymbol($currencyCode);

        $packages = Package::all();

        foreach ($packages as $package) {
            // Convert the price to the user's currency
            $package->price = $this->convertCurrency($package->price, 'USD', $currencyCode);
        }

        return view('dashboard.packages.index', compact('packages', 'currencySymbol'));
    }

    public function subscribe(Request $request, $packageId)
    {
        $user = auth()->user();

        // Check if the user is already subscribed
        if (Subscription::where('user_id', $user->id)->where('package_id', $packageId)->exists()) {
            return redirect()->back()->withErrors(['message' => 'You are already subscribed to this package.']);
        }

        // Subscribe the user
        Subscription::create([
            'user_id' => $user->id,
            'package_id' => $packageId,
            'subscribed_at' => now(),
            'status' => 'pending',
        ]);

        return redirect()->route('packages.index')->with('success', 'Subscription successful!');
    }

    public function create()
    {
        return view('dashboard.packages.create');
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'type' => 'required|in:basic,premium',
        ]);

        // Create the package with validated data
        Package::create($validatedData);

        // Redirect with a success message
        return redirect()->route('admin.packages.create')->with('success', 'Package added successfully!');
    }

    // Function to convert currency using ExchangeRate-API
    private function convertCurrency($amount, $fromCurrency, $toCurrency)
    {
        $apiKey = env('EXCHANGE_RATE_API_KEY');  // Ensure you've added your API key to the .env file

        // Make a request to the ExchangeRate-API to get conversion rates
        $response = Http::get("https://v6.exchangerate-api.com/v6/{$apiKey}/pair/{$fromCurrency}/{$toCurrency}");

        if ($response->successful()) {
            $rate = $response->json()['conversion_rate'];
            return $amount * $rate;
        }

        // If the API fails, return the original amount (in USD)
        return $amount;
    }

    // Function to get the currency code based on the user's country
    private function getCurrencyCode($country)
    {
        $countryToCurrencyMap = [
            'Uganda' => 'UGX',         // Ugandan Shilling
            'Kenya' => 'KES',          // Kenyan Shilling
            'Tanzania' => 'TZS',       // Tanzanian Shilling
            'Rwanda' => 'RWF',         // Rwandan Franc
            'Burundi' => 'BIF',        // Burundian Franc
            'South Sudan' => 'SSP',    // South Sudanese Pound
            'Ethiopia' => 'ETB',       // Ethiopian Birr
            'Somalia' => 'SOS',        // Somali Shilling
            'Djibouti' => 'DJF',       // Djiboutian Franc
            'Eritrea' => 'ERN',        // Eritrean Nakfa
            'Comoros' => 'KMF',        // Comorian Franc
        ];

        return $countryToCurrencyMap[$country] ?? 'USD';  // Fallback to USD if country is not found
    }

    private function getCurrencySymbol($currencyCode)
    {
        $currencySymbols = [
            'UGX' => 'USh',
            'KES' => 'KSh',
            'TZS' => 'TSh',
            'RWF' => 'FRw',
            'BIF' => 'FBu',
            'SSP' => '£',
            'ETB' => 'Br',
            'SOS' => 'SSh',
            'DJF' => 'Fdj',
            'ERN' => 'Nkf',
            'KMF' => 'CF',
            'USD' => '$',
        ];

        return $currencySymbols[$currencyCode] ?? '$';  // Default to USD symbol
    }
}
