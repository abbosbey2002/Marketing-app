<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provider;

class ProviderSearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        dd($query)
        $providers = Provider::where('name', 'LIKE', "%{$query}%")->take(5)->get();

        return response()->json($providers);
    }
}
