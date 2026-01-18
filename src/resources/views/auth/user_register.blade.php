<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PiGly</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/auth/user_register.css') }}">
</head>
<body class="body">
    <form class="form-register" action="/register" method="post">
        @csrf
        <div class="register-content">
            <div class="register-content__heading">
                <h1>PiGLy</h1>
                <h2>新規会員登録</h2>
                <p>STEP1 アカウント情報の登録</p>
            </div>
            <div class="register-content-items">
                <label class="register-content__label">お名前</label>
                <input class="register-content__input"
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        placeholder="名前を入力">
                <label class="register-content__label">メールアドレス</label>
                <input class="register-content__input"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="メールアドレスを入力">
                <label class="register-content__label">パスワード</label>
                <input class="register-content__input"
                        type="password"
                        name="password"
                        value="{{ old('password') }}"
                        placeholder="パスワードを入力">
                
                <button class="register-button__submit" type="submit">次へ進む</button>
                <a class="link-login" href="/login">ログインはこちら</a>
            </div>
        </div>
    </form>

</body>
</html>
