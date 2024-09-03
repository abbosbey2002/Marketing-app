<?php

namespace App\Http\Controllers\Services;

use App\Models\Service;
use App\Models\ServiceList;
use App\Models\Category;
use App\Models\Skill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Service::with('skills')->get(); // Eager loading skills relationship
        $serviceTypes = ServiceList::all();
        $skills = Skill::all();
        return view('admin.providers.services.index', compact('services', 'serviceTypes', 'skills'));
    }

    public function create()
    {
        $categories = Category::all();
        $skills = Skill::all(); // Pass skills to the view to allow selection
        $serviceTypes = ServiceList::all(); // Pass service types to the view
        return view('admin.providers.services.create', compact('categories', 'skills', 'serviceTypes'));
    }

    public function show(Service $service)
    {
        $service->load('skills'); // Eager load skills for the service
        return view('admin.providers.services.show', compact('service'));
    }

    public function store(Request $request)
    {

        // Validate the incoming request data
        $request->validate([
            'service-type' => 'required', // Service type must exist in service_lists table
            'startingPrice' => 'nullable',
            'skills' => 'nullable|array',
            'description' => 'nullable|string',
            'provider_id' => 'nullable|exists:providers,id',
        ]);
        // Create a new service
        $service = Service::create([
            'service_list_id' => $request['service-type'], // Correct key name
            'startingPrice' => $request->input('startingPrice'),
            'description' => $request->input('description'),
            'provider_id' => $request->input('provider_id'),
            'category_id' => $request->input('category_id')
        ]);

        // Attach the selected skills to the service
        $service->skills()->attach($request->input('skills'));
        // Redirect to the services index page with a success message
        return redirect()->route('services.index')->with('success', 'Service created successfully.');
    }

    public function edit(Service $service)
    {
        $categories = Category::all();
        $skills = Skill::all(); // Get all skills for selection
        $serviceTypes = ServiceList::all(); // Get all service types for selection
        return view('admin.providers.services.edit', compact('service', 'categories', 'skills', 'serviceTypes'));
    }

    public function update(Request $request, Service $service)
    {

        $request->validate([
            'service-type' => 'required', // Service type must exist in service_lists table
            'startingPrice' => 'nullable',
            'skills' => 'nullable|array',
            'description' => 'nullable|string',
            'provider_id' => 'nullable|exists:providers,id',
        ]);
        // Update the service's basic details
        $service->update([
            'service_list_id' => $request->input('service-type'),
            'startingPrice' => $request->input('startingPrice'),
            'description' => $request->input('description'),
            'provider_id' => $request->input('provider_id'),
        ]);

        // Sync the selected skills with the service
        $service->skills()->sync($request->input('skills', []));

        // Redirect to the services index page with a success message
        return redirect()->route('services.index')->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service)
    {
        // Detach any related skills before deleting the service
        $service->skills()->detach();

        // Delete the service
        $service->delete();

        // Redirect to the services index page with a success message
        return redirect()->route('services.index')->with('success', 'Service deleted successfully.');
    }
}
