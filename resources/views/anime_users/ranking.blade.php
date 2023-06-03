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
            <link href="https://fonts.googleapis.com/css2?family=Kaisei+Decol:wght@700&family=Yusei+Magic&display=swap" rel="stylesheet">
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
                 margin-left: 11px;
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
                 width: 35px;
                 height: 42px;
                 font-size: 35px;
                 color: #e54747;
                 margin-top: 10px;
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
            </style>
        </head>
        <body>
            <header>
            </header>
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
                                <a href="{{ route('animes.detail' , $animeRank) }}">
                                    <div style="position: relative; width: 200px;">
                                        <img class="image" width = "200", src="{{ Storage::disk('s3')->temporaryUrl($animeRank->img_path, now()->addDay()) }}" alt = "Image">
                                        
                                        <!--すべてのanime_idのどれかに一致するか検証，phpの内側で初期化しないとエラー-->
                                        @php
                                            $liked = null;
                                            $liked = $anime_users->contains('anime_id', $animeRank->id);
                                            $anime = $animeRank;
                                        @endphp
                                        
                                        @if($liked)
                                            <a href="{{ route('animes.ranking_unlike', ['anime'=>$anime])}}" style="position: absolute; top: 180px; right: 6px;">
                                                <i class="fas fa-heart unlike-btn"></i>
                                                <span style="font-size: 82px; color: white;">{{$animeRank->like_count}}</span>
                                            </a>
                                        @else
                                            <a href="{{ route('animes.ranking_like', ['anime'=>$anime])}}" style="position: absolute; top: 180px; right: 6px;">
                                                <i class="far fa-heart like-btn"></i>
                                                @if($animeRank->like_count != null)
                                                <span style="font-size: 82px; color: white;">{{$animeRank->like_count}}</span>
                                                @else
                                                <span style="font-size: 82px; color: white;">0</span>
                                                @endif
                                            </a>
                                        @endif
                                    </div>
                                </a>
                            </div>
                        </td>
                        <td>
                            <a href="{{ route('animes.detail' , $animeRank) }}">
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
        </body>
    </html>
</x-app-layout>