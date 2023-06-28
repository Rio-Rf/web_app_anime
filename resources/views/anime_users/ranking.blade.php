<!DOCTYPE html>
<x-app-layout>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <head>
            <meta charset="utf-8">
            @section('title', 'ランキング | アニメナビ')
            <!-- Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
            <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Kaisei+Decol:wght@700&family=Potta+One&family=Yusei+Magic&display=swap" rel="stylesheet">
            <style>
            table, td, th {
                border: 5px solid white; /* 枠線のスタイルを設定 */
                border-collapse: collapse; /* セルの境界線を結合 */
                padding: 10px;
            }
            td:last-child {
                font-size: 30px;
                color: #FFFFFF;
                background-color: #000000;
                font-family: 'Kaisei Decol', serif;
                overflow-wrap: break-word;
                width: 100%;
                white-space: normal;
            }
            .image {
                border: 1px solid #000000;
            }
            .like-btn {
                 width:70px;
                 height: 83px;
                 font-size: 72px;
                 color: #808080; 
                 margin-left: 51px;
                 animation: bounce 0.5s infinite;
             }
            .unlike-btn {
                 width: 70px;
                 height: 83px;
                 font-size: 72px;
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
            .icon {
                 width: 100px;
                 height: 120px;
                 font-size: 100px;
                 color: #e54747;
                 margin-top: 10px;
                 margin-right: 15px;
            }
            .paginate {
              display: flex;
              justify-content: center;
              margin-top: 30px;
              padding-bottom:50px;
            }
            
            .paginate ul {
              display: flex;
              list-style: none;
              padding: 0;
              margin: 0;
            }
            
            .paginate li {
              margin-right: 10px;
            }
            
            .paginate li a {
              display: block;
              padding: 5px 10px;
              text-decoration: none;
              background-color: #EEEEEE;
              color: #000000;
            }
            
            .paginate li.active a {
              background-color: #000000;
              color: #FFFFFF;
            }
            .medium-logo {
             width:81px;
             height: 42px;
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
            <div style="display: flex; justify-content: center; margin-top: 20px; background-color: #FFFFFF;">
                <i class="fas fa-heart icon"></i>
                <p style="font-family: 'Potta One', cursive; font-size: 80px;">数ランキング!!</p>
            </div>
            <table style="margin-top: 30px; margin-right: 15px; margin-left: 15px;">
                <tbody>
                    <!--<tr>
                        <th style="background-color: #E5CCFF; font-size: 30px;">順位</th>
                        <td>イメージ</td>
                        <td style="background-color: #FFFFFF;">タイトル</td>
                    </tr>-->
                    <!--1ページ目では変数の初期化，2ページ目以降はpass-->
                    @php
                        $page = $animeRanks->currentPage();
                        if($page >= 2){
                            //
                        }else{
                            $before_like_count = -1;
                            $count = 0;
                        }
                    @endphp
                    @forelse($animeRanks as $animeRank)
                    <!--like_counのnullと0は同じ扱いにする-->
                    @php
                        if($animeRank->like_count == $before_like_count || $animeRank->like_count == null && $before_like_count==0){ 
                            //
                        }else{
                            $count++;
                        }
                        $before_like_count = $animeRank->like_count;
                    @endphp
                    <tr>
                        <th style="background-color: #000000; position: relative; width: 100px;">
                        @if($count == 1)
                        <i class="fas fa-trophy fa-beat" style="color: #FFD700; width: 80px; font-size: 72px;"></i>
                        <div style="font-family: 'Yusei Magic', sans-serif; color: #FFFFFF; font-size: 40px; position: absolute; top: 46%; left: 50%; transform: translate(-50%, -50%);">{{$count}}</div>
                        @elseif($count == 2)
                        <i class="fas fa-trophy fa-beat" style="color: #C0C0C0; width: 80px; font-size: 72px;"></i>
                        <div style="font-family: 'Yusei Magic', sans-serif; color: #FFFFFF; font-size: 40px; position: absolute; top: 46%; left: 51%; transform: translate(-50%, -50%);">{{$count}}</div>
                        @elseif($count == 3)
                        <i class="fas fa-trophy fa-beat" style="color: #B87333; width: 80px; font-size: 72px;"></i>
                        <div style="font-family: 'Yusei Magic', sans-serif; color: #FFFFFF; font-size: 40px; position: absolute; top: 46%; left: 50%; transform: translate(-50%, -50%);">{{$count}}</div>
                        @else
                        <div style="elsed-color: #000000; color: #FFFFFF; font-size: 60px; font-family: 'Yusei Magic', sans-serif; width: 100px;">{{$count}}</div>
                        @endif
                        </th>
                        <td style="background-color: #000000;">
                            <div>
                                <a href="{{ route('animes.edit' , $animeRank) }}">
                                    <div style="position: relative; width: 200px;">
                                        <img class="image" width = "200", src="{{ Storage::disk('s3')->temporaryUrl($animeRank->img_path, now()->addDay()) }}" alt = "Image">
                                        
                                        <!--すべてのanime_idのどれかに一致するか検証，phpの内側で初期化しないとエラー-->
                                        @php
                                            $liked = null;
                                            $liked = $anime_users->contains('anime_id', $animeRank->id);
                                            $anime = $animeRank;
                                        @endphp
                                        
                                        @if($liked)
                                        <div class="heart-container" style="position: absolute; top: 180px; right: 6px;">
                                            <a href="#" class="unlike-btn" data-anime="{{ $anime->id }}">
                                                <i class="fas fa-heart"></i>
                                                <span style="font-size: 82px; color: white;">{{$animeRank->like_count}}</span>
                                            </a>
                                        </div>
                                        @else
                                        <div class="heart-container" style="position: absolute; top: 180px; right: 6px;">
                                            <a href="#" class="like-btn" data-anime="{{ $anime->id }}">
                                                <i class="far fa-heart"></i>
                                                @if($animeRank->like_count != null)
                                                <span style="font-size: 82px; color: white;">{{$animeRank->like_count}}</span>
                                                @else
                                                <span style="font-size: 82px; color: white;">0</span>
                                                @endif
                                            </a>
                                        </div>
                                        @endif
                                        
                                        @php
                                            $anime_user_all = $anime_users_all->where('anime_id', $animeRank->id)->first();
                                        @endphp
                                          
                                        @if($anime_user_all && $anime_user_all->medium == "amazon")<!--$anime_user_all && でnullを除外-->
                                        <a href="https://www.Amazon.co.jp/primevideo" target="_blank">
                                            <img class="medium-logo" style="position: absolute; top: 6px; right: 113px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/amazon-prime-video-logo.svg', now()->addDay()) }}" alt = "Image">
                                        </a>
                                        @elseif($anime_user_all && $anime_user_all->medium == "netflix")
                                        <a href="https://www.netflix.com" target="_blank">
                                            <img class="medium-logo" style="position: absolute; top: 6px; right: 113px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/netflix-logo.svg', now()->addDay()) }}" alt = "Image">
                                        </a>
                                        @elseif($anime_user_all && $anime_user_all->medium == "u-next")
                                        <a href="https://video.unext.jp" target="_blank">
                                             <img class="medium-logo" style="position: absolute; top: 6px; right: 113px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/U-NEXT_logo_black.svg', now()->addDay()) }}" alt = "Image">
                                        </a>
                                        @elseif($anime_user_all && $anime_user_all->medium == "danime")
                                        <a href="https://animestore.docomo.ne.jp" target="_blank">
                                            <img class="medium-logo" style="position: absolute; top: 6px; right: 113px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/danime-logo.svg', now()->addDay()) }}" alt = "Image">
                                        </a>
                                        @elseif($anime_user_all && $anime_user_all->medium == "abema")
                                        <a href="https://abema.tv/video/genre/animation" target="_blank">
                                            <img class="medium-logo" style="position: absolute; top: 6px; right: 113px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/AbemaTV_logo.svg', now()->addDay()) }}" alt = "Image">
                                        </a>
                                        @elseif($anime_user_all && $anime_user_all->medium == "dazn")
                                        <a href="https://www.dazn.com" target="_blank">
                                            <img class="medium-logo" style="position: absolute; top: 6px; right: 113px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/dazn.svg', now()->addDay()) }}" alt = "Image">
                                        </a>
                                        @elseif($anime_user_all && $anime_user_all->medium == "disney")
                                        <a href="https://disneyplus.disney.co.jp" target="_blank">
                                            <img class="medium-logo" style="position: absolute; top: 6px; right: 113px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/Disney+_logo.svg', now()->addDay()) }}" alt = "Image">
                                        </a>
                                        @elseif($anime_user_all && $anime_user_all->medium == "hulu")
                                        <a href="https://www.hulu.jp" target="_blank">
                                            <img class="medium-logo" style="position: absolute; top: 6px; right: 113px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/Hulu_logo.svg', now()->addDay()) }}" alt = "Image">
                                        </a>
                                        @elseif($anime_user_all && $anime_user_all->medium == "dTV")
                                        <a href="https://video.dmkt-sp.jp/genre/genre-list/id/active_v009" target="_blank">
                                            <img class="medium-logo" style="position: absolute; top: 6px; right: 113px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/dTV-logo.svg', now()->addDay()) }}" alt = "Image">
                                        </a>
                                        @elseif($anime_user_all && $anime_user_all->medium == "hikari")
                                        <a href="https://www.hikaritv.net" target="_blank">
                                            <img class="medium-logo" style="position: absolute; top: 6px; right: 113px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/hikaritv-logo.svg', now()->addDay()) }}" alt = "Image">
                                        </a>
                                        @elseif($anime_user_all && $anime_user_all->medium == "anitere")
                                        <a href="https://www.tv-tokyo.co.jp/anime" target="_blank">
                                            <img class="medium-logo" style="position: absolute; top: 6px; right: 113px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/anitere-logo.svg', now()->addDay()) }}" alt = "Image">
                                        </a>
                                        @elseif($anime_user_all && $anime_user_all->medium == "bandai")
                                        <a href="https://www.b-ch.com" target="_blank">
                                            <img class="medium-logo" style="position: absolute; top: 6px; right: 113px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/bandaichannel-logo.svg', now()->addDay()) }}" alt = "Image">
                                        </a>
                                        @elseif($anime_user_all && $anime_user_all->medium == "FOD")
                                        <a href="https://fod.fujitv.co.jp" target="_blank">
                                            <img class="medium-logo" style="position: absolute; top: 6px; right: 113px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/fod_premium-logo.svg', now()->addDay()) }}" alt = "Image">
                                        </a>
                                        @else
                                        @endif
                                    </div>
                                </a>
                            </div>
                        </td>
                        <td>
                            <a href="{{ route('animes.edit' , $animeRank) }}">
                                <div class="anime-title">{{ $anime->title }}</div>
                            </a>
                        </td>
                    </tr>
                    
                    @empty
                    @endforelse
                </tbody>
            </table>
            <div class='paginate' >
            {{ $animeRanks->appends(['before_like_count' => $before_like_count, 'count' => $count ])->links('vendor.pagination.tailwind2') }} <!--'vendor.pagination.tailwind2'の設定を使用-->
            </div>
            <script>
              document.addEventListener('DOMContentLoaded', function() {
                const unlikeBtns = document.querySelectorAll('.unlike-btn');
            
                if (unlikeBtns) {
                  unlikeBtns.forEach(function(unlikeBtn) {
                    const unheartIcon = unlikeBtn.querySelector('i');
                    const spanElement = unlikeBtn.querySelector('span');
                    const indexunLikeUrl = "{{ route('animes.ranking_unlike', ['anime'=>$anime]) }}";
            
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
                    const indexLikeUrl = "{{ route('animes.ranking_like', ['anime'=>$anime]) }}";
            
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