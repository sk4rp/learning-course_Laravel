@extends('layouts/main')

@section('content')
    <ul class="list-group w-75">
        @foreach($users as $user)
            <div class="card list-group-item w-100 mb-3">
                <div class="card-body">
                    <p class="card-text">Номер: {{ $user->id }}</p>
                    <p class="card-text">Имя: {{ $user->name }}</p>
                    <p class="card-text">Почта: {{ $user->email }}</p>

                    <form action="{{ route('admin.permission.store', ['userId' => $user->id]) }}" method="post">
                        @csrf
                        <div class="input-group">

                            <label class="input-group-text" for="inputGroupSelect01">Доступное задание</label>
                            <select class="form-select" id="selected_task" name="selected_task">
                                @foreach($tasks as $task)
                                    <option value="{{ $task->id }}" {{ $task->id == $user->task_id ? 'selected' : '' }}>
                                        {{ $task->theme->name }} : {{ $task->name }}
                                    </option>
                                @endforeach
                            </select>

                            <button class="btn btn-outline-secondary" type="submit">Изменить</button>
                        </div>
                    </form>

                </div>
            </div>
        @endforeach
    </ul>
@endsection
