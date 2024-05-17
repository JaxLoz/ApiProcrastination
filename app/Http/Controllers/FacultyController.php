<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFacultyRequest;
use App\Http\Requests\UpdateFacultyRequest;
use App\Models\Faculty;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faculties = Faculty::all();

        return response()->json([
            'success' => true,
            'data' => $faculties
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFacultyRequest $request)
    {
        $faculty = new Faculty();

        $faculty->name = $request->name;

        $faculty->save();

        return response()->json([
            'success' => true,
            'data' => $faculty
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Faculty $faculty)
    {
        return response()->json([
            'success' => true,
            'data' => $faculty
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFacultyRequest $request, Faculty $faculty)
    {
        $faculty->name = $request->name;

        $faculty->save();

        return response()->json([
            'success' => true,
            'data' => $faculty
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faculty $faculty)
    {
        $faculty->delete();

        return response()->json([
            'success' => true,
            'data' => $faculty
        ]);
    }
}