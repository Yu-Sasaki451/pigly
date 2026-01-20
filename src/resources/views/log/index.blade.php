<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css.sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/log/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/log/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/paginate.css') }}">
</head>
<body class="body">
    @include('log.header')
    <div class="chunk-info">
        <div class="chunk-info__row">
            <label for="">目標体重</label>
            <p class="info-number">{{ $target_weight }}<span class="info-unit">kg</span></p>
        </div>
        <span class="info-separate">|</span>
        <div class="chunk-info__row">
            <label for="">目標まで</label>
            <p class="info-number">{{ $diff_target }}<span class="info-unit">kg</span></p>
        </div>
        <span class="info-separate">|</span>
        <div class="chunk-info__row">
            <label for="">最新体重</label>
            <p class="info-number">{{ $current_weight }}<span class="info-unit">kg</span></p>
        </div>
    </div>
    <form class="search-form" action="/weight_logs/search" method="post">
        <div class="search-form__inner">
            <div class="search-form__inner--left">
                <input class="search-form__date" type="date" name="date" value="{{request('date')}}">
                <span>〜</span>
                <input class="search-form__date" type="date" name="date" value="{{request('date')}}">
                <button class="search-form__button">検索</button>
            </div>

            <a class="add-link" href="/wight_logs/goal_setting">データ追加</a>
        </div>
        <table class="log-table">
            <tr class="table-row">
                <th class="col-date">日付</th>
                <th class="col-weight">体重</th>
                <th class="col-calories">食事摂取カロリー</th>
                <th class="col-time">運動時間</th>
                <th class="col-edit"></th>
            </tr>
            @foreach($weightLogs as $weightLog)
            <tr class="table-row">
                <td class="col-date">{{ $weightLog->date->format('Y/m/d') }}</td>
                <td class="col-weight">{{ $weightLog->weight }}kg</td>
                <td class="col-calories">{{ $weightLog->calories }}cal</td>
                <td class="col-time">{{ substr($weightLog->exercise_time,0,5) }}</td>
                <td class="col-edit">✏️</td>
            </tr>
            @endforeach
        </table>
        <div class="paginate">{{ $weightLogs->links('vendor.paginate') }}</div>
    </form>
    
</body>
</html>