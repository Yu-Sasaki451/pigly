<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css.sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/log/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/log/weight_set.css') }}">
</head>
<body class="body">
    @include('log.header')
    <main class="main">
        <form class="set-form" action="/weight_logs/goal_setting" method="post">
            @csrf
            @method('patch')
            <h2 class="set-form__title">目標体重設定</h2>
            <input class="set-form__input"
            type="text"
            step="0.1" name="target_weight"
            value="{{ $target_weight->target_weight }}"> kg
            <div class="pigly__error">
                    @error('target_weight')
                    {{ $message }}
                    @enderror
            </div>
            <div class="set-form__items">
                <a class="link-back" href="/weight_logs">戻る</a>
                <button class="set-form__button" type="submit">更新</button>
            </div>
        </form>
    </main>
</body>
</html>