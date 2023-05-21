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
            <div style="margin-top: 30px; margin-left: 25px;">
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
              <style>
                table, td, th {
                　border: 1px solid black; /* 枠線のスタイルを設定 */
                  border-collapse: collapse; /* セルの境界線を結合 */
                  padding: 10px;
                }
                .image {
                  border: 1px solid #000000;
                }
              </style>
              <table class="table" style="margin-left: 15px;">
                    <tr>
                      <td>
                      @forelse($animes as $anime)
                      <div style="display: inline-block; margin-right: 10px; vertical-align: top;"><!--改行しない,右に10px,上側でそろえる -->
                        <a href="{{ route('animes.edit' , $anime) }}">
                          <div><img class="image" width = "175", src="{{ Storage::disk('s3')->temporaryUrl($anime->img_path, now()->addDay()) }}" alt = "Image"></div>
                          <div style="overflow-wrap: break-word; width: 175px;">{{ $anime->title }}</div>
                        </a>
                      </div>
                      @empty
                    　検索条件に一致する作品はデータベースに登録されておりません.
                      @endforelse
                      </td>
                    </tr>
                  
              </table>
            </div>
          </div>
      </body>
  </html>
</x-app-layout>