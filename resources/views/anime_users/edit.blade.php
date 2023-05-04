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
            <a href="{{ route('animes.search')}}">検索</a>
            <a href="/ranking">ランキング</a>
            <a href="/board">掲示板</a>
        </header>
        <div>
          <h1>編集機能</h1>
          <div>
              <img width = "200", src="../storage/images/{{$anime->img_pass}}">
              <h1>{{$anime->title}}</h1>
              <a href="{{route('search.session')}}">戻る</a>
          </div>
        </div>
    </body>
</html>