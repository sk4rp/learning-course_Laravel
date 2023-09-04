@extends('layouts/main')

@section('content')
<h1>{{ $task['name'] }}</h1>

<div class="task-block">

    <div class="task-block__item task-block__item_a">
        <div>
            <h1>Теория</h1>
            <p>{{ $task['theory'] }}</p>
        </div>
    </div>

    <div class="task-block__item task-block__item_b">
        <div>
            <h1>Задание</h1>
            <p>{{ $task['task'] }}</p>
        </div>
    </div>

    <div class="task-block__item task-block__item_c answer_input">
        <form class="flex flex-wrap justify-content-center" action="{{ route('task.store', ['index' => $task['id']]) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <label class="label btn btn-outline-secondary flex flex-wrap align-items-center align-content-center">
                <a href="/" class="answer_input_button"></a>
                <p>На главную</p>
            </label>

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
