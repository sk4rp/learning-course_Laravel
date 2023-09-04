@extends('layouts/main')

@section('content')
    <h1>{{ $task['name'] }}</h1>

    <div class="task-block__item task-block__item_a">
        <div>
            <h1>Теория</h1>
            <p>{{ $task['theory'] }}</p>
        </div>
    </div>

    <div class="d-grid gap-2 col-6 mx-auto">
        <a href="{{route('task.practice', ['index' => $task['id']])}}" class="btn btn-outline-secondary btn-lg" type="button">Практическое задание</a>
    </div>
@endsection
