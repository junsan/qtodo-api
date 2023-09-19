<?php

namespace App\Http\Controllers;

use App\Http\Resources\TodoListsResource;
use App\Models\TodoList;
use Illuminate\Http\Request;

class TodoListsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return TodoListsResource::collection(TodoList::where('user_id', '1')->get());
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
