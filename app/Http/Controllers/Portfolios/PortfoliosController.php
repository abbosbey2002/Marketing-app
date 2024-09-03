<?php

namespace App\Http\Controllers\Portfolios;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Models\Provider;
use App\Models\Service;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PortfoliosController extends Controller
{
    public function index()
    {

        $portfolios = Portfolio::where('provider_id', Auth()->user()->provider_id)->orderBy('id', "DESC")->paginate(20);
        return view('admin.providers.portfolios.index', compact('portfolios'));
    }

    public function create()
    {
        $providers = Provider::all();
        $services = Service::all();
        return view('admin.providers.portfolios.create', compact('providers', 'services'));
    }

    public function store(Request $request)
    {
        
    
       

            // // Tasdiqlash
        $request->validate([
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            // Agar fayl yuklangan bo'lsa
        if ($request->hasFile('image')) {
            //     // Faylni saqlash
                $path = $request->file('image')->store('public/images');
                // Fayl nomini olish
                $filename = basename($path);
                // Fayl nomini bazaga saqlash
            $data['image'] = $filename;
            }

                Portfolio::create( $request->all());
        
                return redirect()->route('portfolios.index');
    }

    public function edit(Portfolio $portfolio)
    {
        $providers = Provider::all();
        $services = Service::all();
        return view('admin.providers.portfolios.edit', compact('portfolio', 'providers', 'services'));
    }

    public function update(Request $request, Portfolio $portfolio)
    {

     $request->validate([
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Yangi tasvir yuklanganligini tekshirish
    if ($request->hasFile('image')) {
        // Eski tasvirni o'chirish
        if ($portfolio->image) {
            Storage::delete('public/images/' . $portfolio->image);
        }

        // Yangi tasvirni saqlash
        $path = $request->file('image')->store('public/images');
        $filename = basename($path);

        // Yangi tasvir nomini yangilash
        $portfolio->image = $filename;
    }

    // Boshqa maydonlarni yangilash
     $portfolio->update($request->except(['image']));

        return redirect()->route('portfolios.index');
    }

    public function destroy(Portfolio $portfolio)
    {
        $portfolio->delete();
        return redirect()->route('portfolios.index');
    }

    public function show(Portfolio $portfolio){
        return view('admin.providers.portfolios.show', compact('portfolio'));
    }
}
