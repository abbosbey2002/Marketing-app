<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Category;
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
        ]);

        // Yangi servis yaratish
        Service::create($request->all());

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

        $service = Service::findOrFail($id);

        $validated = $request->validate([
            'name_ru' => 'nullable|string|max:255',
            'name_uz' => 'nullable|string|max:255',
            'name_en' => 'nullable|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        $service->update($validated);

        try {
            $service->update($request->all());
            return redirect()->route('services-admin.index')->with('success', 'Service updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
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
