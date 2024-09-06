<?php

namespace App\Http\Controllers\Portfolios;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\Provider;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfoliosController extends Controller
{
    public function index()
    {
        $services = Service::all();
        $portfolios = Portfolio::where('provider_id', Auth()->user()->manager->provider_id)->orderBy('id', 'DESC')->paginate(20);

        return view('admin.providers.portfolios.index', compact('portfolios', 'services'));
    }

    public function create()
    {
        $providers = Provider::all();
        $services = Service::all();

        return view('admin.providers.portfolios.create', compact('providers', 'services'));
    }

    public function store(Request $request)
    {
        // Formadan kelgan ma'lumotlarni validatsiya qilish
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|max:2048',
            'youtube_url' => 'nullable|string|max:255',
            'expertise' => 'nullable|string|max:255',
            'skills' => 'nullable|string',
            'budget' => 'numeric',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'introduction' => 'nullable|string',
            'challenges' => 'nullable|string',
            'solution' => 'nullable|string',
            'impact' => 'nullable|string',
            'link' => 'nullable|string|max:255',
            'company_name' => 'nullable|string|max:255',
            'company_location' => 'nullable|string|max:255',
            'sector' => 'nullable|string|max:255',
            'audience' => 'nullable|string|max:255',
            'geographic_scope' => 'nullable|string|max:255',
            'provider_id' => 'nullable|exists:providers,id',
            'service_id' => 'nullable|exists:services,id',
        ]);

        // Agar fayl yuklangan bo'lsa
        // Agar fayl yuklangan bo'lsa
        if ($request->hasFile('image')) {
            // Faylni saqlash
            $path = $request->file('image')->store('images/portfolyo', 'public');

            // Fayl nomini olish
            $filename = basename($path);

            // Fayl nomini validatsiya qilingan ma'lumotlarga qo'shish
            $validatedData['image'] = $filename;
        }

        // Yangi portfolio yaratish
        Portfolio::create($validatedData);

        // Portfolio index sahifasiga qaytish
        return redirect()->route('portfolios.index')->with('success', 'Portfolio muvaffaqiyatli yaratildi!');
    }

    public function edit(Portfolio $portfolio)
    {
        $providers = Provider::all();
        $services = Service::all();

        return view('admin.providers.portfolios.edit', compact('portfolio', 'providers', 'services'));
    }


    public function update(Request $request, Portfolio $portfolio)
    {
        // Ma'lumotlarni validatsiya qilish (kommentariyani olib tashlang)
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|max:2048',
            'youtube_url' => 'nullable|string|max:255',
            'expertise' => 'nullable|string|max:255',
            'skills' => 'nullable|string',
            'budget' => 'numeric',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'introduction' => 'nullable|string',
            'challenges' => 'nullable|string',
            'solution' => 'nullable|string',
            'impact' => 'nullable|string',
            'link' => 'nullable|string|max:255',
            'company_name' => 'nullable|string|max:255',
            'company_location' => 'nullable|string|max:255',
            'sector' => 'nullable|string|max:255',
            'audience' => 'nullable|string|max:255',
            'geographic_scope' => 'nullable|string|max:255',
            'provider_id' => 'nullable|exists:providers,id',
            'service_id' => 'nullable|exists:services,id',
        ]);

        // Yangi tasvir yuklanganligini tekshirish
        if ($request->hasFile('image')) {
            // Eski tasvirni o'chirish
            if ($portfolio->image) {
                Storage::disk('public')->delete('images/' . $portfolio->image);
            }

            // Yangi tasvirni saqlash
            $path = $request->file('image')->store('images', 'public');
            $filename = basename($path);

            // Yangi tasvir nomini yangilash
            $portfolio->image = $filename;
        }
            // Yangi tasvir nomini yangilash
            $portfolio->image = $filename;
        }

        // Boshqa maydonlarni yangilash
        $portfolio->update($request->except(['image']));
        // Boshqa maydonlarni yangilash
        $portfolio->update($request->except(['image']));

        // Yangilangan tasvir nomini saqlash
        $portfolio->save();

        return redirect()->route('portfolios.index')->with('success', 'Portfolio muvaffaqiyatli yangilandi.');
    }


    public function destroy(Portfolio $portfolio)
    {
        $portfolio->delete();

        return redirect()->route('portfolios.index');
    }

    public function show(Portfolio $portfolio)
    {
        return view('admin.providers.portfolios.show', compact('portfolio'));
    }
}
