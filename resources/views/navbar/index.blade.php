<head>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script defer src="{{ asset('js/app.js') }}"></script>
</head>

@if (Route::has('login'))
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
        @auth
            <div class="flex gap-2">
                <p
                    class="btn btn-outline-secondary mr-2"
                    data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasExample"
                    aria-controls="offcanvasExample"
                >Меню
                </p>

                <p class="btn btn-outline-secondary text-sm text-gray-700 dark:text-gray-500 underline">Добро пожаловать {{ Auth::user()->name  }}</p>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="btn btn-outline-secondary text-sm text-gray-700 dark:text-gray-500 underline"
                       href="{{ route('logout')  }}"
                       onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Выйти') }}
                    </a>
                </form>

            </div>
        @else
            <a href="{{ route('login') }}" class="btn btn-outline-secondary text-sm text-gray-700 dark:text-gray-500 underline">Войти</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="btn btn-outline-secondary text-sm text-gray-700 dark:text-gray-500 underline">Регистрация</a>
            @endif
        @endauth
    </div>
@endif
