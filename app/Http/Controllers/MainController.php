<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Provider;
use App\Models\Service;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Barcha partnerlar va kategoriyalarni olish
        $partners = Provider::all();
        $categories = Category::all();

        if ($query) {
            // Kategoriyalarni qidiruv so'rovi bo'yicha filtrlash
            $results = Category::where('name', 'LIKE', "%$query%")
                ->orWhereHas('services', function ($q) use ($query) {
                    $q->where('name_en', 'LIKE', "%$query%");
                })
                ->get();

            // Providerlarni qidiruv so'rovi bo'yicha filtrlash
            $providers = Provider::where('name', 'LIKE', "%$query%")
                ->orWhere('description', 'LIKE', "%$query%")
                ->orWhere('tagline', 'LIKE', "%$query%")
                ->get();
        } else {
            // Qidiruv bo'yicha natijalar bo'lmasa bo'sh kolleksiya
            $results = collect();
            $providers = collect();
        }

        return view('pages.home-search', [
            'results' => $results,
            'query' => $query,
            'partners' => $partners,
            'categories' => $categories,
            'providers' => $providers,
        ]);
    }

    // home
    public function home()
    {
        $partners = Provider::all();
        $categories = Category::all();

        return view('pages.home', compact('partners', 'categories'));
    }

    // Page Provider
    public function pageProvider()
    {
        $providers = Provider::paginate(6);

        return view('pages.page-provider', compact('providers'));
    }

    public function pageProviderService($service_id, $category_id)
    {
        // Xizmat va kategoriya ma'lumotlarini olish
        $service = Service::find($service_id);
        $category = Category::find($category_id);

        // Xizmatga tegishli barcha provayderlarni olish
        $providers = $service->providers()->paginate(6);

        // Barcha kategoriyalarni xizmatlari bilan olish
        $categories = Category::with('services')->get();

        return view('pages.page-provider-service', compact('providers', 'service', 'category', 'categories'));
    }

    public function searchProviders()
    {
        return view('pages.search-provider');
    }

    public function singleProviders()
    {
        return view('pages.single-provider');
    }

    public function singleReviews()
    {
        return view('pages.single-reviews');
    }

    // Marketers
    public function pageMarketers()
    {
        return view('pages.page-marketers');
    }

    public function singleMarketers()
    {
        return view('pages.single-marketers');
    }

    public function searchMarketers()
    {
        return view('pages.search-marketers');
    }

    // Partners
    public function pagePartners()
    {
        return view('pages.page-partners');
    }

    public function singlePartners()
    {
        return view('pages.single-partners');
    }

    public function searchPartners()
    {
        return view('pages.search-partners');
    }

    public function contact()
    {
        return view('pages.contact');
    }
}
