<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function addTask(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'task' => 'required|string',
        ]);
        if($validator->fails()){
            $response = [
                'success' => false,
                'message' => $validator->errors()
            ];
            return response()->json($response,400);
        }
        $input = $request->all();
        $task = Task::create($input);
        $success['task'] =  $task->task;
        $response = [
            'success' => true,
            'data' => $success,
            'message' => 'Task successful'
        ];
        return response()->json($response,200);
    }

    public function updateStatus(Request $request)
    {
        $validatedData = $request->validate([
            'task_id' => 'required|exists:tasks,id',
            'status' => 'required|in:pending,done',
        ]);

        $task = Task::findOrFail($validatedData['task_id']);
        $task->status = $validatedData['status'];
        $task->save();

        $message = $validatedData['status'] == 'done' ? 'Marked task as done' : 'Marked task as pending';

        return response()->json([
            'task' => $task,
            'status' => 1,
            'message' => $message,
        ]);
    }
}

