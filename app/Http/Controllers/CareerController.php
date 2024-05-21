<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCareerRequest;
use App\Http\Requests\UpdateCareerRequest;
use App\Models\Career;
use Spatie\QueryBuilder\QueryBuilder;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $careers = QueryBuilder::for(Career::class)
            ->allowedFilters(['name', 'faculty_id'])
            ->allowedIncludes('faculty')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $careers
        ]); 
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCareerRequest $request)
    {
        $career = new Career();

        $career->name = $request->name;
        $career->faculty_id = $request->faculty_id;

        $career->save();

        return response()->json([
            'success' => true,
            'data' => $career
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Career $career)
    {
        return response()->json([
            'success' => true,
            'data' => $career
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCareerRequest $request, Career $career)
    {
        $career->name = $request->name;
        $career->faculty_id = $request->faculty_id;

        $career->save();

        return response()->json([
            'success' => true,
            'data' => $career
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Career $career)
    {
        $career->delete();

        return response()->json([
            'success' => true,
            'data' => $career
        ]);
    }
}
