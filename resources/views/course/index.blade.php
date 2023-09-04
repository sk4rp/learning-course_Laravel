@extends('layouts/main')
@section('content')

<div class="container-lg">
    <p class="text-center">Ваш прогресс</p>
    <div class="progress progress-striped active">
        <div id="progress" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="{{ $completion }}" aria-valuemin="0" aria-valuemax="100" style="width: {{$completion}}%"></div>
    </div>
</div>

<div class="mb-4 mt-6">
    <h1 class="mb-4">Выберите курс</h1>
</div>

<div class="theme-container align-self-stretch">
    @foreach ($courses as $course)
            <?php
            $themes = $course->theme;
            $tasksId = [];

            foreach ($themes as $theme) {
                foreach($theme->tasks as $task) {
                    array_push($tasksId, $task->id);
                }
            }

            ?>

        <a href="{{ "/theme/$course[id]" }}" class="{{ in_array(Auth::user()->task_id, $tasksId) ? '' : 'unavailable' }}">
            <div class="theme-container__item {{ in_array(Auth::user()->task_id, $tasksId) ? '' : 'theme-container__item_disabled' }}">
                <div class="theme-container__item_desc">
                    <p>{{ $course['name'] }}</p>
                </div>
            </div>
        </a>
    @endforeach
</div>
@endsection
