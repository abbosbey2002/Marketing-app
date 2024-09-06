<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\Request;

class ProviderSearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        dd($query);
        $providers = Provider::where('name', 'LIKE', "%{$query}%")->take(5)->get();

        return response()->json($providers);
    }
}
