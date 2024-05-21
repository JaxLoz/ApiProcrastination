<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Spatie\QueryBuilder\QueryBuilder;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = QueryBuilder::for(Task::class)
            ->allowedFilters([
                'name', 
                'description', 
                'start_date', 
                'due_date', 
                'status_id', 
                'student_id', 
                'priority_id'])
            ->allowedIncludes('status', 'student', 'priority')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $tasks
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        $task = new Task();

        $task->name = $request->name;
        $task->description = $request->description;
        $task->start_date = $request->start_date;
        $task->due_date = $request->due_date;
        $task->status_id = $request->status_id;
        $task->student_id = $request->student_id;
        $task->priority_id = $request->priority_id;

        $task->save();

        return response()->json([
            'success' => true,
            'data' => $task
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return response()->json([
            'success' => true,
            'data' => $task
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task->name = $request->name;
        $task->description = $request->description;
        $task->start_date = $request->start_date;
        $task->due_date = $request->due_date;
        $task->status_id = $request->status_id;
        $task->student_id = $request->student_id;
        $task->priority_id = $request->priority_id;

        $task->save();

        return response()->json([
            'success' => true,
            'data' => $task
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return response()->json([
            'success' => true,
            'data' => $task
        ]);
    }
}
