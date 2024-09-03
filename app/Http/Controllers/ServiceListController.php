<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceListRequest;
use App\Http\Requests\UpdateServiceListRequest;
use App\Models\ServiceList;

class ServiceListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $servicestype = ServiceList::all();
          return response()->json([
        'status' => 'success',
        'data' => $servicestype
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
    public function store(StoreServiceListRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ServiceList $serviceList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ServiceList $serviceList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceListRequest $request, ServiceList $serviceList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ServiceList $serviceList)
    {
        //
    }
}
