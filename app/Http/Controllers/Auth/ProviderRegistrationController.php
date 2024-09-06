<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Manager;
use App\Models\Provider;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
            'name' => 'required|string|max:255|unique:providers,name', // Ensures 'name' is unique in the 'managers' table
        ]);

        $request->session()->put('provider', $validatedData);

        return redirect()->route('providerRegisterStep2');
    }

    // Step 2: Kompaniya qo'shimcha ma'lumotlar formasini ko'rsatish
    public function showCompanyDetailsForm($provider_id)
    {
        // Blade shabloniga tillar va xizmatlarni yuborish
        return view('auth.provider.register.step2');
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

        // Mavjud provider sessiyasini olish va yangilash
        $providerData = $request->session()->get('provider');

        $providerData = array_merge($providerData, $validatedData);

        // Yangilangan provider massivni sessiyaga saqlash
        $request->session()->put('provider', $providerData);

        return redirect()->route('providerRegisterStep3');
    }

    // Step 3: Manager hisobini yaratish
    public function showManagerForm($provider_id)
    {
        return view('auth.provider.register.step3', ['provider_id' => $provider_id]);
    }

    // Step 3: Manager hisobini qabul qilish va yaratish
    public function storeproviderwithmanager(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|confirmed|min:8',
        ]);

        // Sessiyadagi kompaniya ma'lumotlarini olish
        // Sessiyadagi provider ma'lumotlarini olish
        $providerData = session()->get('provider');

        // dd($providerData);

        if (! $providerData) {
            // return redirect()->back()->with('error', 'Provider data not found in session.');
            return redirect()->route('providerRegisterStep1')->with('error', 'Provider data not found in session.');
        }

        $provider = Provider::create([
            'turnover' => null,
            'name' => $providerData['name'],
            'company_address' => $providerData['company_address'],
            'company_website' => $providerData['company_website'],
            'company_phone' => $providerData['company_phone'],
            'teamSize' => $providerData['teamSize'],
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Manager jadvaliga manager ma'lumotlarini saqlash
        Manager::create([
            'provider_id' => $provider->id,
            'user_id' => $user->id,
        ]);

        Auth::login($user);

        // Barcha sessiya ma'lumotlarini tozalash
        session()->forget('provider');

        return redirect()->route('providers.profile')->with('success', 'Profile updated successfully');
    }
}
