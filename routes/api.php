<?php

use App\Models\Task;
use App\Models\UserResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/completion', function () {

    $tasks = Task::all()->count();
    $responses = UserResponse::all()->count();
    $completion = ($responses / $tasks) * 100;

    return response()
        ->json(['completion' => $completion]);
})->name('main');
