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
          <h1>検索機能</h1>
          <div>
              <form action="{{ route('animes.search') }}" method="GET">
                <input type="text" name="keyword" value="{{ $keyword }}">
                <input type="submit" value="検索">
              </form>
              {!! Form::open(['route' => ['search.post', 'class'=>'d-inline']]) !!}
              @foreach ($animes as $anime)
              {{Form::hidden('animes', $anime)}}
              @endforeach
              {!! Form::close()!!}
          </div>
          <table>
              @forelse ($animes as $anime)
                <tr>
                  <td><a href="{{ route('animes.edit' , $anime) }}">
                    <div><img width = "200", src="../storage/images/{{$anime->img_pass}}"></div>
                    <div>{{ $anime->title }}</div>
                  </a></td>
                </tr>
              @empty
                <td>検索条件に一致する作品はデータベースに登録されておりません.</td>
              @endforelse
          </table>
        </div>
    </body>
</html>