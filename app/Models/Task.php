<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TodoList;
use App\Models\User;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'todo_list_id',
        'name',
        'due_date'
    ];

    public function list() {
        return $this->belongsTo(TodoList::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
