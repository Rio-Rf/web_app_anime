<!DOCTYPE html>
<x-app-layout>
  <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
      <head>
          <meta charset="utf-8">
          @section('title', '検索 | アニメナビ')
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
               animation: bounce 0.5s infinite;
           }
          .unlike-btn {
               width: 60px;
               height: 70px;
               font-size: 60px;
               color: #e54747;
               margin-left: 11px;
               animation: bounce 0.5s infinite;
          }
          @keyframes bounce {
              0% {
                  transform: translateY(0);
              }
              50% {
                  transform: translateY(-2.5px);
              }
              100% {
                  transform: translateY(0);
              }
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
          .day_of_week_choose{
            color: red;
            margin-top: 5px;
            margin-left: 20px;
          }
          .medium-logo {
             width:70px;
             height: 36px;
             background-color: #FFFFFF;
             margin-left: 11px;
             border: 2px solid #000000;
             border-radius: 4px;
             padding: 1px 2px;
             font-size: 14px;
             cursor: pointer;
          }
          </style>
      </head>
      <body>
          <header>
          </header>
          <div>
            <div style="margin-top: 30px; margin-left: 25px; width: 100%">
                <form action="{{ route('animes.search_post', ['day_of_week'=>request('day_of_week')]) }}" method="POST" enctype="multipart/form-data">
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
            <div>
              @if(request('day_of_week') == 'mon')
              <p class="day_of_week_choose">＊月曜日を選択しています</p>
              @elseif(request('day_of_week') == 'tue')
              <p class="day_of_week_choose">＊火曜日を選択しています</p>
              @elseif(request('day_of_week') == 'wed')
              <p class="day_of_week_choose">＊水曜日を選択しています</p>
              @elseif(request('day_of_week') == 'thu')
              <p class="day_of_week_choose">＊木曜日を選択しています</p>
              @elseif(request('day_of_week') == 'fri')
              <p class="day_of_week_choose">＊金曜日を選択しています</p>
              @elseif(request('day_of_week') == 'sat')
              <p class="day_of_week_choose">＊土曜日を選択しています</p>
              @elseif(request('day_of_week') == 'sun')
              <p class="day_of_week_choose">＊日曜日を選択しています</p>
              @else
              @endif
            <div class="table-responsive">
              <table class="table" style="margin-left: 15px;">
                    <tr>
                      <td>
                      @forelse($animes as $anime)
                      <div style="display: inline-block; margin-right: 10px; vertical-align: top;"><!--改行しない,右に10px,上側でそろえる -->
                        <a href="{{ route('animes.edit' , ['anime'=>$anime, 'day_of_week'=>request('day_of_week')]) }}"><!--クエリパラメータをバケツリレー-->
                          <div style="position: relative; float: left;">
                              <img class="image" width = "170", src="{{ Storage::disk('s3')->temporaryUrl($anime->img_path, now()->addDay()) }}" alt = "Image">
                              
                              <!--すべてのanime_idのどれかに一致するか検証，phpの内側で初期化しないとエラー-->
                              @php
                                  $liked = null;
                                  $liked = $anime_users->contains('anime_id', $anime->id);
                                  $anime = $anime;
                              @endphp
                              
                              @if($liked)
                                  <a href="#" class="unlike-btn" data-anime="{{ $anime->id }}" style="position: absolute; top: 165px; right: 5px;">
                                      <i class="fas fa-heart"></i>
                                  </a>
                              @else
                                  <a href="#" class="like-btn" data-anime="{{ $anime->id }}" style="position: absolute; top: 165px; right: 5px;">
                                      <i class="far fa-heart"></i>
                                  </a>
                              @endif
                              <!--firstでレコードを返すように指定-->
                              @php
                                  $anime_user_all = $anime_users_all->where('anime_id', $anime->id)->first();
                              @endphp
                              
                              @if($anime_user_all && $anime_user_all->medium == "amazon")<!--$anime_user_all && でnullを除外-->
                              <a href="https://www.Amazon.co.jp/primevideo" target="_blank">
                                  <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/amazon-prime-video-logo.svg', now()->addDay()) }}" alt = "Image">
                              </a>
                              @elseif($anime_user_all && $anime_user_all->medium == "netflix")
                              <a href="https://www.netflix.com" target="_blank">
                                  <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/netflix-logo.svg', now()->addDay()) }}" alt = "Image">
                              </a>
                              @elseif($anime_user_all && $anime_user_all->medium == "u-next")
                              <a href="https://video.unext.jp" target="_blank">
                                  <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/U-NEXT_logo_black.svg', now()->addDay()) }}" alt = "Image">
                              </a>
                              @elseif($anime_user_all && $anime_user_all->medium == "danime")
                              <a href="https://animestore.docomo.ne.jp" target="_blank">
                                  <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/danime-logo.svg', now()->addDay()) }}" alt = "Image">
                              </a>
                              @elseif($anime_user_all && $anime_user_all->medium == "abema")
                              <a href="https://abema.tv/video/genre/animation" target="_blank">
                                  <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/AbemaTV_logo.svg', now()->addDay()) }}" alt = "Image">
                              </a>
                              @elseif($anime_user_all && $anime_user_all->medium == "dazn")
                              <a href="https://www.dazn.com" target="_blank">
                                  <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/dazn.svg', now()->addDay()) }}" alt = "Image">
                              </a>
                              @elseif($anime_user_all && $anime_user_all->medium == "disney")
                              <a href="https://disneyplus.disney.co.jp" target="_blank">
                                  <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/Disney+_logo.svg', now()->addDay()) }}" alt = "Image">
                              </a>
                              @elseif($anime_user_all && $anime_user_all->medium == "hulu")
                              <a href="https://www.hulu.jp" target="_blank">
                                  <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/Hulu_logo.svg', now()->addDay()) }}" alt = "Image">
                              </a>
                              @elseif($anime_user_all && $anime_user_all->medium == "dTV")
                              <a href="https://video.dmkt-sp.jp/genre/genre-list/id/active_v009" target="_blank">
                                  <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/dTV-logo.svg', now()->addDay()) }}" alt = "Image">
                              </a>
                              @elseif($anime_user_all && $anime_user_all->medium == "hikari")
                              <a href="https://www.hikaritv.net" target="_blank">
                                  <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/hikaritv-logo.svg', now()->addDay()) }}" alt = "Image">
                              </a>
                              @elseif($anime_user_all && $anime_user_all->medium == "anitere")
                              <a href="https://www.tv-tokyo.co.jp/anime" target="_blank">
                                  <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/anitere-logo.svg', now()->addDay()) }}" alt = "Image">
                              </a>
                              @elseif($anime_user_all && $anime_user_all->medium == "bandai")
                              <a href="https://www.b-ch.com" target="_blank">
                                  <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/bandaichannel-logo.svg', now()->addDay()) }}" alt = "Image">
                              </a>
                              @elseif($anime_user_all && $anime_user_all->medium == "FOD")
                              <a href="https://fod.fujitv.co.jp" target="_blank">
                                  <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/fod_premium-logo.svg', now()->addDay()) }}" alt = "Image">
                              </a>
                              @else
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
          <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const unlikeBtns = document.querySelectorAll('.unlike-btn');
            
                    if (unlikeBtns) {
                        unlikeBtns.forEach(function(unlikeBtn) {
                            const unheartIcon = unlikeBtn.querySelector('i');

                            const indexunLikeUrl = "route('animes.search_unlike')";

                            unlikeBtn.addEventListener('click', function(event) {
                                event.preventDefault();
            
                                const animeId = unlikeBtn.dataset.anime;
            

                                fetch(`/search_unlike/${animeId}`)#ここをindexから変えていなかったのでserchに遷移していなかった

                                    .then(function(response) {
                                        if (response.ok) {
                                            return response.json();
                                        } else {
                                            throw new Error('Network response was not ok.');
                                        }
                                    })
                                    .then(function(data) {
                                        // ハートアイコンのクラスを切り替える
                                        unheartIcon.classList.toggle('fas');
                                        unheartIcon.classList.toggle('far');
                                        unlikeBtn.classList.toggle('unlike-btn');
                                        unlikeBtn.classList.toggle('like-btn');
                                    })
                                    .catch(function(error) {
                                        console.log('Error:', error);
                                    });
                            });
                        });
                    }
                });
            </script>
            
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const likeBtns = document.querySelectorAll('.like-btn');
            
                    if (likeBtns) {
                        likeBtns.forEach(function(likeBtn) {
                            const heartIcon = likeBtn.querySelector('i');

                            const indexLikeUrl = "route('animes.search_like')";
            
                            likeBtn.addEventListener('click', function(event) {
                                event.preventDefault();
            
                                const animeId = likeBtn.dataset.anime;
            

                                fetch(`/search_like/${animeId}`)

                                    .then(function(response) {
                                        if (response.ok) {
                                            return response.json();
                                        } else {
                                            throw new Error('Network response was not ok.');
                                        }
                                    })
                                    .then(function(data) {
                                        // ハートアイコンのクラスを切り替える
                                        heartIcon.classList.toggle('far');
                                        heartIcon.classList.toggle('fas');
                                        likeBtn.classList.toggle('like-btn');
                                        likeBtn.classList.toggle('unlike-btn');
                                    })
                                    .catch(function(error) {
                                        console.log('Error:', error);
                                    });
                            });
                        });
                    }
                });
            </script>
      </body>
  </html>
</x-app-layout>