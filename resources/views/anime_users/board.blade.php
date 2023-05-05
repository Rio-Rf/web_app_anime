<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>AnimeNavi</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <header>
            <a href="/">アニメナビ</a>
            <a href="{{route('animes.search_get')}}">検索</a>
            <a href="/ranking">ランキング</a>
            <a href="/board">掲示板</a>
        </header>
        <div>
          <h1>掲示板機能</h1>
        </div>
    </body>
</html>