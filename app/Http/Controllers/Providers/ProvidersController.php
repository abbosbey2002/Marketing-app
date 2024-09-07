<?php

namespace App\Http\Controllers\Providers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Language;
use App\Models\Manager;
use App\Models\Portfolio;
use App\Models\Provider;
use App\Models\ProviderService;
use App\Models\ProviderServiceSkill;
use App\Models\Review;
use App\Models\Service;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProvidersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function profile()
    {
        $user = Auth::user()->manager; // Get the authenticated user
        $provider = $user->provider;
        $portfolios = Portfolio::where('provider_id', $user->provider_id)->get();
        $reviews = Review::where('provider_id', $user->provider_id)->get();
        $services = Service::all();
        $providers = Manager::where('provider_id', $provider->id)->get();
        $categories = Category::all();
        $languages = Language::all();
        $providerLanguageCodes = $provider->languages ? $provider->languages->pluck('code')->toArray() : [];

        return view('admin.providers.profile.index', compact('provider', 'services', 'providers', 'languages', 'providerLanguageCodes'));
    }

    public function show($id)
    {
        $user = Auth::user();
        $provider = $user->provider;

        return view('admin.providers.profile.show', compact('provider'));
    }

    public function service()
    {
        $provider = Auth()->user()->manager->provider()->first();
        $services = $provider->services ?? [];
        $serviceTypes = Service::all();
        $skills = Skill::all();

        return view('admin.providers.service.index', compact('services', 'serviceTypes', 'skills'));
    }

    public function addservice(Request $request)
    {
        $validatedData = $request->validate([
            'service-type' => 'required|exists:services,id', // Xizmat ID mavjudligini tekshirish
            'skills' => 'required|array', // Skills array kerak
            'skills.*' => 'exists:skills,id', // Har bir skill mavjudligini tekshirish
            'startingPrice' => 'nullable|numeric',
            'description' => 'required|string',
            'provider_id' => 'required|exists:providers,id', // Provayder ID mavjudligini tekshirish
        ]);

        $provider = Provider::find($validatedData['provider_id']);
        $serviceId = $validatedData['service-type'];

        foreach ($validatedData['skills'] as $skillId) {
            ProviderServiceSkill::create([
                'provider_id' => $provider->id,
                'service_id' => $serviceId,
                'skill_id' => $skillId,
            ]);
        }

        $providerService = ProviderService::create([
            'provider_id' => $provider->id,
            'service_id' => $serviceId,
            'price' => $validatedData['startingPrice'],
            'custom_price' => $validatedData['startingPrice'],
            'description' => $validatedData['description'],
        ]);

        return redirect()->back()->with(['message' => __('messages.service_save')]);
    }

    public function updateservice(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'service-type' => 'required|exists:services,id', // Service ID must exist
            'skills' => 'required|array', // Skills must be an array
            'skills.*' => 'exists:skills,id', // Each skill ID must exist
            'startingPrice' => 'nullable|numeric',
            'description' => 'required|string',
            'provider_id' => 'required|exists:providers,id', // Provider ID must exist
        ]);

        // Find the existing ProviderService entry
        $providerService = ProviderService::where('provider_id', $validatedData['provider_id'])
            ->where('service_id', $validatedData['service-type'])
            ->first();

        // If ProviderService doesn't exist, return an error message
        if (! $providerService) {
            return redirect()->back()->withErrors(['message' => 'Service not found for this provider.']);
        }

        // Update ProviderService fields
        $providerService->update([
            'price' => $validatedData['startingPrice'],
            'description' => $validatedData['description'],
        ]);

        // Update the associated skills
        // First, remove all existing skills related to this ProviderService
        ProviderServiceSkill::where('provider_id', $validatedData['provider_id'])
            ->where('service_id', $validatedData['service-type'])
            ->delete();

        // Then, add the new skills
        foreach ($validatedData['skills'] as $skillId) {
            ProviderServiceSkill::create([
                'provider_id' => $validatedData['provider_id'],
                'service_id' => $validatedData['service-type'],
                'skill_id' => $skillId,
            ]);
        }

        // Redirect back with a success message
        return redirect()->back()->with(['message' => __('messages.service_updated')]);
    }

    public function deleteService(Request $request)
    {
        // Validate the request to ensure service-type and provider_id are provided
        $validatedData = $request->validate([
            'service-type' => 'required|exists:services,id', // Service ID must exist
            'provider_id' => 'required|exists:providers,id', // Provider ID must exist
        ]);

        // Find the existing ProviderService entry
        $providerService = ProviderService::where('provider_id', $validatedData['provider_id'])
            ->where('service_id', $validatedData['service-type'])
            ->first();

        // If ProviderService doesn't exist, return an error message
        if (! $providerService) {
            return redirect()->back()->withErrors(['message' => 'Service not found for this provider.']);
        }

        // Delete all associated ProviderServiceSkill records
        ProviderServiceSkill::where('provider_id', $validatedData['provider_id'])
            ->where('service_id', $validatedData['service-type'])
            ->delete();

        // Delete the ProviderService record
        $providerService->delete();

        // Redirect back with a success message
        return redirect()->back()->with(['message' => 'Xizmat muvaffaqiyatli o\'chirildi!']);
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
        $provider = Auth()->user()->manager->provider();

        // Attach the skills to the provider
        $provider->skills()->sync($request->input('skills'));

        // You can also save other fields like 'priceService' or 'description' to the provider
        $provider->update([
            'startingPrice' => $request->input('priceService'),
            'service_id' => $request->input('serivice-type'),
            'description' => $request->input('description'),
        ]);

        return response()->json([$provider, $provider->skills()]);
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'turnover' => 'nullable|integer|min:0',
            'teamSize' => 'required|integer|min:1',
            'tagline' => 'nullable|string|max:255',
            'foundedAt' => 'nullable|date',
            'description' => 'nullable|string',
            'logo' => 'nullable|image|max:255',
            'cover' => 'nullable|image|max:255',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => [
                'nullable',
                'email',
                'max:255',
                Rule::unique('providers')->ignore(Auth::user()->manager->provider_id),
            ],
            'password' => 'nullable|string|min:8',
        ]);

        $user = Auth::user()->manager;
        $provider = $user->provider;

        // Handle file uploads
        if ($request->hasFile('logo')) {
            // Delete the old logo if it exists
            if ($provider->logo) {
                Storage::disk('public')->delete($provider->logo);
            }

            // Store the new logo in the 'logos' folder within the 'public' disk
            $validatedData['logo'] = $request->file('logo')->store('logos', 'public');
        }

        if ($request->hasFile('cover')) {
            // Delete the old cover if it exists
            if ($provider->cover) {
                Storage::disk('public')->delete($provider->cover);
            }

            // Store the new cover in the 'covers' folder within the 'public' disk
            $validatedData['cover'] = $request->file('cover')->store('covers', 'public');
        }

        // Hash the password if it is present
        if ($request->filled('password')) {
            $validatedData['password'] = bcrypt($request->input('password'));
        }

        // Save language
        if ($request->has('languages')) {
            // Get the language codes from the request, ensuring it's an array
            $languageCodes = $request->input('languages');

            // Find the corresponding language IDs based on the codes
            $languageIds = Language::whereIn('code', $languageCodes)->pluck('id')->toArray();

            // Sync the languages using the IDs
            $provider->languages()->sync($languageIds);
        } else {
            // If no languages are provided, clear the languages or leave them unchanged based on your business logic
            $provider->languages()->sync([]); // This clears all associated languages
        }

        // Update the provider's profile
        $provider->update($validatedData);

        // Redirect back with a success message
        return redirect()->route('providers.profile')->with('success', __('messages.profile_update'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $provider = Provider::findOrFail($id);
        $provider->delete();

        return redirect()->route('providers.profile')->with('success', 'Provider deleted successfully.');
    }
}
