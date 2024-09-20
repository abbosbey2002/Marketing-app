<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Service;
use App\Models\Skill;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $services = Service::with('category')->get();

        return view('admin.services.index', compact('services', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Kategoriya ro'yxatini olish
        $categories = Category::all();

        return view('services.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // So'rovni validatsiya qilish
        $request->validate([
            'name_ru' => 'required|string|max:255',
            'name_uz' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'skills_uz' => 'nullable|array',  // Skills for Uzbek
            'skills_ru' => 'nullable|array',  // Skills for Russian
            'skills_en' => 'nullable|array',  // Skills for English
            'skills_uz.*' => 'nullable|string|max:255',
            'skills_ru.*' => 'nullable|string|max:255',
            'skills_en.*' => 'nullable|string|max:255',
        ]);

        // Yangi servis yaratish
        $service = Service::create($request->only(['name_ru', 'name_uz', 'name_en', 'category_id']));

        // Skills yaratish (uch tilga asoslangan)
        if ($request->has('skills_uz') && $request->has('skills_ru') && $request->has('skills_en')) {
            for ($i = 0; $i < count($request->skills_uz); $i++) {
                if (! empty($request->skills_uz[$i]) || ! empty($request->skills_ru[$i]) || ! empty($request->skills_en[$i])) {
                    Skill::create([
                        'name_uz' => $request->skills_uz[$i],
                        'name_ru' => $request->skills_ru[$i],
                        'name_en' => $request->skills_en[$i],
                        'category' => '1',
                        'service_id' => $service->id,
                    ]);
                }
            }
        }

        // Yaratilgan servis uchun qaytish
        return redirect()->route('services-admin.index')->with('success', 'Service created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        return view('services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        $categories = Category::all();

        return view('services.edit', compact('service', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // So'rovni validatsiya qilish
        $request->validate([
            'name_ru' => 'required|string|max:255',
            'name_uz' => 'required|string|max:255',
            'name_en' => 'required|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'skills_uz.*' => 'nullable|string|max:255',
            'skills_ru.*' => 'nullable|string|max:255',
            'skills_en.*' => 'nullable|string|max:255',
            'skills_uz_new.*' => 'nullable|string|max:255',
            'skills_ru_new.*' => 'nullable|string|max:255',
            'skills_en_new.*' => 'nullable|string|max:255',
        ]);

        // Xizmatni yangilash
        $service = Service::findOrFail($id);
        $service->update($request->only(['name_ru', 'name_uz', 'name_en', 'category_id']));

        // Mavjud skillslarni yangilash
        if ($request->has('skills_uz')) {
            foreach ($request->skills_uz as $skillId => $skillNameUz) {
                $skill = Skill::findOrFail($skillId);
                $skill->update([
                    'name_uz' => $skillNameUz,
                    'name_ru' => $request->skills_ru[$skillId],
                    'name_en' => $request->skills_en[$skillId],
                ]);
            }
        }

        // Yangi skillslarni qo'shish
        if ($request->has('skills_uz_new')) {
            for ($i = 0; $i < count($request->skills_uz_new); $i++) {
                if (! empty($request->skills_uz_new[$i]) || ! empty($request->skills_ru_new[$i]) || ! empty($request->skills_en_new[$i])) {
                    Skill::create([
                        'name_uz' => $request->skills_uz_new[$i],
                        'name_ru' => $request->skills_ru_new[$i],
                        'name_en' => $request->skills_en_new[$i],
                        'category' => '1',
                        'service_list_id' => $service->id,
                    ]);
                }
            }
        }

        // O'chirilgan skillslarni o'chirish (client tarafdan kelgan 'remove-skill' dan foydalanishingiz mumkin)
        if ($request->has('remove_skills')) {
            Skill::destroy($request->remove_skills);
        }

        // Muvaffaqiyatli xabar bilan qaytish
        return redirect()->route('services-admin.index')->with('success', 'Service updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        // Servisni o'chirish
        $service->delete();

        return redirect()->route('services-admin.index')->with('success', 'Service deleted successfully.');
    }
}
