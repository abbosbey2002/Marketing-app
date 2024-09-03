<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\ProviderManager;

class AuthController extends Controller
{
    // Umumiy login sahifasi
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Client login sahifasi
    public function showClientLoginForm()
    {
        return view('auth.login-client');
    }

    // Provider login sahifasi
    public function showProviderLoginForm()
    {
        return view('auth.provider.login.index');
    }

    // Marketer login sahifasi
    public function showMarketerLoginForm()
    {
        return view('auth.login-marketer');
    }

    // Client login qilish
    public function clientLogin(Request $request)
    {
        return $this->login($request, 'client');
    }

    // Provider login qilish
    public function providerLogin(Request $request)
    {
        return $this->providerLoginHandler($request);
    }

    // Marketer login qilish
    public function marketerLogin(Request $request)
    {
        return $this->login($request, 'marketer');
    }

    // Umumiy login funksiyasi (Client va Marketer uchun)
    protected function login(Request $request, $role)
    {
        $credentials = $request->only('email', 'password');
        $credentials['role'] = $role;

        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    // Provider login funksiyasi (providers_manager jadvali uchun)
    protected function providerLoginHandler(Request $request)
    {
        $request->validate([
            'manager_email' => 'required|email',
            'manager_password' => 'required|string',
        ]);
        $providerManager = ProviderManager::where('manager_email', $request->input('manager_email'))->first();

        if ($providerManager && Hash::check($request->input('manager_password'), $providerManager->manager_password)) {
            // Foydalanuvchini tizimga kirgizish
            Auth::guard('web')->login($providerManager);
            
            // Tekshirish uchun:
            if (Auth::check()) {
                // Foydalanuvchini to'g'ridan-to'g'ri provider dashboard-ga yo'naltirish
                return redirect()->route('provider.dashboard');
            }
        }

        // Agar login muvaffaqiyatsiz bo'lsa, xatolik bilan qaytarish
        return back()->withErrors([
            'manager_email' => 'The provided credentials do not match our records.',
        ]);
    }

    // Logout qilish
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}