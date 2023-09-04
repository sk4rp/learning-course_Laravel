@extends('layouts/main')

@section('content')
    <div class="flex flex-wrap justify-content-center container">

        <h1>{{ $task['name'] }}</h1>

        <div class="task-block__item task-block__item_b">
            <div>
                <h1>Задание</h1>
                <p>{{ $task['task'] }}</p>
            </div>
        </div>

        @if($userResponse)
            <div>
                <p>Вы загрузили: {{ $userResponse->name }}</p>
                <p>Оценка: {{ $userResponse->grade == null ? 'Не оценено' : $userResponse->grade}}</p>
                <p>Комментарий: {{ $userResponse->commentary == null ? 'Не прокомментированно' : $userResponse->commentary }}</p>
            </div>
        @endif

        <div class="task-block__item task-block__item_c answer_input">
            <form class="flex flex-wrap justify-content-center"
                  action="{{ route('task.store', ['index' => $task['id']]) }}" method="POST"
                  enctype="multipart/form-data">
                @csrf
                <label class="label btn btn-outline-secondary">
                    <input name="file" type="file"/>
                    <p>Загрузить работу</p>
                </label>

                <label class="label btn btn-outline-secondary">
                    <input class="answer_input_button" type="submit" value="Сохранить"/>
                    <p>Отправить</p>
                </label>
            </form>
        </div>
    </div>
@endsection
