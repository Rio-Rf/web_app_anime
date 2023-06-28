<!DOCTYPE html>
<x-app-layout>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <head>
            <meta charset="utf-8">
            @section('title', '詳細 | アニメナビ')
            <!-- Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
            <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Kaisei+Decol:wght@700&display=swap" rel="stylesheet">
            <style>
            table, td, th {
                border: 1px solid black; /* 枠線のスタイルを設定 */
                border-collapse: collapse; /* セルの境界線を結合 */
                padding: 10px;
                background-color: #FFFFFF;
            }
            .like-btn {
                 width:85px;
                 height: 102px;
                 font-size: 85px;
                 color: #808080; 
                 margin-left: 20px;
                 animation: bounce 0.5s infinite;
             }
            .unlike-btn {
                 width: 85px;
                 height: 102px;
                 font-size: 85px;
                 color: #e54747;
                 margin-left: 20px;
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
            .medium-logo {
                 width:100px;
                 height: 51px;
                 background-color: #FFFFFF;
                 margin-left: 15px;
                 border: 3px solid #000000;
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
              <div style="margin-top: 30px;">
                <div style="position: relative; float: left; margin-right: 30px; margin-left: 5px;">
                    <img width = "300", src="{{ Storage::disk('s3')->temporaryUrl($anime->img_path, now()->addDay()) }}" alt = "Image"　align="left" style="float: left; margin-right: 50px; margin-left: 30px; border: 1px solid #000000;">
                    
                    @if($anime_user->like == 1)
                    <div class="heart-container" style="position: absolute; top: 290px; right: 60px;">
                        <a href="#" class="unlike-btn" data-anime="{{ $anime->id }}">
                            <i class="fas fa-heart"></i>
                            <span style="font-size: 100px; color: white;">{{$like_count}}</span>
                        </a>
                    </div>
                    @else
                    <div class="heart-container" style="position: absolute; top: 290px; right: 60px;">
                        <a href="#" class="like-btn" data-anime="{{ $anime->id }}">
                            <i class="far fa-heart"></i>
                            <span style="font-size: 100px; color: white;">{{$like_count}}</span>
                        </a>
                    </div>
                    @endif
                    
                    @if($anime_user->medium == "amazon")
                    <a href="https://www.Amazon.co.jp/primevideo" target="_blank">
                        <img class="medium-logo" style="position: absolute; top: 7px; right: 242px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/amazon-prime-video-logo.svg', now()->addDay()) }}" alt = "Image">
                    </a>
                    @elseif($anime_user->medium == "netflix")
                    <a href="https://www.netflix.com" target="_blank">
                        <img class="medium-logo" style="position: absolute; top: 7px; right: 242px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/netflix-logo.svg', now()->addDay()) }}" alt = "Image">
                    </a>
                    @elseif($anime_user->medium == "u-next")
                    <a href="https://video.unext.jp" target="_blank">
                        <img class="medium-logo" style="position: absolute; top: 7px; right: 242px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/U-NEXT_logo_black.svg', now()->addDay()) }}" alt = "Image">
                    </a>
                    @elseif($anime_user->medium == "danime")
                    <a href="https://animestore.docomo.ne.jp" target="_blank">
                        <img class="medium-logo" style="position: absolute; top: 7px; right: 242px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/danime-logo.svg', now()->addDay()) }}" alt = "Image">
                    </a>
                    @elseif($anime_user->medium == "abema")
                    <a href="https://abema.tv/video/genre/animation" target="_blank">
                        <img class="medium-logo" style="position: absolute; top: 7px; right: 242px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/AbemaTV_logo.svg', now()->addDay()) }}" alt = "Image">
                    </a>
                    @elseif($anime_user->medium == "dazn")
                    <a href="https://www.dazn.com" target="_blank">
                        <img class="medium-logo" style="position: absolute; top: 7px; right: 242px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/dazn.svg', now()->addDay()) }}" alt = "Image">
                    </a>
                    @elseif($anime_user->medium == "disney")
                    <a href="https://disneyplus.disney.co.jp" target="_blank">
                        <img class="medium-logo" style="position: absolute; top: 7px; right: 242px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/Disney+_logo.svg', now()->addDay()) }}" alt = "Image">
                    </a>
                    @elseif($anime_user->medium == "hulu")
                    <a href="https://www.hulu.jp" target="_blank">
                        <img class="medium-logo" style="position: absolute; top: 7px; right: 242px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/Hulu_logo.svg', now()->addDay()) }}" alt = "Image">
                    </a>
                    @elseif($anime_user->medium == "dTV")
                    <a href="https://video.dmkt-sp.jp/genre/genre-list/id/active_v009" target="_blank">
                        <img class="medium-logo" style="position: absolute; top: 7px; right: 242px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/dTV-logo.svg', now()->addDay()) }}" alt = "Image">
                    </a>
                    @elseif($anime_user->medium == "hikari")
                    <a href="https://www.hikaritv.net" target="_blank">
                        <img class="medium-logo" style="position: absolute; top: 7px; right: 242px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/hikaritv-logo.svg', now()->addDay()) }}" alt = "Image">
                    </a>
                    @elseif($anime_user->medium == "anitere")
                    <a href="https://www.tv-tokyo.co.jp/anime" target="_blank">
                        <img class="medium-logo" style="position: absolute; top: 7px; right: 242px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/anitere-logo.svg', now()->addDay()) }}" alt = "Image">
                    </a>
                    @elseif($anime_user->medium == "bandai")
                    <a href="https://www.b-ch.com" target="_blank">
                        <img class="medium-logo" style="position: absolute; top: 7px; right: 242px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/bandaichannel-logo.svg', now()->addDay()) }}" alt = "Image">
                    </a>
                    @elseif($anime_user->medium == "FOD")
                    <a href="https://fod.fujitv.co.jp" target="_blank">
                        <img class="medium-logo" style="position: absolute; top: 7px; right: 242px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/fod_premium-logo.svg', now()->addDay()) }}" alt = "Image">
                    </a>
                    @else
                    @endif
                </div>
                <table>
                        <tbody>
                            <tr>
                                <th>タイトル</th>
                                <td style="font-family: 'Kaisei Decol', serif; font-size: 30px;">{{$anime->title}}</td>
                            </tr> 
                            <tr>
                                <th>放送クール</th>
                                <td>{{$anime->on_air_season}}</td>
                            </tr>
                            <tr>
                                <th>曜日</th>
                                <td>
                                    @if ($anime_user->day_of_week == "mon")
                                    月曜日
                                    @elseif ($anime_user->day_of_week == "tue")
                                    火曜日
                                    @elseif ($anime_user->day_of_week == "wed")
                                    水曜日
                                    @elseif ($anime_user->day_of_week == "thu")
                                    木曜日
                                    @elseif ($anime_user->day_of_week == "fri")
                                    金曜日
                                    @elseif ($anime_user->day_of_week == "sat")
                                    土曜日
                                    @elseif ($anime_user->day_of_week == "sun")
                                    日曜日
                                    @elseif ($anime_user->day_of_week == "non")
                                    指定なし
                                    @else
                                    指定なし
                                    @endif
                                    
                                </td>
                            </tr> 
                            <tr>
                                <th>時刻</th>
                                <td>
                                    {{$anime_user->hours}}時{{$anime_user->minutes}}分
                                </td>
                            </tr> 
                            <tr>
                                <th>視聴媒体</th>
                                <td>
                                    @if ($anime_user->medium == "none")
                                    指定なし
                                    @elseif ($anime_user->medium == "amazon")
                                    Amazon Prime Video
                                    @elseif ($anime_user->medium == "netflix")
                                    Netflix
                                    @elseif ($anime_user->medium == "u-next")
                                    U-NEXT
                                    @elseif ($anime_user->medium == "danime")
                                    dアニメストア
                                    @elseif ($anime_user->medium == "abema")
                                    ABEMA
                                    @elseif ($anime_user->medium == "dazn")
                                    DAZN
                                    @elseif ($anime_user->medium == "disney")
                                    Disney+
                                    @elseif ($anime_user->medium == "hulu")
                                    Hulu
                                    @elseif ($anime_user->medium == "dTV")
                                    dTV
                                    @elseif ($anime_user->medium == "hikari")
                                    ひかりTV
                                    @elseif ($anime_user->medium == "anitere")
                                    あにてれ
                                    @elseif ($anime_user->medium == "bandai")
                                    バンダイチャンネル
                                    @elseif ($anime_user->medium == "FOD")
                                    FODプレミアム
                                    @else
                                    @endif
                                </td>
                            </tr> 
                            <tr>
                                <th>公式サイト</th>
                                <td><a href = {{$anime->official_url}} target="_blank">{{$anime->official_url}}</a></td>
                            </tr> 
                        </tbody>
                    </table>
                <a href="{{ route('animes.edit', $anime) }}" style="margin-top: 20px; margin-right: 30px; float: left; background-color: #3490dc; border: none; border-radius: 4px;">
                    編集する
                </a>
                <form action="{{ route('animes.delete', $anime) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" style="margin-top: 20px; margin-right: 30px; float: left; background-color: #3490dc; border: none; border-radius: 4px;">一覧から削除する</button>
                </form>
                </div>
            </div>
            <script>
              document.addEventListener('DOMContentLoaded', function() {
                const unlikeBtns = document.querySelectorAll('.unlike-btn');
            
                if (unlikeBtns) {
                  unlikeBtns.forEach(function(unlikeBtn) {
                    const unheartIcon = unlikeBtn.querySelector('i');
                    const spanElement = unlikeBtn.querySelector('span');
                    const indexunLikeUrl = "{{ route('animes.detail_unlike', ['anime'=>$anime]) }}";
            
                    unlikeBtn.addEventListener('click', function(event) {
                      event.preventDefault();
            
                      const animeId = unlikeBtn.dataset.anime;
            
                      fetch(`/index_unlike/${animeId}`)
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
            
                          // spanの値を更新して表示
                          const currentValue = parseInt(spanElement.innerText);
                          if (unlikeBtn.classList.contains('like-btn')) {
                            spanElement.innerText = currentValue - 1;
                          } else {
                            spanElement.innerText = Math.max(currentValue + 1, 0);
                          }
                        })
                        .catch(function(error) {
                          console.log('Error:', error);
                        });
                    });
                  });
                }
              });
            
              document.addEventListener('DOMContentLoaded', function() {
                const likeBtns = document.querySelectorAll('.like-btn');
            
                if (likeBtns) {
                  likeBtns.forEach(function(likeBtn) {
                    const heartIcon = likeBtn.querySelector('i');
                    const spanElement = likeBtn.querySelector('span');
                    const indexLikeUrl = "{{ route('animes.detail_like', ['anime'=>$anime]) }}";
            
                    likeBtn.addEventListener('click', function(event) {
                      event.preventDefault();
            
                      const animeId = likeBtn.dataset.anime;
            
                      fetch(`/index_like/${animeId}`)
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
            
                          // spanの値を更新して表示
                          const currentValue = parseInt(spanElement.innerText);
                          if (likeBtn.classList.contains('unlike-btn')) {
                            spanElement.innerText = currentValue + 1;
                          } else {
                            spanElement.innerText = currentValue - 1;
                          }
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