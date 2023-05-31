<!DOCTYPE html>
<x-app-layout>
  <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
      <head>
          <meta charset="utf-8">
          <title>AnimeNavi</title>
          <!-- Fonts -->
          <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
          <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
          <link rel="preconnect" href="https://fonts.googleapis.com">
          <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
          <link href="https://fonts.googleapis.com/css2?family=Kaisei+Decol:wght@700&display=swap" rel="stylesheet">
          <style>
          table, td, th {
              /*border: 1px solid black; /* 枠線のスタイルを設定 */
              border-collapse: collapse; /* セルの境界線を結合 */
              padding: 10px;
          }
          .image {
              border: 1px solid #000000;
          }
          .like-btn {
               width:60px;
               height: 72px;
               font-size: 60px;
               color: #808080; 
               margin-left: 11px;
           }
          .unlike-btn {
               width: 60px;
               height: 70px;
               font-size: 60px;
               color: #e54747;
               margin-left: 11px;
          }
          .icon {
               width: 35px;
               height: 42px;
               font-size: 35px;
               color: #e54747;
               margin-top: 10px;
          }
          .custom-button {
            /* ボタンのスタイルを指定 */
            background-color: #4CAF50; /* 背景色 */
            border: none; /* ボーダーなし */
            color: white; /* テキストの色 */
            padding: 8px 16px; /* パディング */
            text-align: center; /* テキストの配置 */
            text-decoration: none; /* テキストの下線なし */
            display: inline-block; /* インラインブロック要素として表示 */
            font-size: 16px; /* フォントサイズ */
            cursor: pointer; /* カーソルの形状をポインターに */
          }
          </style>
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
                  <input class="custom-button" type="submit" value="検索">
                </form>
                
                {!! Form::open(['route' => ['search.post', 'class'=>'d-inline']]) !!}
                @forelse ($animes as $anime)
                {{Form::hidden('animes', $anime)}}
                @empty
                {!! Form::close()!!}
                @endforelse
            </div>
            <div class="table-responsive">
              <table class="table" style="margin-left: 15px;">
                    <tr>
                      <td>
                      @forelse($animes as $anime)
                      <div style="display: inline-block; margin-right: 10px; vertical-align: top;"><!--改行しない,右に10px,上側でそろえる -->
                        <a href="{{ route('animes.edit' , $anime) }}">
                          <div style="position: relative; float: left;">
                              <img class="image" width = "170", src="{{ Storage::disk('s3')->temporaryUrl($anime->img_path, now()->addDay()) }}" alt = "Image">
                              
                              <!--すべてのanime_idのどれかに一致するか検証，phpの内側で初期化しないとエラー-->
                              @php
                                  $liked = null;
                                  $liked = $anime_users->contains('anime_id', $anime->id);
                                  $anime = $anime;
                              @endphp
                              
                              @if($liked)
                                  <a href="{{ route('animes.search_unlike', ['anime'=>$anime])}}" style="position: absolute; top: 175px; right: 5px;">
                                      <i class="fas fa-heart unlike-btn"></i>
                                  </a>
                              @else
                                  <a href="{{ route('animes.search_like', ['anime'=>$anime])}}" style="position: absolute; top: 175px; right: 5px;">
                                      <i class="far fa-heart like-btn"></i>
                                  </a>
                              @endif
                              <div class="anime-title" style="font-family: 'Kaisei Decol', serif; overflow-wrap: break-word; width: 170px; white-space: normal;">{{ $anime->title }}</div>
                          </div>
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