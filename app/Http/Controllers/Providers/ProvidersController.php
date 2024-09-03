<?php

namespace App\Http\Controllers\Providers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Provider;
use App\Models\Portfolio;
use App\Models\Review;
use App\Models\Language;
use App\Models\Service;
use App\Models\Category;
use App\Models\ProviderManager;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;



class ProvidersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $provider = $user->provider;
        $portfolios = Portfolio::where('provider_id',$user->provider_id)->get();
        $reviews = Review::where('provider_id',$user->provider_id)->get();
        $services = Service::all();
        $providers = ProviderManager::where('provider_id', $provider->id)->get();
        $categories = Category::all();
        return view('admin.providers.profile.index', compact('provider', 'services', 'providers'));
    }

    public function show($id)
    {
        $user = Auth::user();
        $provider = $user->provider;
        return view('admin.providers.profile.show', compact('provider'));
    }


   
    public function edit()
    {
        $user = Auth::user();
        $provider = $user->provider;
        $services = Service::all();
        return view('admin.providers.profile.edit', compact('provider', 'services'));
    }

    public function addSkills(Request $request)
    {

         // Get the authenticated provider
    $provider = Auth()->user()->provider()->first();
 
    // Validate the incoming request
    // $request->validate([
    //     'service-type' => 'required|integer',
    //     'skills' => 'required|array',
    //     'skills.*' => 'integer|exists:skills,id',
    //     'priceService' => 'required|numeric',
    //     'description' => 'nullable|string',
    // ]);

    // Attach the skills to the provider
    $provider->skills()->sync($request->input('skills'));
 
    // You can also save other fields like 'priceService' or 'description' to the provider
    $provider->update([
        'startingPrice' => $request->input('priceService'),
        'service_id' => $request->input('serivice-type'),
        'description' => $request->input('description'),
    ]);

    return  response()->json([$provider, $provider->skills()]);
    }

    
    public function update(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'turnover' => 'nullable|string',
            'teamSize' => 'nullable|integer',
            'tagline' => 'nullable|string',
            'foundedAt' => 'nullable|string',
            'description' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'cover' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',


            'email' => 'required|email',
            'password' => 'nullable|confirmed',
            'language_id' => 'nullable|exists:languages,id',
            'service_id' => 'nullable|exists:services,id'
        ]);
        $user = Auth::user();
        $provider = $user->provider;
        // Handle file uploads
        if ($request->hasFile('logo')) {
            // Delete the old logo if it exists
            if ($provider->logo) {
                Storage::delete($provider->logo);
            }
            $validatedData['logo'] = $request->file('logo')->store('logos', 'public');
        }

        if ($request->hasFile('cover')) {
            // Delete the old cover if it exists
            if ($provider->cover) {
                Storage::delete($provider->cover);
            }
            $validatedData['cover'] = $request->file('cover')->store('covers', 'public');
        }

        // Hash the password if it is present
        if ($request->filled('password')) {
            $validatedData['password'] = bcrypt($request->input('password'));
        }


        // Update the provider's profile
        $provider->update($validatedData);

        // Redirect back with a success message
        return redirect()->route('providers.index')->with('success', 'Profile updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $provider = Provider::findOrFail($id);
        $provider->delete();
        return redirect()->route('providers.index')->with('success', 'Provider deleted successfully.');
    }
}
