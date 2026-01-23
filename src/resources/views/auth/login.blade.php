<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PiGly</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
</head>
<body class="body">
    <form class="form-register" action="/login" method="post">
        @csrf
        <div class="register-content">
            <div class="register-content__heading">
                <h1 class="header-title--main">PiGLy</h1>
                <h2 class="header-title--sub">ログイン</h2>
            </div>
            <div class="register-content-items">
                <label class="register-content__label">メールアドレス</label>
                <input class="register-content__input"
                        type="text"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="メールアドレスを入力">
                <div class="pigly__error">
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>
                <label class="register-content__label">パスワード</label>
                <input class="register-content__input"
                        type="password"
                        name="password"
                        placeholder="パスワードを入力">
                <div class="pigly__error">
                    @error('password')
                    {{ $message }}
                    @enderror
                </div>
                <button class="register-button__submit" type="submit">ログイン</button>
                <a class="link-login" href="/register/step1">アカウント作成はこちら</a>
            </div>
        </div>
    </form>

</body>
</html>
