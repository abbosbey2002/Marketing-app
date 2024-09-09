<?php

namespace App\Http\Controllers\Reviews;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Provider;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewsController extends Controller
{
    // Display a listing of the reviews
    public function index()
    {
        // Retrieve all reviews, optionally paginated
        $reviews = Review::with('language', 'provider')->paginate(10); // Adjust pagination as needed

        return view('admin.providers.reviews.index', compact('reviews'));
    }

    // Show the form for creating a new review
    public function create()
    {
        // Retrieve languages for the dropdown
        $languages = Language::all();

        // Get the authenticated provider
        $provider = Auth::user();

        return view('admin.providers.reviews.create', compact('languages', 'provider'));
    }

    // Store a newly created review in the database
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'rating' => 'required|integer|min:1|max:5', // rating maydoni, 1-5 oralig'idagi butun son bo'lishi kerak
            'description_summary' => 'nullable|string|max:1000', // ixtiyoriy maydon, maksimum 1000 ta belgidan oshmasligi kerak
            'origin' => 'nullable|string|max:255', // ixtiyoriy maydon, maksimum 255 ta belgidan oshmasligi kerak
            'user_full_name' => 'nullable|string|max:255', // ixtiyoriy maydon, maksimum 255 ta belgidan oshmasligi kerak
            'email' => 'nullable|email|max:255', // email formati bo'lishi kerak
            'user_job_title' => 'nullable|string|max:255', // ixtiyoriy maydon, maksimum 255 ta belgidan oshmasligi kerak
            'user_company_name' => 'nullable|string|max:255', // ixtiyoriy maydon, maksimum 255 ta belgidan oshmasligi kerak
            'company_industry' => 'nullable|string|max:255', // ixtiyoriy maydon, maksimum 255 ta belgidan oshmasligi kerak
            'company_size' => 'nullable|integer', // ixtiyoriy maydon, butun son bo'lishi kerak
            'providing_service' => 'nullable|string|max:255', // ixtiyoriy maydon, maksimum 255 ta belgidan oshmasligi kerak
            'language_id' => 'required|exists:languages,id', // `languages` jadvalida mavjud bo'lgan `id` bo'lishi kerak
            'provider_id' => 'required|exists:providers,id', // `providers` jadvalida mavjud bo'lgan `id` bo'lishi kerak
        ]);
        // Automatically associate the review with the authenticated provider
        $providerId = Auth::user()->manager->provider_id;
        // Create and save the review
        Review::create([
            'rating' => $validatedData['rating'],
            'description_summary' => $validatedData['description_summary'],
            'origin' => $validatedData['origin'],
            'user_full_name' => $validatedData['user_full_name'],
            'email' => $validatedData['email'],
            'user_job_title' => $validatedData['user_job_title'],
            'user_company_name' => $validatedData['user_company_name'],
            'company_industry' => $validatedData['company_industry'],
            'company_size' => $validatedData['company_size'],
            'providing_service' => $validatedData['providing_service'],
            'language_id' => $validatedData['language_id'],
            'provider_id' => $providerId, // Associate with the authenticated provider
        ]);

        return redirect()->route('reviews.index')->with('success', 'Review created successfully.');
    }

    public function show($id)
    {
        // Retrieve the specific review by its ID, along with its related language and provider
        $review = Review::with('language', 'provider')->findOrFail($id);

        // Return the show view with the review data
        return view('admin.providers.reviews.show', compact('review'));
    }

    // Show the form for editing a specific review
    public function edit(Review $review)
    {
        // Ensure the review belongs to the authenticated provider

        $languages = Language::all();

        return view('admin.providers.reviews.edit', compact('review', 'languages'));
    }

    // Update a specific review in the database
    public function update(Request $request, Review $review)
    {
        // Ensure the review belongs to the authenticated provider

        // Validate the request data
        $validatedData = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'description_summary' => 'required|string|max:255',
            'origin' => 'required|string|max:255',
            'user_full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'user_job_title' => 'nullable|string|max:255',
            'user_company_name' => 'nullable|string|max:255',
            'company_industry' => 'nullable|string|max:255',
            'company_size' => 'nullable|string|max:255',
            'providing_service' => 'nullable|string|max:255',
            'language_id' => 'required|exists:languages,id',
        ]);

        // Update the review
        $review->update($validatedData);

        return redirect()->route('reviews.index')->with('success', 'Review updated successfully.');
    }

    // Delete a specific review from the database
    public function destroy(Review $review)
    {
        // Ensure the review belongs to the authenticated provider

        // Delete the review
        $review->delete();

        return redirect()->route('reviews.index')->with('success', 'Review deleted successfully.');
    }
}
