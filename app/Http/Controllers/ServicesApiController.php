<?php

namespace App\Http\Controllers;

use App\Models\Service;

class ServicesApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $servicestype = Service::all();

        return response()->json([
            'status' => 'success',
            'data' => $servicestype,
        ], 200); // 200 status kodi - OK
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */

    /**
     * Display the specified resource.
     */
    public function show(Service $Service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $Service)
    {
        //
    }
}
