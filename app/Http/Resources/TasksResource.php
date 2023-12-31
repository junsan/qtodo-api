<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TasksResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'todo_list_id' => $this->todo_list_id,
            'name' => $this->name,
            'due_date' => $this->due_date,
            'is_completed' => (bool) $this->is_completed
        ];
    }
}
