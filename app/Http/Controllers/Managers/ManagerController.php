<?php

namespace App\Http\Controllers\Managers;

use App\Http\Controllers\Controller;
use App\Mail\ProviderInvitation;
use App\Models\Manager;
use App\Models\Provider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ManagerController extends Controller
{
    public function inviteProvider(Request $request)
    {
        // Managerni topish
        $request->validate([
            'email' => 'required|email',
        ]);

        $provider = Auth::user()->manager->provider()->first();

        // Taklif linkini yaratish

        $providerId = $provider->id; // provider id
        $email = urlencode($request->input('email')); // email (gmail), URL uchun kodlanadi
        $invitationLink = route('manager.invite', ['provider' => $providerId, 'email' => $email]); 

        // Email yuborish
        try {
            Mail::to($request->email)->send(new ProviderInvitation($invitationLink, $provider, $email));
            return redirect()->back()->with('success', 'Providerga qo\'shilish taklifi yuborildi.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Providerga qo\'shilish taklifini yuborishda xatolik yuz berdi.');
        }
    }

    public function invite(Request $request)
    {
        $providerId = $request->input('provider');
        $email = urldecode($request->input('email'));
        $provider = Provider::find($providerId);
        
        if( !$provider ){
            return response()->view('provider-notfound', [], 404);
            // provider topilmasa not found page optish
        }

        return view('pages.manager-invite', compact('providerId', 'email', 'provider')); // manager sahifasiga qaytish yoki boshqa harakatlar
    }


    public function storemanger(Request $request)
    {
        $validatedData = $request->validate([
            'provider_id' => 'required|exists:providers,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);
        
        Manager::create([
            'provider_id' => $validatedData['provider_id'],
            'user_id' => $user->id,
        ]);

        
        return redirect()->route('providers.profile')->with('success', 'Profile updated successfully');
    }
    

    public function index()
    {
        $managers = Manager::where('provider_id', Auth::user()->manager->provider_id)->paginate(10);

        return view('admin.providers.managers.index', compact('managers'));
    }

    public function getManager($id)
    {
        $manager = Manager::findOrFail($id);

        return response()->json($manager);
    }

    public function create()
    {
        return view('admin.providers.managers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'manager_name' => 'required|string|max:255',
            'manager_email' => 'required|string|email|max:255|unique:providers_manager',
            'manager_password' => 'required|string|min:8',
            'role' => 'required|string|max:255',
        ]);

        $provider = Manager::create([
            'provider_id' => Auth::user()->provider_id,
            'manager_name' => $request->manager_name,
            'manager_email' => $request->manager_email,
            'manager_password' => Hash::make($request->manager_password),
            'role' => $request->role,
        ]);

        return redirect()->route('managers.index')->with('success', 'Manager created successfully.');
    }

    public function show($id)
    {
        $manager = Manager::findOrFail($id);

        return view('admin.providers.managers.show', compact('manager'));
    }

    public function edit(Request $request)
    {
        $id = $request->input('forGetId');

        // POST yoki GET so'rovi orqali kelgan ID ni olamiz
        $manager = Manager::findOrFail($id); // ID bo'yicha managerni topamiz

        return view('admin.providers.managers.edit', compact('manager'));
    }

    public function update(Request $request, $id)
    {
        $manager = Manager::findOrFail($id);

        // Validation
        $request->validate([
            'manager_name' => 'required|string|max:255',
            'manager_email' => 'required|string|email|max:255|unique:providers_manager,manager_email,'.$manager->id,
            'manager_password' => 'nullable|string|min:8',
            'role' => 'required|string',
        ]);

        // Ma'lumotlarni yangilash
        $manager->manager_name = $request->manager_name;
        $manager->manager_email = $request->manager_email;

        // Agar parol o'zgartirilsa, uni yangilash
        if ($request->manager_password) {
            $manager->password = bcrypt($request->manager_password);
        }

        $manager->role = $request->role;
        $manager->save();

        // Qayta yo'naltirish
        return redirect()->route('managers.index')->with('success', 'Manager updated successfully.');
    }

    public function destroy($id)
    {
        $manager = Manager::findOrFail($id);
        $manager->delete();

        return redirect()->route('managers.index')->with('success', 'Manager deleted successfully.');
    }
}