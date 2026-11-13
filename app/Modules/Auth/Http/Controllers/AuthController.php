<?php

namespace App\Modules\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\CustomerProfile;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function showLoginForm(): View
    {
        return view('auth::login');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            $user = Auth::user();

            if (! $user->isActive()) {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return back()->withErrors([
                    'email' => 'Akun Anda sedang dinonaktifkan atau dalam proses peninjauan.',
                ]);
            }

            // Pengalihan berdasarkan role pengguna
            return match ($user->role) {
                'admin' => redirect()->intended(route('admin.clients.index')),
                'client' => redirect()->intended(route('client.services.index', ['client' => $user->client->id])),
                default => redirect()->intended(route('customer.services.index')),
            };
        }

        return back()->withErrors([
            'email' => 'Kredensial yang dimasukkan tidak cocok dengan data kami.',
        ])->onlyInput('email');
    }

    public function showCustomerRegisterForm(): View
    {
        return view('auth::register-customer');
    }

    public function registerCustomer(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone_number' => ['nullable', 'string', 'max:20'],
            'address' => ['nullable', 'string'],
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'customer',
            'status' => 'active',
        ]);

        CustomerProfile::create([
            'user_id' => $user->id,
            'phone_number' => $validated['phone_number'] ?? null,
            'address' => $validated['address'] ?? null,
        ]);

        Auth::login($user);

        return redirect()->route('customer.services.index')->with('success', 'Registrasi pelanggan berhasil!');
    }

    public function showClientRegisterForm(): View
    {
        return view('auth::register-client');
    }

    public function registerClient(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'string', 'max:20'],
            'business_name' => ['required', 'string', 'max:255'],
            'service_area' => ['required', 'string', 'max:255'],
            'bank_name' => ['required', 'string', 'max:100'],
            'bank_account_number' => ['required', 'string', 'max:50'],
            'bank_account_holder' => ['required', 'string', 'max:255'],
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'client',
            'status' => 'active',
        ]);

        Client::create([
            'user_id' => $user->id,
            'name' => $validated['name'],
            'slug' => Str::slug($validated['business_name']) . '-' . Str::random(5),
            'phone' => $validated['phone'],
            'business_name' => $validated['business_name'],
            'service_area' => $validated['service_area'],
            'bank_name' => $validated['bank_name'],
            'bank_account_number' => $validated['bank_account_number'],
            'bank_account_holder' => $validated['bank_account_holder'],
            'status' => 'pending',
        ]);

        Auth::login($user);

        return redirect()->route('client.services.index', ['client' => $user->client->id])
            ->with('success', 'Registrasi penyedia jasa berhasil!');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
