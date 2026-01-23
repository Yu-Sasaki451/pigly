<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PiGly</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/auth/user_register.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
</head>
<body class="body">
    <form class="form-register" action="/register" method="post">
        @csrf
        <div class="register-content">
            <div class="register-content__heading">
                <h1 class="header-title--main">PiGLy</h1>
                <h2 class="header-title--sub">新規会員登録</h2>
                <p>STEP1 アカウント情報の登録</p>
            </div>
            <div class="register-content-items">
                <label class="register-content__label">お名前</label>
                <input class="register-content__input"
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="名前を入力">
                <div class="pigly__error">
                        @error('name')
                        {{ $message }}
                        @enderror
                </div>
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
                        value="{{ old('password') }}"
                        placeholder="パスワードを入力">
                <div class="pigly__error">
                        @error('password')
                        {{ $message }}
                        @enderror
                </div>
                <button class="register-button__submit" type="submit">次へ進む</button>
                <a class="link-login" href="/login">ログインはこちら</a>
            </div>
        </div>
    </form>

</body>
</html>
