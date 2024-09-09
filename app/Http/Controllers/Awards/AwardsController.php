<?php

namespace App\Http\Controllers\Awards;

use App\Http\Controllers\Controller;
use App\Models\Award;
use App\Models\Category;
use App\Models\Portfolio;
use App\Models\Provider;
use Illuminate\Http\Request;

class AwardsController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $providers = Provider::all();
        $awards = Award::with(['category', 'provider'])->paginate(10);

        return view('admin.providers.awards.index', compact('awards', 'providers', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        $providers = Provider::all();
        $portfolios = Portfolio::all();

        return view('admin.providers.awards.create', compact('categories', 'providers', 'portfolios'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'category_id' => 'nullable|exists:categories,id',
            'provider_id' => 'nullable|exists:providers,id',
            'name' => 'nullable|string|max:255|unique:awards,name',
            'date' => 'required',
            'link' => 'nullable',
        ]);

        Award::create($request->all());

        return redirect()->route('awards.index')->with('success', 'Award created successfully.');
    }

    public function edit(Award $award)
    {
        $categories = Category::all();
        $providers = Provider::all();
        $portfolios = Portfolio::all();

        return view('admin.providers.awards.edit', compact('award', 'categories', 'providers', 'portfolios'));
    }

    public function update(Request $request, Award $award)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'provider_id' => 'required|exists:providers,id',
            'name' => 'required|string|max:255',
            'date' => 'required',
            'link' => 'nullable',
        ]);

        $award->update($request->all());

        return redirect()->route('awards.index')->with('success', 'Award updated successfully.');
    }

    public function destroy(Award $award)
    {
        $award->delete();

        return redirect()->route('awards.index')->with('success', 'Award deleted successfully.');
    }

    public function show(Award $award)
    {
        return view('admin.providers.awards.show', compact('award'));
    }
}
