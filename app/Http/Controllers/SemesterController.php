<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSemesterRequest;
use App\Http\Requests\UpdateSemesterRequest;
use App\Models\Semester;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $semesters = QueryBuilder::for(Semester::class)
            ->allowedFilters([
                'name',
                AllowedFilter::exact('career_id')
            ])
            ->allowedIncludes('career')
            ->get();
            
        return response()->json([
            'success' => true,
            'data' => $semesters
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSemesterRequest $request)
    {
        $semester = new Semester();

        $semester->name = $request->name;
        $semester->career_id = $request->career_id;

        $semester->save();

        return response()->json([
            'success' => true,
            'data' => $semester
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Semester $semester)
    {
        return response()->json([
            'success' => true,
            'data' => $semester
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSemesterRequest $request, Semester $semester)
    {
        $semester->name = $request->name;
        $semester->career_id = $request->career_id;
        $semester->save();

        return response()->json([
            'success' => true,
            'data' => $semester
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Semester $semester)
    {
        $semester->delete();

        return response()->json([
            'success' => true,
            'data' => $semester
        ]);
    }
}
