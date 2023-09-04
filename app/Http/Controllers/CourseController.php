<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Task;
use App\Models\UserResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index() {
        $tasks = Task::all()->count();
        $responses = UserResponse::where('user_id', '=', Auth::user()->id)->count();
        $completion = ($responses / $tasks) * 100;

        $courses = Course::all();
        return view('/course/index', ['courses' => $courses, 'completion' => $completion]);
    }
}
