<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Student;
use Spatie\QueryBuilder\QueryBuilder;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = QueryBuilder::for(Student::class)
            ->allowedFilters(['first_name', 'last_name'])
            ->allowedIncludes('user', 'semester')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $students
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        $student = new Student();

        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->born_date = $request->born_date;
        $student->gender = $request->gender;
        $student->phone = $request->phone;
        $student->user_id = $request->user_id;
        $student->semester_id = $request->semester_id;

        $student->save();

        return response()->json([
            'success' => true,
            'data' => $student
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return response()->json([
            'success' => true,
            'data' => $student
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->born_date = $request->born_date;
        $student->phone = $request->phone;
        $student->user_id = $request->user_id;
        $student->semester_id = $request->semester_id;

        $student->save();

        return response()->json([
            'success' => true,
            'data' => $student
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return response()->json([
            'success' => true,
            'data' => $student
        ]);
    }
}
