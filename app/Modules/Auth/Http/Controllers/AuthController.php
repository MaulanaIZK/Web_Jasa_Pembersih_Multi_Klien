<?php

namespace App\Modules\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\User;
use App\Modules\Governance\Notifications\ClientRegistered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        return back()->withErrors(['email' => 'Alamat email atau kata sandi salah.']);
    }

    public function showRegisterChoice()
    {
        return view('auth::register-choice');
    }

    public function showClientRegisterForm()
    {
        return view('auth::register-client');
    }

    public function showCustomerRegisterForm()
    {
        return view('auth.register');
    }

    public function registerCustomer(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('dashboard');
    }

    public function registerClient(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'business_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'phone' => ['required', 'string', 'max:20'],
            'service_area' => ['required', 'string', 'max:255'],
            'bank_name' => ['required', 'string', 'max:50'],
            'bank_account_number' => ['required', 'string', 'max:30'],
            'bank_account_holder' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $client = DB::transaction(function () use ($data) {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'role' => 'client',
                'status' => 'pending',
            ]);

            return Client::create([
                'user_id' => $user->id,
                'name' => $data['name'],
                'slug' => Str::slug($data['business_name']).'-'.Str::lower(Str::random(5)),
                'phone' => $data['phone'],
                'business_name' => $data['business_name'],
                'bank_name' => $data['bank_name'],
                'bank_account_number' => $data['bank_account_number'],
                'bank_account_holder' => $data['bank_account_holder'],
                'service_area' => $data['service_area'],
                'status' => 'pending',
            ]);
        });

        // Kegagalan kirim email tidak boleh membatalkan pendaftaran.
        try {
            Notification::send(
                User::where('role', 'admin')->where('status', 'active')->get(),
                new ClientRegistered($client)
            );
        } catch (\Throwable $e) {
            report($e);
        }

        return redirect()->route('register.client.pending');
    }

    public function showClientPending()
    {
        return view('auth::register-client-pending');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
