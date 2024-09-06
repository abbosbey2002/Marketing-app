<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Provider;
use App\Models\ProviderManager;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProviderRegistrationController extends Controller
{
    // Step 1: Kompaniya nomi formasini ko'rsatish
    public function showCompanyNameForm()
    {
        return view('auth.provider.register.step1');
    }

    // Step 1: Kompaniya nomini qabul qilish
    public function handleCompanyName(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Yangi provayderni yaratib, faqat kompaniya nomini saqlaymiz
        $provider = Provider::create([
            'name' => $validatedData['name'],
            'email' => '',
            'password' => '',
        ]);

        // Yaratilgan provayder ID'sini qaytaramiz va bu ID ni keyingi qadamda ishlatamiz
        return redirect()->route('providerRegisterStep2', ['provider_id' => $provider->id]);
    }

    // Step 2: Kompaniya qo'shimcha ma'lumotlar formasini ko'rsatish
    public function showCompanyDetailsForm($provider_id)
    {
        $languages = Language::all();
        $services = Service::all();

        return view('auth.provider.register.step2', compact('languages', 'services', 'provider_id'));
    }

    // Step 2: Kompaniya qo'shimcha ma'lumotlarini qabul qilish
    public function handleCompanyDetails(Request $request, $provider_id)
    {
        $validatedData = $request->validate([
            'company_address' => 'required|string|max:255',
            'company_website' => 'required|url|max:255',
            'company_phone' => 'required|string|max:15',
            'teamSize' => 'required|integer',
        ]);

        // Avval yaratilgan provayderni yangilaymiz
        $provider = Provider::findOrFail($provider_id);
        $provider->update([
            'company_address' => $validatedData['company_address'],
            'company_website' => $validatedData['company_website'],
            'company_phone' => $validatedData['company_phone'],
            'teamSize' => $validatedData['teamSize'],
        ]);

        return redirect()->route('providerRegisterStep3', ['provider_id' => $provider->id]);
    }

    // Step 3: Manager hisobini yaratish
    public function showManagerForm($provider_id)
    {
        return view('auth.provider.register.step3', ['provider_id' => $provider_id]);
    }

    // Step 3: Manager hisobini qabul qilish va yaratish
    public function handleManagerCreation(Request $request, $provider_id)
    {
        $validatedData = $request->validate([
            'manager_name' => 'required|string|max:255',
            'manager_email' => 'required|string|email|max:255|unique:providers_manager,manager_email',
            'manager_password' => 'required|string|confirmed|min:8',
        ]);

        DB::transaction(function () use ($validatedData, $provider_id, $request) {
            // Providerni topamiz
            $provider = Provider::findOrFail($provider_id);

            // ProviderManager jadvaliga manager ma'lumotlarini saqlaymiz
            $providerManager = ProviderManager::create([
                'provider_id' => $provider->id,
                'manager_name' => $validatedData['manager_name'],
                'manager_email' => $validatedData['manager_email'],
                'manager_password' => bcrypt($validatedData['manager_password']),
                'role' => 'admin', // Avtomatik ravishda admin roli beriladi
            ]);

            // Provayderning email va parolini yangilaymiz
            $provider->update([
                'email' => $request->input('manager_email'),
                'password' => bcrypt($request->input('manager_password')),
            ]);
        });

        // Foydalanuvchini tizimga kiritamiz
        $providerManager = ProviderManager::where('manager_email', $request->input('manager_email'))->first();
        Auth::login($providerManager);

        // Tekshirib ko'ring, agar foydalanuvchi topilsa va parol to'g'ri bo'lsa
        if ($providerManager && Hash::check($request->input('manager_password'), $providerManager->manager_password)) {
            Auth::guard('provider_manager')->login($providerManager);

            return redirect()->route('provider.dashboard')->with('success', 'Provider registration completed successfully.');
        }

        return redirect()->route('providers.index')->with('success', 'Provider registration completed successfully.');
    }
}
