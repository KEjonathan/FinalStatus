<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Wallet; // Import the Wallet model
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/home'; // Redirect after successful registration

    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'country' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'digits_between:10,15'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'referral_code' => ['nullable', 'string', 'max:255'],
        ]);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function register(Request $request)
    {
        // Validate the registration data
        $validator = $this->validator($request->all());

        // Check if validation fails
        if ($validator->fails()) {
            // Send errors back to the view
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // If validation passes, create the user and wallet
        $user = $this->create($request->all());

        // Flash success message
        //\Flasher\SweetAlert\Prime\sweetalert()->success('User Created and Wallet Assigned Successfully');
        \Flasher\Toastr\Prime\toastr()->success('User Account Created Successfully');

        // Redirect to the home page
        return redirect($this->redirectTo);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        // Create the user
        $user = User::create([
            'username' => $data['username'],
            'name' => $data['name'],
            'email' => $data['email'],
            'country' => $data['country'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
            'referral_code' => $data['referral_code'] ?? null, // Optional referral code
        ]);

        // Automatically create a wallet for the user
        Wallet::create([
            'user_id' => $user->id,
            'balance' => 0.00, // Initial balance
            'earnings' => 0.00, // Initial earnings
        ]);

        return $user;
    }
}
