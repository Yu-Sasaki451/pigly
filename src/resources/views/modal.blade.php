<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>体重更新</title>
    <link rel="stylesheet" href="{{ asset('css.sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/modal.css') }}">
</head>
<body class="body">
        <form class="modal-form" action="/weight_logs/create" method="post">
        @csrf
            <div class="modal-form__content">
                <h2 class="content-title">Weight Logを追加</h2>
                <label class="modal-form__label" for="">日付<span> 必須</span></label>
                <input class="modal-form__input" type="date" name="date" value="{{request('date')}}">

                <label class="modal-form__label" for="">体重<span> 必須</span></label>
                <input class="modal-form__int" type="number" step="0.1" name="weight" value="{{ old('weight') }}" placeholder="50.0"> kg

                <label class="modal-form__label" for="">摂取カロリー<span> 必須</span></label>
                <input class="modal-form__int" type="number" name="calories" value="{{ old('calories') }}" placeholder="1200"> cal

                <label class="modal-form__label"class="edit-form__label" for="">運動時間<span> 必須</span></label>
                <input class="modal-form__input" type="time" name="exercise_time" value="{{ old('exercise_time') }}">

                <label class="modal-form__label" for="">運動内容</label>
                <textarea class="modal-form__textarea" name="exercise_content" value="{{ old('exercise_content') }}"></textarea>
            </div>
            <div class="content-item">
                <a class="link-back" href="/weight_logs">戻る</a>
                <button class="store-button" type="submit">登録</button>
            </div>
        </form>