<header class="header">
    <h1 class="header__title">PiGLy</h1>
    <div class="header__content">
        <a class="header-link" href="/weight_logs/goal_setting">
            <img class="svg-gear" src="{{ asset('img/gear.svg') }}" alt="">
            目標体重設定
        </a>
        <form action="/logout" method="post">
            @csrf
            <button class="logout__button">
                <img class="svg-gear" src="{{ asset('img/logout.svg') }}" alt="">
                ログアウト
            </button>
        </form>
    </div>
</header>