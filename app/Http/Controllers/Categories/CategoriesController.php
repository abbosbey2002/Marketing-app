<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Provider;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10);
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        $providers = Provider::all();
        return view('categories.create', compact('providers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'provider_id' => 'required|integer|exists:providers,id',
            'name' => 'required',
        ]);

        Category::create($request->all());
        return redirect()->route('categories.index');
    }

    public function edit(Categories $category)
    {
        $providers = Provider::all();
        return view('categories.edit', compact('category', 'providers'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'provider_id' => 'required|integer|exists:providers,id',
            'name' => 'required',
        ]);

        $category->update($request->all());
        return redirect()->route('categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index');
    }
}
