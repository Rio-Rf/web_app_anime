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
            <h1>検索機能</h1>
            <div>
                <form action="{{ route('animes.search_post') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @if($keyword=="タイトルを入力してください．")
                  <input type="text" name="keyword" placeholder= {{$keyword}} >
                  @elseif($keyword==null)
                  <input type="text" name="keyword" placeholder= "タイトルを入力してください．" >
                  @else
                  <input type="text" name="keyword" value= {{$keyword}} >
                  @endif
                  <input type="submit" value="検索">
                </form>
                
                {!! Form::open(['route' => ['search.post', 'class'=>'d-inline']]) !!}
                @forelse ($animes as $anime)
                {{Form::hidden('animes', $anime)}}
                @empty
                {!! Form::close()!!}
                @endforelse
            </div>
            <div class="table-responsive">
              <table class="table">
                    <tr>
                      @forelse($animes as $anime)
                      <td><a href="{{ route('animes.edit' , $anime) }}">
                        <div><img class="image" width = "200", height = "282", src="{{ Storage::disk('s3')->temporaryUrl($anime->img_path, now()->addDay()) }}" alt = "Image"></div>
                        <div>{{ $anime->title }}</div>
                      </a></td>
                      @empty
                    　<td>検索条件に一致する作品はデータベースに登録されておりません.</td>
                      @endforelse
                    </tr>
                  
              </table>
            </div>
          </div>
      </body>
  </html>
</x-app-layout>