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
                  <div><img width = "200", src="{{ Storage::disk('s3')->temporaryUrl($anime->img_path, now()->addDay()) }}" alt = "Image"></div>
                  <h1>{{$anime->title}}</h1>
                  <a href="{{route('search.session')}}">戻る</a>
              </div>
            </div>
        </body>
    </html>
</x-app-layout>