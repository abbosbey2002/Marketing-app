<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    // Ro'l tanlash sahifasini ko'rsatish
    public function showRoleSelectionForm()
    {
        return view('auth.signup');
    }

    // Tanlangan ro'lni qabul qilish va tegishli ro'yxatdan o'tish jarayoniga yo'naltirish
    public function handleRoleSelection($role)
    {
        if (!in_array($role, ['provider', 'partner', 'marketer'])) {
            return redirect()->route('register')->with('error', 'Invalid role selected.');
        }

        session(['registration_role' => $role]);

        switch ($role) {
            case 'provider':
                return redirect()->route('providerRegisterStep1');
            case 'partner':
                return redirect()->route('auth.partner.register.step1');
            case 'marketer':
                return redirect()->route('auth.marketer.register.step1');
            default:
                return redirect()->route('register');
        }
    }

    // Provider uchun kompaniya nomi formasini ko'rsatish
    public function showProviderCompanyForm()
    {
        return view('auth.provider.name');
    }

    // Provider kompaniya nomini qabul qilish
    public function registerProviderStep1(Request $request)
    {
        // Bu yerda validatsiya va session saqlash lozim
    }

    // Partner uchun ma'lumotlar formasini ko'rsatish
    public function showPartnerDetailsForm()
    {
        return view('auth.partner.details');
    }

    // Partner ma'lumotlarini qabul qilish
    public function registerPartnerStep1(Request $request)
    {
        // Bu yerda validatsiya va session saqlash lozim
    }

    // Marketer uchun kompaniya nomi formasini ko'rsatish
    public function showMarketerCompanyForm()
    {
        return view('auth.marketer.company_name');
    }

    // Marketer kompaniya nomini qabul qilish
    public function registerMarketerStep1(Request $request)
    {
        // Bu yerda validatsiya va session saqlash lozim
    }
}
