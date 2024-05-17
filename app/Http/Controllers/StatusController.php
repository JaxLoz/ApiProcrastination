<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStatusRequest;
use App\Http\Requests\UpdateStatusRequest;
use App\Models\Status;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $statuses = Status::all();

        return response()->json([
            'success' => true,
            'data' => $statuses
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStatusRequest $request)
    {
        $status = new Status();

        $status->name = $request->name;

        $status->save();

        return response()->json([
            'success' => true,
            'data' => $status
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Status $status)
    {
        return response()->json([
            'success' => true,
            'data' => $status
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStatusRequest $request, Status $status)
    {
        $status->name = $request->name;

        $status->save();

        return response()->json([
            'success' => true,
            'data' => $status
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Status $status)
    {
        $status->delete();

        return response()->json([
            'success' => true,
            'data' => $status
        ]);
    }
}
