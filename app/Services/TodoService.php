<?php

namespace App\Services;

use App\Models\Todo;
use App\Models\User;

class TodoService
{
    public function getAll(User $user): array
    {
        return $user->todos()->get()->toArray();
    }

    public function create(User $user, array $data): Todo
    {
        return $user->todos()->create($data);
    }

    public function find(User $user, int $id): Todo
    {
        return $user->todos()->findOrFail($id);
    }

    public function update(User $user, int $id, array $data): Todo
    {
        $todo = $user->todos()->findOrFail($id);

        $todo->update($data);

        return $todo;
    }

    public function delete(User $user, int $id): void
    {
        $todo = $user->todos()->findOrFail($id);

        $todo->delete();
    }

    public function deleteAllTodos(User $user): void {
        $user->todos()->delete();
    }
}