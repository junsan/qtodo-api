<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Http\Resources\TasksResource;

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
        return TasksResource::collection(Task::where('user_id', '1')->where('todo_list_id', $list_id)->where('is_completed', false)->get());
    }

    public function getTasksCompletedByList($list_id) {
        return TasksResource::collection(Task::where('user_id', '1')->where('todo_list_id', $list_id)->where('is_completed', true)->get());
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
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}