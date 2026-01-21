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
    <main class="edit">
        <form class="edit-form" id="edit-form"
        action="/weight_logs/{{ $weight_log->id }}/update" method="post">
        @csrf
        @method('patch')
            <div class="edit-form__content">
                <h2>Weight Log</h2>
                <label class="edit-form__label" for="">日付</label>
                <input class="edit-form__input" type="date" name="date" value="{{request('date')}}">
                <div class="edit__error">
                            @error('date')
                            {{ $message }}
                            @enderror
                </div>

                <label class="edit-form__label" for="">体重</label>
                <input class="edit-form__int" type="number" step="0.1" name="weight" value="{{ $weight_log->weight }}"> kg
                <div class="edit__error">
                            @error('weight')
                            {{ $message }}
                            @enderror
                </div>

                <label class="edit-form__label" for="">摂取カロリー</label>
                <input class="edit-form__int" type="text" name="calories" value="{{ $weight_log->calories }}"> cal
                <div class="edit__error">
                            @error('calories')
                            {{ $message }}
                            @enderror
                </div>

                <label class="edit-form__label" for="">運動時間</label>
                <input class="edit-form__input" type="time" name="exercise_time" value="{{ substr($weight_log->exercise_time,0,5) }}">
                <div class="edit__error">
                            @error('exercise_time')
                            {{ $message }}
                            @enderror
                </div>

                <label class="edit-form__label" for="">運動内容</label>
                <textarea class="edit-form__textarea" name="exercise_content">{{ $weight_log->exercise_content }}</textarea>
                <div class="edit__error">
                            @error('exercise_content')
                            {{ $message }}
                            @enderror
                </div>
            </div>
        </form>
        <div class="content__items">
            <div class="content-item--center">
                <a class="link-back" href="/weight_logs">戻る</a>
                <button class="update-button" type="submit" form="edit-form">更新</button>
            </div>
            <form class="delete-form" action="/weight_logs/{{ $weight_log->id }}/delete" method="post">
                @csrf
                @method('delete')
                <button class="delete-button" type="submit">
                    <img class="svg-trash" src="{{ asset('img/trash.svg') }}" alt="">
                </button>
            </form>
        </div>
    </main>