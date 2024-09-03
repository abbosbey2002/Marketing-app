<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Bazadagi barcha skilllarni olish
        $skills = Skill::all();

        // Skill ro'yxatini JSON formatida qaytarish
        return response()->json($skills);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Yangi skill yaratish uchun formni ko'rsatish
        return view('skills.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Formdan kelgan ma'lumotlarni validatsiya qilish
        $request->validate([
            'name' => 'required|string|max:255',
            'level' => 'nullable|string|max:255',
        ]);

        // Yangi skillni bazaga qo'shish
        Skill::create($request->all());

        // Muvaffaqiyatli qo'shilgandan so'ng, skill ro'yxatiga qaytish
        return null;
    }
}
