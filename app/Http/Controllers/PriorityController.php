<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePriorityRequest;
use App\Http\Requests\UpdatePriorityRequest;
use App\Models\Priority;

class PriorityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $priorities = Priority::all();

        return response()->json([
            'success' => true,
            'data' => $priorities
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePriorityRequest $request)
    {
        $priority = new Priority();

        $priority->name = $request->name;

        $priority->save();

        return response()->json([
            'success' => true,
            'data' => $priority
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Priority $priority)
    {
        return response()->json([
            'success' => true,
            'data' => $priority
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePriorityRequest $request, Priority $priority)
    {
        $priority->name = $request->name;

        $priority->save();

        return response()->json([
            'success' => true,
            'data' => $priority
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Priority $priority)
    {
        $priority->delete();

        return response()->json([
            'success' => true,
            'data' => $priority
        ]);
    }
}
