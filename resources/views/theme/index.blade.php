@extends('layouts/main')

@section('content')


<div class="container-lg">
    <p class="text-center">Ваш прогресс</p>
    <div class="progress progress-striped active">
        <div id="progress" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="{{ $completion }}" aria-valuemin="0" aria-valuemax="100" style="width: {{$completion}}%"></div>
    </div>
</div>

<div class="mb-4 mt-6">
    <h1>{{ $themes['name'] }} : {{ $themes['text'] }}</h1>
</div>

<div class="theme-container align-self-stretch">
    @foreach ($themes->tasks as $task)
        <a href="{{ "/theme/task/theory/$task[id]" }}" class="{{ Auth::user()->task_id == $task['id'] ? '' : 'unavailable' }}">
            <div class="theme-container__item {{ Auth::user()->task_id == $task['id'] ? '' : 'theme-container__item_disabled' }}">
                <div class="theme-container__item_desc">
                    <p>{{ $task->name }}</p>
                </div>
            </div>
        </a>
    @endforeach
</div>
@endsection
