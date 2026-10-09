<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Services\TodoService;

class TodoController extends Controller
{
    public function __construct(
        private TodoService $todoService
    ) {}

    public function index()
    {
        $user = auth('api')->user();
        $todos = $this->todoService->getAll($user);
        return response()->json($todos);
    }

    public function show(string $id)
    {
        $user = auth('api')->user();
        $todo = $this->todoService->find($user, $id);
        return response()->json($todo);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'completed' => 'boolean',
        ]);

        $user = auth('api')->user();
        $todo = $this->todoService->create($user, $data);
        return response()->json($todo);
    }

    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'title' => 'sometimes|string',
            'description' => 'sometimes|nullable|string',
            'completed' => 'sometimes|boolean',
        ]);

        $user = auth('api')->user();
        $todo = $this->todoService->update($user, $id, $data);
        return response()->json($todo);

    }

    public function destroy(string $id)
    {
        $user = auth('api')->user();

        $this->todoService->delete($user, $id);

        return response()->json([
            'message' => 'Todo deleted successfully'
        ]);
    }

    public function erase()
    {
        $user = auth('api')->user();
        $this->todoService->deleteAllTodos(($user));
        return response()->json([
            'message' => 'all Todos Deleted successfully'
        ]);
    }
}
