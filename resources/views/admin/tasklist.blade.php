<ul class="list-group">
    @forelse ($responses as $response)
        @if(($response->grade == null) == $condition)
            <li class="list-group-item">
                <p>Пользователь {{ $response->user->name }}</p>
                <p>Имя папки {{ $response->name }}</p>
                <p>Выполненное задание {{ $response->task->name }}</p>

                <div>
                    <div class="d-grid gap-2">
                        <a href="{{ route('admin.grade.download', ['userId' => $response->user->id, 'taskId' => $response->task->id]) }}"
                           class="btn btn-outline-secondary mb-4">Скачать
                        </a>
                    </div>

                    <form
                        action="{{ route('admin.grade.store', ['userId' => $response->user->id, 'taskId' => $response->task->id]) }}"
                        method="POST">
                        @csrf
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="addon-wrapping">Комментарий</span>
                            <input type="text" name="commentary" id="commentary" class="form-control"
                                   placeholder="Комментарий" value="{{  $response->commentary }}">
                        </div>

                        <div class="input-group mb-3">
                            <label class="input-group-text" for="grade">Оценка</label>
                            <select class="form-select" name="grade" id="grade">
                                @for ($i = 1; $i <= 5; $i++)
                                    <option
                                        {{ $response->grade == $i ? 'selected' : ''}}
                                        value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>

                        <div class="d-grid gap-2">
                            <button class="btn btn-outline-secondary" type="submit">Сохранить</button>
                        </div>
                    </form>

                </div>
            </li>
        @endif
    @empty
        <p>Никто ещё не выложил задания</p>
    @endforelse
</ul>
