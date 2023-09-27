<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Http\Resources\TasksResource;
use App\Http\Requests\TaskRequest;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return TasksResource::collection(Task::where('user_id', '1')->where('is_completed', false)->get());
    }

    public function completed() {
        return TasksResource::collection(Task::where('user_id', '1')->where('is_completed', true)->get());
    }

    public function getTasksByList($list_id) {
        return TasksResource::collection(Task::where('todo_list_id', $list_id)->where('is_completed', false)->get());
    }

    public function getTasksCompleted($id) {
        return TasksResource::collection(Task::where('user_id', $id)->where('is_completed', true)->get());
    }

    public function unCompletedTask($id) {
        $task = Task::where('id', $id)->first();
        $task->is_completed = 0;
        $task->save();
        return TasksResource::make($task);
    }

    public function completeTask($id) {
        $task = Task::where('id', $id)->first();
        $task->is_completed = 1;
        $task->save();
        return TasksResource::make($task);
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
    public function store(TaskRequest $request)
    {
        $task = Task::create($request->validated());

        return TasksResource::make($task);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, $id)
    {
        $task = Task::where('id', $id)->first();
        $task->update($request->validated());
        return TasksResource::make($task);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $task = Task::where('id', $id)->first();
        Task::destroy($id);
        return TasksResource::make($task);
    }
}
