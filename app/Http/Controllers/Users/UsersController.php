<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,  // Foydalanuvchining emaili, uni qayta takrorlashni oldini oladi
            'password' => 'nullable|string|min:8',  // Agar foydalanuvchi parolni o'zgartirmoqchi bo'lsa
            'phone' => 'nullable|string|max:20',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',  // Avatar yuklash uchun qoidalar
            'address' => 'nullable|string|max:255',
            'bio' => 'nullable|string|max:1000',
        ]);

        try {
            // tayyor malumtolarni olish
            $data = $request->only(['name', 'email', 'phone', 'address', 'bio']);

            // file
            if ($request->hasFile('avatar')) {
                $avatarPath = $request->file('avatar')->store('avatars', 'public');
                $data['avatar'] = $avatarPath;  // Ma'lumotlar arrayiga avatar pathini qo'shish
            }

            $user->update($data);

            return redirect()->back()->with('success', 'An error occurred while updating the profile: ');
        } catch (\Exception $e) {
            dd($e->getMessage());

            // Agar xatolik bo'lsa, foydalanuvchini qayta yo'naltirish va xato xabari ko'rsatish
            return redirect()->back()->with('error', 'An error occurred while updating the profile: '.$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
