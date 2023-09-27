<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\TodoListsController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/tasks', TasksController::class);
Route::apiResource('/lists', TodoListsController::class);

Route::get('/list_tasks/{list}', [TasksController::class, 'getTasksByList'])->name('task.list_tasks');
Route::get('/list_tasks_completed/{list}', [TasksController::class, 'getTasksCompleted'])->name('task.list_tasks_completed');
Route::get('/completed', [TasksController::class, 'completed'])->name('task.completed');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::get('/automatic_login/{id}', [UserController::class, 'automaticLogin'])->name('automatic.login');
Route::get('/list_id/{list}', [TodoListsController::class, 'getListById'])->name('list.by_id');
Route::get('/un_complete/{id}', [TasksController::class, 'unCompletedTask'])->name('task.uncomplete');
Route::get('/complete_task/{id}', [TasksController::class, 'completeTask'])->name('task.complete');