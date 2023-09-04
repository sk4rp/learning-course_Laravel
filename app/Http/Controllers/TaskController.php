<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\UserResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index(int $index) {
        $task = Task::find($index);
        return view('/task/index', ['task' => $task]);
    }

    public function theory(int $index) {
        $task = Task::find($index);
        return view('/task/theory', ['task' => $task]);
    }

    public function practice(int $index) {
        $task = Task::find($index);

        $userResponse = UserResponse::where('user_id', '=', Auth::user()->id)
            ->where('task_id', '=', $index)
            ->first();

        return view('/task/practice', ['task' => $task, 'userResponse' => $userResponse]);
    }

    public function store(int $index, Request $request) {
        $request->validate(['file' => 'required|mimes:zip,7z']);
        $fileName = time().'.'.$request->file('file')->extension();
        $request->file('file')->move(public_path('uploads/'.Auth::user()->id), $fileName);

        $response = UserResponse::where('user_id', Auth::user()->id)->where('task_id', $index)->first();

        if($response != null) {
            $response->update([
               'name' => $fileName
            ]);
        }
        else {
            UserResponse::create([
                'name' => $fileName,
                'user_id' => Auth::user()->id,
                'task_id' => $index
            ]);
        }

;

        return back();
    }
}
