<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Code Learning </h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="list-group">
            <a href="{{ route('main') }}">
                <li class="list-group-item list-group-item-action">Главная</li>
            </a>

            <a href="{{ route('course') }}">
                <li class="list-group-item list-group-item-action">Ваши курсы</li>
            </a>

            @auth
                @if(Auth::user()->role == 1)
                    <a href="{{ route('admin.grade') }}">
                        <li class="list-group-item list-group-item-action">Оценка работ</li>
                    </a>

                    <a href="{{ route('admin.permission') }}">
                        <li class="list-group-item list-group-item-action">Доступ к курсам</li>
                    </a>
                @endif
            @endauth

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout')  }}"
                   onclick="event.preventDefault(); this.closest('form').submit();">
                    <button class="list-group-item list-group-item-action">{{ __('Выйти') }}</button>
                </a>
            </form>

            @auth
                <p class="text-center">Ваш прогресс</p>
                <div class="progress progress-striped active">
                    <div id="progress" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            @endauth
        </ul>
    </div>
</div>

<script>
    fetch('http://codelearning/api/completion')
        .then((response) => response.json())
        .then((data) => {
            let progress = document.getElementById('progress')
            progress.style = `width: ${data.completion}`
            progress.ariaValueNow = data.completion
        });
</script>
