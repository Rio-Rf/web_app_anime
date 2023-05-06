<!DOCTYPE html>
<x-app-layout>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <head>
            <meta charset="utf-8">
            <title>AnimeNavi</title>
            <!-- Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        </head>
        <body>
            <header>
            </header>
            <div>
              <h1>編集機能</h1>
              <div>
                  <img width = "400", src="../storage/images/{{$anime->img_pass}}">
                  <h1>{{$anime->title}}</h1>
                  <a href="{{route('search.session')}}">戻る</a>
              </div>
            </div>
        </body>
    </html>
</x-app-layout>