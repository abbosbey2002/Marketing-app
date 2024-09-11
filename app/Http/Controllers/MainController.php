<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Provider;

class MainController extends Controller
{
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
