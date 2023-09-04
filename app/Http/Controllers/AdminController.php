<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\UserResponse;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function grade() {
        $userResponses = UserResponse::all();
        return view('admin/grade')->with('responses', $userResponses);
    }

    public function permission() {

        $users = User::all();
        $tasks = Task::all();

        return view('admin/curs-grant')->with('users', $users)->with('tasks', $tasks);
    }

    public function storePermission(int $userId, Request $request) {
        $user = User::find($userId);
        $selected_task = $request['selected_task'];

        $user->task_id = $selected_task;
        $user->save();

        return back();
    }

    public function downloadTask(int $userId, int $taskId) {
        $userResponse = UserResponse::where('user_id', '=', $userId)
                                        ->where('task_id', '=', $taskId)
                                        ->first();

        return response()->download(public_path('uploads/'.$userId.'/'.$userResponse->name), $userResponse->name);
    }

    public function store(int $userId, int $taskId, Request $request) {
        $userResponse = UserResponse::where('user_id', '=', $userId)
            ->where('task_id', '=', $taskId)
            ->first();

        $userResponse->grade = $request['grade'];
        $userResponse->commentary = $request['commentary'];

        $userResponse->save();

        return back();
    }

}
