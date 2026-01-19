<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PiGly</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/auth/weight_register.css') }}">
</head>
<body class="body">
    <form class="form-register" action="/register/step2" method="post">
        @csrf
        <div class="register-content">
            <div class="register-content__heading">
                <h1>PiGLy</h1>
                <h2>新規会員登録</h2>
                <p>STEP2 体重データの入力</p>
            </div>
            <div class="register-content-items">
                <label class="register-content__label">現在の体重</label>
                <input class="register-content__input"
                        type="number"
                        step="0.1"
                        name="weight"
                        value="{{ old('weight') }}"
                        placeholder="現在の体重を入力">
                <label class="register-content__label">目標の体重</label>
                <input class="register-content__input"
                        type="number"
                        name="target_weight"
                        value="{{ old('target_weight') }}"
                        placeholder="目標の体重を入力">
                
                <button class="register-button__submit" type="submit">アカウント作成</button>

            </div>
        </div>
    </form>

</body>
</html>
