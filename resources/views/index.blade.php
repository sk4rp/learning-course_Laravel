@extends('layouts/main')

@section('content')
<head>
    <title>Course Selection</title>
</head>

@if (Route::has('login'))
    @auth
        <div class="introduction-block">
            <h1 class="introduction-block__title">Добро пожаловать {{ Auth::user()->name  }}</h1>

            <div class="introduction-block__description mt-6">
                <p>Ваш прогресс</p>
                <div class="progress progress-striped active">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="{{ $completion }}" aria-valuemin="0" aria-valuemax="100" style="width: {{$completion}}%"></div>
                </div>
            </div>
        </div>
    @else
        <div class="introduction-block">
            <h1 class="introduction-block__title">Добро пожаловать на Code Learning!</h1>
            <p class="introduction-block__description">Сайт для изучения программирования!</p>
        </div>
    @endauth
@endif
@endsection
