<?php

namespace App\Http\Controllers\Providers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProviderDashboardController extends Controller
{
    /**
     * Display the main provider management dashboard.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        // Hozirgi foydalanuvchi (provider manager) ma'lumotlarini oling
        $providerManager = Auth::user();

        return view('admin.layouts.main', [
            'providerManager' => $providerManager,
            'provider' => $providerManager->provider, // Provider ma'lumotlarini olish
        ]);
    }
}
