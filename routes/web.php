<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ThemeController;
use App\Models\Task;
use App\Models\UserResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {


    $completion = 0;

    if(Auth::check()) {
        $tasks = Task::all()->count();
        $responses = UserResponse::where('user_id', '=', Auth::user()->id)->count();
        $completion = ($responses / $tasks) * 100;
    }

    return view('index')->with('completion', $completion);
})->name('main');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/course', [CourseController::class, 'index'])->name('course');
Route::get('/theme/{index}', [ThemeController::class, 'index'])->middleware(['auth']);

Route::post('/theme/task/store/{index}', [TaskController::class, 'store'])->middleware(['auth'])->name('task.store');
Route::get('/theme/task/{index}', [TaskController::class, 'index'])->middleware(['auth']);

Route::get('/theme/task/theory/{index}', [TaskController::class, 'theory'])->middleware(['auth']);
Route::get('/theme/task/practice/{index}', [TaskController::class, 'practice'])->middleware(['auth'])->name('task.practice');

Route::get('/admin/grade', [AdminController::class, 'grade'])->middleware(['auth'])->name('admin.grade');
Route::get('/admin/permission', [AdminController::class, 'permission'])->middleware(['auth'])->name('admin.permission');

Route::post('/admin/permission/{userId}', [AdminController::class, 'storePermission'])->middleware(['auth'])->name('admin.permission.store');

Route::get('/admin/grade/task/{userId}/{taskId}', [AdminController::class, 'downloadTask'])->middleware(['auth'])->name('admin.grade.download');
Route::post('/admin/grade/task/{userId}/{taskId}', [AdminController::class, 'store'])->middleware(['auth'])->name('admin.grade.store');


require __DIR__.'/auth.php';
