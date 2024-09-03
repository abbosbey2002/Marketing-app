<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Provider;
use App\Models\ProviderManager;
use Illuminate\Support\Facades\Log;
use App\Models\Language;
use App\Models\Service;
use Illuminate\Support\Facades\DB; // Tranzaktsiyalar uchun DB facade'dan foydalaniladi


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

        session(['name' => $validatedData['name']]);

        return redirect()->route('providerRegisterStep2');
    }

    // Step 2: Kompaniya qo'shimcha ma'lumotlar formasini ko'rsatish
    public function showCompanyDetailsForm()
    {
        // Tillar va xizmatlar ro'yxatini olish
        $languages = Language::all();
        $services = Service::all();

        // Blade shabloniga tillar va xizmatlarni yuborish
        return view('auth.provider.register.step2', compact('languages', 'services'));
    }

    // Step 2: Kompaniya qo'shimcha ma'lumotlarini qabul qilish
    public function handleCompanyDetails(Request $request)
    {

    $validatedData = $request->validate([
        'company_address' => 'required|string|max:255',
        'company_website' => 'required|url|max:255',
        'company_phone' => 'required|string|max:15',
        'teamSize' => 'required|integer',
//        'language_id' => 'required|array',
//        'language_id.*' => 'integer|exists:languages,id',
//        'service_id' => 'required|array',
//        'service_id.*' => 'integer|exists:services,id',
    ]);

    // Store the data in the session
    session()->put('company_address', $validatedData['company_address']);
    session()->put('company_website', $validatedData['company_website']);
    session()->put('company_phone', $validatedData['company_phone']);
    session()->put('teamSize', $validatedData['teamSize']);
//    session()->put('language_id', $validatedData['language_id']);
//    session()->put('service_id', $validatedData['service_id']);

    return redirect()->route('providerRegisterStep3');
    }


    // Step 3: Manager hisobini yaratish
    public function showManagerForm()
    {
        return view('auth.provider.register.step3');
    }

    // Step 3: Manager hisobini qabul qilish va yaratish
    public function handleManagerCreation(Request $request)
    {
        // Validatsiya qilish
        $validatedData = $request->validate([
            'manager_name' => 'required|string|max:255',
            'manager_email' => 'required|string|email|max:255|unique:providers_manager,manager_email',
            'manager_password' => 'required|string|confirmed|min:8',
        ]);

        // Sessiyadagi kompaniya ma'lumotlarini olish
        $companyName = session('name');
        $companyAddress = session('company_address');
        $companyWebsite = session('company_website');
        $companyPhone = session('company_phone');
        $teamSize = session('teamSize');

//        $languageId = session('language_id'); // Agar kerak bo'lsa
//        $serviceId = session('service_id');   // Agar kerak bo'lsa



            // Provider modeliga barcha ma'lumotlarni vaqtincha saqlash
            $provider = Provider::create([
                'name' => $companyName,
                'company_address' => $companyAddress,
                'company_website' => $companyWebsite,
                'company_phone' => $companyPhone,
                'teamSize' => $teamSize,
                'turnover' => 'ass',
                 'email' =>   $request->input('manager_email'),
                  'password' => bcrypt($request->input('manager_password')),
//                'language_id' => $languageId, // Agar kerak bo'lsa
//                'service_id' => $serviceId,   // Agar kerak bo'lsa
            ]);


            // ProviderManager jadvaliga manager ma'lumotlarini saqlash
            ProviderManager::create([
                'provider_id' => $provider->id,
                'manager_name' => $validatedData['manager_name'],
                'manager_email' => $validatedData['manager_email'],
                'manager_password' => bcrypt($validatedData['manager_password']),
                'role' => 'admin', // Avtomatik ravishda admin roli beriladi
            ]);

            // Agar barcha operatsiyalar muvaffaqiyatli bo'lsa, tranzaktsiyani commit qilamiz
            DB::commit();

            // Barcha sessiya ma'lumotlarini tozalash
            session()->forget([
                'name',
                'company_address',
                'company_website',
                'company_phone',
                'teamSize',
                'language_id',
                'service_id',
            ]);

            return view('admin.layouts.main')->with('success', 'Provider registration completed successfully.');


    }

}
