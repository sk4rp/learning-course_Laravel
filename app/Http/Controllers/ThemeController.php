<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Theme;
use App\Models\UserResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ThemeController extends Controller
{
    public function index (int $index) {
        $course = Course::find($index)->theme->first();

        $tasks = DB::table('tasks')
                ->where('theme_id', '=', $index)
                ->count();

        $responses = DB::table('user_responses')
            ->where('user_id', Auth::user()->id)
            ->join('tasks', 'user_responses.task_id', '=', 'tasks.id')
            ->where('tasks.theme_id', '=', $index)
            ->count();

        $completion = ($responses / $tasks) * 100;

        return view('/theme/index', ['themes' => $course, 'completion' => $completion]);
    }
}
