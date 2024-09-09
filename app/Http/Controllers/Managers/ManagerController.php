<?php

namespace App\Http\Controllers\Managers;

use App\Http\Controllers\Controller;
use App\Models\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ManagerController extends Controller
{
    public function index()
    {

        $managers = Manager::where('provider_id', Auth::user()->provider_id)->paginate(10);

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