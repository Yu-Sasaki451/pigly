<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>体重更新</title>
    <link rel="stylesheet" href="{{ asset('css.sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/log/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/log/edit.css') }}">
</head>
<body class="body">
    @include('log.header')
    <form class="edit-form" action="">
        <div class="edit-form__content">
            <h2>Weight Log</h2>
            <label class="edit-form__label" for="">日付</label>
            <input class="edit-form__input" type="date" name="date" value="{{request('date')}}">

            <label class="edit-form__label" for="">体重</label>
            <input class="edit-form__int" type="text" placeholder="50.0"> kg

            <label class="edit-form__label" for="">摂取カロリー</label>
            <input class="edit-form__int" type="text" placeholder="1200"> cal

            <label class="edit-form__label" for="">運動時間</label>
            <input class="edit-form__input" type="time">

            <label class="edit-form__label" for="">運動内容</label>
            <input class="edit-form__text" type="text" placeholder="運動内容を追加">
        </div>
        <div class="content__items">
            <div class="content-item--center">
                <a class="link-back" href="/weight_logs">戻る</a>
                <button class="update-button">更新</button>
            </div>
            <div class="content-item--right">
                <form class="delete-form" action="" method="post">
                    @csrf
                    <input type="hidden">
                    <span>🗑️</span>
                </form>
            </div>
        </div>
    </form>