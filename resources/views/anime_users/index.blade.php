<!DOCTYPE html>
<x-app-layout>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <head>
            <meta charset="utf-8">
            @section('title', '一覧 | アニメナビ')
            <!-- Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
            <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Kaisei+Decol:wght@700&family=Yusei+Magic&display=swap" rel="stylesheet">
        </head>
        <body>
            <style>
            table, td, th {
                border: 2px solid black; /* 枠線のスタイルを設定 */
                border-collapse: collapse; /* セルの境界線を結合 */
                padding: 10px;
            }
            
            td:last-child {
                text-align: right; /* 最後のセル内のテキストを右寄せにする */
                background-color: #F5F5F5;
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
                 height: 72px;
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
            .icon {
                 width: 35px;
                 height: 42px;
                 font-size: 35px;
                 color: #e54747;
                 margin-top: 10px;
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
            <header>
                <!--<a href="/">アニメナビ</a>
                <a href="{{route('animes.search_get', ['day_of_week' => 'mon'])}}">検索</a>
                <a href="/ranking">ランキング</a>
                <a href="/board">掲示板</a>-->
            </header>
            <div class='myanimes'>
                <div class='myanimes'>
                    
                    <table style="margin-top: 30px; margin-right: 15px; margin-left: 15px;">
                        <tbody>
                            <tr>
                                <th style="background-color: #E5CCFF; font-size: 30px;">月</th>
                                <td style="width: 100%; overflow-x: auto; white-space: nowrap; background-color: #FFFFFF;">
                                    <!--$animes_monと$anime_user_monの周期を同じにする-->
                                    @forelse($animes_mon as $key => $anime_mon)
                                    @php
                                        $anime_user_mon = $anime_users_mon[$key] ?? null;
                                    @endphp
                                    <div style="display: inline-block; margin-right: 10px; vertical-align: top;">
                                        <a href="{{ route('animes.detail' , $anime_mon) }}">
                                            <div style="position: relative; float: left;">
                                                <img class="image" width = "170", src="{{ Storage::disk('s3')->temporaryUrl($anime_mon->img_path, now()->addDay()) }}" alt = "Image">
                                                
                                                <!--すべてのanime_idのどれかに一致するか検証，phpの内側で初期化しないとエラー-->
                                                @php
                                                    $liked = null;
                                                    $liked = $anime_users->contains('anime_id', $anime_mon->id);
                                                    $anime = $anime_mon;
                                                @endphp
                                                
                                                @if($liked)
                                                    <a href="{{ route('animes.index_unlike', ['anime'=>$anime])}}" style="position: absolute; top: 175px; right: 5px;">
                                                        <i class="fas fa-heart unlike-btn"></i>
                                                    </a>
                                                @else
                                                    <a href="{{ route('animes.index_like', ['anime'=>$anime])}}" style="position: absolute; top: 175px; right: 5px;">
                                                        <i class="far fa-heart like-btn"></i>
                                                    </a>
                                                @endif
                                
                                                @if($anime_user_mon->medium == "amazon")
                                                <a href="https://www.Amazon.co.jp/primevideo" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/amazon-prime-video-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_mon->medium == "netflix")
                                                <a href="https://www.netflix.com" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/netflix-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_mon->medium == "u-next")
                                                <a href="https://video.unext.jp" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/U-NEXT_logo_black.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_mon->medium == "danime")
                                                <a href="https://animestore.docomo.ne.jp" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/danime-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_mon->medium == "abema")
                                                <a href="https://abema.tv/video/genre/animation" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/AbemaTV_logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_mon->medium == "dazn")
                                                <a href="https://www.dazn.com" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/dazn.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_mon->medium == "disney")
                                                <a href="https://disneyplus.disney.co.jp" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/Disney+_logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_mon->medium == "hulu")
                                                <a href="https://www.hulu.jp" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/Hulu_logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_mon->medium == "dTV")
                                                <a href="https://video.dmkt-sp.jp/genre/genre-list/id/active_v009" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/dTV-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_mon->medium == "hikari")
                                                <a href="https://www.hikaritv.net" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/hikaritv-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_mon->medium == "anitere")
                                                <a href="https://www.tv-tokyo.co.jp/anime" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/anitere-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_mon->medium == "bandai")
                                                <a href="https://www.b-ch.com" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/bandaichannel-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_mon->medium == "FOD")
                                                <a href="https://fod.fujitv.co.jp" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/fod_premium-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @else
                                                @endif
                                                
                                                <div class="anime-title" style="font-family: 'Kaisei Decol', serif; max-width: 170px; white-space: normal;"><!--white-space: normalでタイトルを自動改行-->{{ $anime->title }}</div>
                                            </div>
                                        </a>
                                    </div>
                                    @empty
                                    @endforelse
                                </td>
                                <td><!--クエリパラメータで曜日を指定-->
                                    <a href="{{route('animes.search_get', ['day_of_week' => 'mon'])}}" style="white-space: nowrap; font-size: 25px; font-family: 'Yusei Magic', sans-serif;">追加する</a>
                                </td>
                            </tr> 
                            <tr>
                                <th style="background-color: #FFCC99; font-size: 30px;">火</th>
                                <td style="width: 100%; overflow-x: auto; white-space: nowrap; background-color: #FFFFFF;">
                                    @forelse($animes_tue as $key => $anime_tue)
                                    @php
                                        $anime_user_tue = $anime_users_tue[$key] ?? null;
                                    @endphp
                                    <div style="display: inline-block; margin-right: 10px; vertical-align: top;">
                                        <a href="{{ route('animes.detail' , $anime_tue) }}">
                                            <div style="position: relative; float: left;">
                                                <img class="image" width = "170", src="{{ Storage::disk('s3')->temporaryUrl($anime_tue->img_path, now()->addDay()) }}" alt = "Image">
                                                
                                                <!--すべてのanime_idのどれかに一致するか検証，phpの内側で初期化しないとエラー-->
                                                @php
                                                    $liked = null;
                                                    $liked = $anime_users->contains('anime_id', $anime_tue->id);
                                                    $anime = $anime_tue;
                                                @endphp
                                                
                                                @if($liked)
                                                    <a href="{{ route('animes.index_unlike', ['anime'=>$anime])}}" style="position: absolute; top: 175px; right: 5px;">
                                                        <i class="fas fa-heart unlike-btn"></i>
                                                    </a>
                                                @else
                                                    <a href="{{ route('animes.index_like', ['anime'=>$anime])}}" style="position: absolute; top: 175px; right: 5px;">
                                                        <i class="far fa-heart like-btn"></i>
                                                    </a>
                                                @endif
                                                
                                                @if($anime_user_tue->medium == "amazon")
                                                <a href="https://www.Amazon.co.jp/primevideo" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/amazon-prime-video-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_tue->medium == "netflix")
                                                <a href="https://www.netflix.com" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/netflix-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_tue->medium == "u-next")
                                                <a href="https://video.unext.jp" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/U-NEXT_logo_black.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_tue->medium == "danime")
                                                <a href="https://animestore.docomo.ne.jp" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/danime-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_tue->medium == "abema")
                                                <a href="https://abema.tv/video/genre/animation" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/AbemaTV_logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_tue->medium == "dazn")
                                                <a href="https://www.dazn.com" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/dazn.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_tue->medium == "disney")
                                                <a href="https://disneyplus.disney.co.jp" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/Disney+_logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_tue->medium == "hulu")
                                                <a href="https://www.hulu.jp" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/Hulu_logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_tue->medium == "dTV")
                                                <a href="https://video.dmkt-sp.jp/genre/genre-list/id/active_v009" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/dTV-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_tue->medium == "hikari")
                                                <a href="https://www.hikaritv.net" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/hikaritv-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_tue->medium == "anitere")
                                                <a href="https://www.tv-tokyo.co.jp/anime" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/anitere-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_tue->medium == "bandai")
                                                <a href="https://www.b-ch.com" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/bandaichannel-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_tue->medium == "FOD")
                                                <a href="https://fod.fujitv.co.jp" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/fod_premium-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @else
                                                @endif
                                                <div class="anime-title" style="font-family: 'Kaisei Decol', serif; max-width: 170px; white-space: normal;"><!--white-space: normalでタイトルを自動改行-->{{ $anime->title }}</div>
                                            </div>
                                        </a>
                                    </div>
                                    @empty
                                    @endforelse
                                </td>
                                <td>
                                    <a href="{{route('animes.search_get', ['day_of_week' => 'tue'])}}" style="white-space: nowrap; font-size: 25px; font-family: 'Yusei Magic', sans-serif;">追加する</a>
                                </td>
                            </tr>
                            <tr>
                                <th style="background-color: #99FFFF; font-size: 30px;">水</th>
                                <td style="width: 100%; overflow-x: auto; white-space: nowrap; background-color: #FFFFFF;">
                                    @forelse($animes_wed as $key => $anime_wed)
                                    @php
                                        $anime_user_wed = $anime_users_wed[$key] ?? null;
                                    @endphp
                                    <div style="display: inline-block; margin-right: 10px; vertical-align: top;">
                                        <a href="{{ route('animes.detail' , $anime_wed) }}">
                                            <div style="position: relative; float: left;">
                                                <img class="image" width = "170", src="{{ Storage::disk('s3')->temporaryUrl($anime_wed->img_path, now()->addDay()) }}" alt = "Image">
                                                
                                                <!--すべてのanime_idのどれかに一致するか検証，phpの内側で初期化しないとエラー-->
                                                @php
                                                    $liked = null;
                                                    $liked = $anime_users->contains('anime_id', $anime_wed->id);
                                                    $anime = $anime_wed;
                                                @endphp
                                                
                                                @if($liked)
                                                    <a href="{{ route('animes.index_unlike', ['anime'=>$anime])}}" style="position: absolute; top: 175px; right: 5px;">
                                                        <i class="fas fa-heart unlike-btn"></i>
                                                    </a>
                                                @else
                                                    <a href="{{ route('animes.index_like', ['anime'=>$anime])}}" style="position: absolute; top: 175px; right: 5px;">
                                                        <i class="far fa-heart like-btn"></i>
                                                    </a>
                                                @endif
                                                
                                                @if($anime_user_wed->medium == "amazon")
                                                <a href="https://www.Amazon.co.jp/primevideo" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/amazon-prime-video-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_wed->medium == "netflix")
                                                <a href="https://www.netflix.com" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/netflix-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_wed->medium == "u-next")
                                                <a href="https://video.unext.jp" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/U-NEXT_logo_black.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_wed->medium == "danime")
                                                <a href="https://animestore.docomo.ne.jp" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/danime-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_wed->medium == "abema")
                                                <a href="https://abema.tv/video/genre/animation" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/AbemaTV_logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_wed->medium == "dazn")
                                                <a href="https://www.dazn.com" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/dazn.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_wed->medium == "disney")
                                                <a href="https://disneyplus.disney.co.jp" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/Disney+_logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_wed->medium == "hulu")
                                                <a href="https://www.hulu.jp" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/Hulu_logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_wed->medium == "dTV")
                                                <a href="https://video.dmkt-sp.jp/genre/genre-list/id/active_v009" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/dTV-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_wed->medium == "hikari")
                                                <a href="https://www.hikaritv.net" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/hikaritv-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_wed->medium == "anitere")
                                                <a href="https://www.tv-tokyo.co.jp/anime" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/anitere-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_wed->medium == "bandai")
                                                <a href="https://www.b-ch.com" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/bandaichannel-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_wed->medium == "FOD")
                                                <a href="https://fod.fujitv.co.jp" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/fod_premium-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @else
                                                @endif
                                                <div class="anime-title" style="font-family: 'Kaisei Decol', serif; max-width: 170px; white-space: normal;"><!--white-space: normalでタイトルを自動改行-->{{ $anime->title }}</div>
                                            </div>
                                        </a>
                                    </div>
                                    @empty
                                    @endforelse
                                </td>
                                <td>
                                    <a href="{{route('animes.search_get', ['day_of_week' => 'wed'])}}" style="white-space: nowrap; font-size: 25px; font-family: 'Yusei Magic', sans-serif;">追加する</a>
                                </td>
                            </tr>
                            <tr>
                                <th style="background-color: #99FF99; font-size: 30px;">木</th>
                                <td style="width: 100%; overflow-x: auto; white-space: nowrap; background-color: #FFFFFF;">
                                    @forelse($animes_thu as $key => $anime_thu)
                                    @php
                                        $anime_user_thu = $anime_users_thu[$key] ?? null;
                                    @endphp
                                    <div style="display: inline-block; margin-right: 10px; vertical-align: top;">
                                        <a href="{{ route('animes.detail' , $anime_thu) }}">
                                            <div style="position: relative; float: left;">
                                                <img class="image" width = "170", src="{{ Storage::disk('s3')->temporaryUrl($anime_thu->img_path, now()->addDay()) }}" alt = "Image">
                                                
                                                <!--すべてのanime_idのどれかに一致するか検証，phpの内側で初期化しないとエラー-->
                                                @php
                                                    $liked = null;
                                                    $liked = $anime_users->contains('anime_id', $anime_thu->id);
                                                    $anime = $anime_thu;
                                                @endphp
                                                
                                                @if($liked)
                                                    <a href="{{ route('animes.index_unlike', ['anime'=>$anime])}}" style="position: absolute; top: 175px; right: 5px;">
                                                        <i class="fas fa-heart unlike-btn"></i>
                                                    </a>
                                                @else
                                                    <a href="{{ route('animes.index_like', ['anime'=>$anime])}}" style="position: absolute; top: 175px; right: 5px;">
                                                        <i class="far fa-heart like-btn"></i>
                                                    </a>
                                                @endif
                                                
                                                @if($anime_user_thu->medium == "amazon")
                                                <a href="https://www.Amazon.co.jp/primevideo" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/amazon-prime-video-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_thu->medium == "netflix")
                                                <a href="https://www.netflix.com" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/netflix-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_thu->medium == "u-next")
                                                <a href="https://video.unext.jp" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/U-NEXT_logo_black.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_thu->medium == "danime")
                                                <a href="https://animestore.docomo.ne.jp" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/danime-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_thu->medium == "abema")
                                                <a href="https://abema.tv/video/genre/animation" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/AbemaTV_logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_thu->medium == "dazn")
                                                <a href="https://www.dazn.com" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/dazn.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_thu->medium == "disney")
                                                <a href="https://disneyplus.disney.co.jp" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/Disney+_logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_thu->medium == "hulu")
                                                <a href="https://www.hulu.jp" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/Hulu_logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_thu->medium == "dTV")
                                                <a href="https://video.dmkt-sp.jp/genre/genre-list/id/active_v009" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/dTV-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_thu->medium == "hikari")
                                                <a href="https://www.hikaritv.net" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/hikaritv-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_thu->medium == "anitere")
                                                <a href="https://www.tv-tokyo.co.jp/anime" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/anitere-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_thu->medium == "bandai")
                                                <a href="https://www.b-ch.com" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/bandaichannel-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_thu->medium == "FOD")
                                                <a href="https://fod.fujitv.co.jp" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/fod_premium-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @else
                                                @endif
                                                <div class="anime-title" style="font-family: 'Kaisei Decol', serif; max-width: 170px; white-space: normal;"><!--white-space: normalでタイトルを自動改行-->{{ $anime->title }}</div>
                                            </div>
                                        </a>
                                    </div>
                                    @empty
                                    @endforelse
                                </td>
                                <td>
                                    <a href="{{route('animes.search_get', ['day_of_week' => 'thu'])}}" style="white-space: nowrap; font-size: 25px; font-family: 'Yusei Magic', sans-serif;">追加する</a>
                                </td>
                            </tr> 
                            <tr>
                                <th style="background-color: #FFFF99; font-size: 30px;">金</th>
                                <td style="width: 100%; overflow-x: auto; white-space: nowrap; background-color: #FFFFFF;">
                                    @forelse($animes_fri as $key => $anime_fri)
                                    @php
                                        $anime_user_fri = $anime_users_fri[$key] ?? null;
                                    @endphp
                                    <div style="display: inline-block; margin-right: 10px; vertical-align: top;">
                                        <a href="{{ route('animes.detail' , $anime_fri) }}">
                                            <div style="position: relative; float: left;">
                                                <img class="image" width = "170", src="{{ Storage::disk('s3')->temporaryUrl($anime_fri->img_path, now()->addDay()) }}" alt = "Image">
                                                
                                                <!--すべてのanime_idのどれかに一致するか検証，phpの内側で初期化しないとエラー-->
                                                @php
                                                    $liked = null;
                                                    $liked = $anime_users->contains('anime_id', $anime_fri->id);
                                                    $anime = $anime_fri;
                                                @endphp
                                                
                                                @if($liked)
                                                    <a href="{{ route('animes.index_unlike', ['anime'=>$anime])}}" style="position: absolute; top: 175px; right: 5px;">
                                                        <i class="fas fa-heart unlike-btn"></i>
                                                    </a>
                                                @else
                                                    <a href="{{ route('animes.index_like', ['anime'=>$anime])}}" style="position: absolute; top: 175px; right: 5px;">
                                                        <i class="far fa-heart like-btn"></i>
                                                    </a>
                                                @endif
                                                
                                                @if($anime_user_fri->medium == "amazon")
                                                <a href="https://www.Amazon.co.jp/primevideo" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/amazon-prime-video-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_fri->medium == "netflix")
                                                <a href="https://www.netflix.com" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/netflix-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_fri->medium == "u-next")
                                                <a href="https://video.unext.jp" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/U-NEXT_logo_black.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_fri->medium == "danime")
                                                <a href="https://animestore.docomo.ne.jp" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/danime-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_fri->medium == "abema")
                                                <a href="https://abema.tv/video/genre/animation" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/AbemaTV_logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_fri->medium == "dazn")
                                                <a href="https://www.dazn.com" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/dazn.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_fri->medium == "disney")
                                                <a href="https://disneyplus.disney.co.jp" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/Disney+_logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_fri->medium == "hulu")
                                                <a href="https://www.hulu.jp" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/Hulu_logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_fri->medium == "dTV")
                                                <a href="https://video.dmkt-sp.jp/genre/genre-list/id/active_v009" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/dTV-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_fri->medium == "hikari")
                                                <a href="https://www.hikaritv.net" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/hikaritv-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_fri->medium == "anitere")
                                                <a href="https://www.tv-tokyo.co.jp/anime" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/anitere-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_fri->medium == "bandai")
                                                <a href="https://www.b-ch.com" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/bandaichannel-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_fri->medium == "FOD")
                                                <a href="https://fod.fujitv.co.jp" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/fod_premium-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @else
                                                @endif
                                                <div class="anime-title" style="font-family: 'Kaisei Decol', serif; max-width: 170px; white-space: normal;"><!--white-space: normalでタイトルを自動改行-->{{ $anime->title }}</div>
                                            </div>
                                        </a>
                                    </div>
                                    @empty
                                    @endforelse
                                </td>
                                <td>
                                    <a href="{{route('animes.search_get', ['day_of_week' => 'fri'])}}" style="white-space: nowrap; font-size: 25px; font-family: 'Yusei Magic', sans-serif;">追加する</a>
                                </td>
                            </tr> 
                            <tr>
                                <th style="background-color: #DEB887; font-size: 30px;">土</th>
                                <td style="width: 100%; overflow-x: auto; white-space: nowrap; background-color: #FFFFFF;">
                                    @forelse($animes_sat as $key => $anime_sat)
                                    @php
                                        $anime_user_sat = $anime_users_sat[$key] ?? null;
                                    @endphp
                                    <div style="display: inline-block; margin-right: 10px; vertical-align: top;">
                                        <a href="{{ route('animes.detail' , $anime_sat) }}">
                                            <div style="position: relative; float: left;">
                                                <img class="image" width = "170", src="{{ Storage::disk('s3')->temporaryUrl($anime_sat->img_path, now()->addDay()) }}" alt = "Image">
                                                
                                                <!--すべてのanime_idのどれかに一致するか検証，phpの内側で初期化しないとエラー-->
                                                @php
                                                    $liked = null;
                                                    $liked = $anime_users->contains('anime_id', $anime_sat->id);
                                                    $anime = $anime_sat;
                                                @endphp
                                                
                                                @if($liked)
                                                    <a href="{{ route('animes.index_unlike', ['anime'=>$anime])}}" style="position: absolute; top: 175px; right: 5px;">
                                                        <i class="fas fa-heart unlike-btn"></i>
                                                    </a>
                                                @else
                                                    <a href="{{ route('animes.index_like', ['anime'=>$anime])}}" style="position: absolute; top: 175px; right: 5px;">
                                                        <i class="far fa-heart like-btn"></i>
                                                    </a>
                                                @endif
                                                
                                                @if($anime_user_sat->medium == "amazon")
                                                <a href="https://www.Amazon.co.jp/primevideo" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/amazon-prime-video-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_sat->medium == "netflix")
                                                <a href="https://www.netflix.com" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/netflix-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_sat->medium == "u-next")
                                                <a href="https://video.unext.jp" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/U-NEXT_logo_black.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_sat->medium == "danime")
                                                <a href="https://animestore.docomo.ne.jp" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/danime-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_sat->medium == "abema")
                                                <a href="https://abema.tv/video/genre/animation" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/AbemaTV_logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_sat->medium == "dazn")
                                                <a href="https://www.dazn.com" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/dazn.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_sat->medium == "disney")
                                                <a href="https://disneyplus.disney.co.jp" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/Disney+_logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_sat->medium == "hulu")
                                                <a href="https://www.hulu.jp" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/Hulu_logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_sat->medium == "dTV")
                                                <a href="https://video.dmkt-sp.jp/genre/genre-list/id/active_v009" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/dTV-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_sat->medium == "hikari")
                                                <a href="https://www.hikaritv.net" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/hikaritv-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_sat->medium == "anitere")
                                                <a href="https://www.tv-tokyo.co.jp/anime" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/anitere-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_sat->medium == "bandai")
                                                <a href="https://www.b-ch.com" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/bandaichannel-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_sat->medium == "FOD")
                                                <a href="https://fod.fujitv.co.jp" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/fod_premium-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @else
                                                @endif
                                                <div class="anime-title" style="font-family: 'Kaisei Decol', serif; max-width: 170px; white-space: normal;"><!--white-space: normalでタイトルを自動改行-->{{ $anime->title }}</div>
                                            </div>
                                        </a>
                                    </div>
                                    @empty
                                    @endforelse
                                </td>
                                <td>
                                    <a href="{{route('animes.search_get', ['day_of_week' => 'sat'])}}" style="white-space: nowrap; font-size: 25px; font-family: 'Yusei Magic', sans-serif;">追加する</a>
                                </td>
                            </tr> 
                            <tr>
                                <th style="background-color: #FFCCE5; font-size: 30px;">日</th>
                                <td style="width: 100%; overflow-x: auto; white-space: nowrap; background-color: #FFFFFF;">
                                    @forelse($animes_sun as $key => $anime_sun)
                                    @php
                                        $anime_user_sun = $anime_users_sun[$key] ?? null;
                                    @endphp
                                    <div style="display: inline-block; margin-right: 10px; vertical-align: top;">
                                        <a href="{{ route('animes.detail' , $anime_sun) }}">
                                            <div style="position: relative; float: left;">
                                                <img class="image" width = "170", src="{{ Storage::disk('s3')->temporaryUrl($anime_sun->img_path, now()->addDay()) }}" alt = "Image">
                                                
                                                <!--すべてのanime_idのどれかに一致するか検証，phpの内側で初期化しないとエラー-->
                                                @php
                                                    $liked = null;
                                                    $liked = $anime_users->contains('anime_id', $anime_sun->id);
                                                    $anime = $anime_sun;
                                                @endphp
                                                
                                                @if($liked)
                                                    <a href="{{ route('animes.index_unlike', ['anime'=>$anime])}}" style="position: absolute; top: 175px; right: 5px;">
                                                        <i class="fas fa-heart unlike-btn"></i>
                                                    </a>
                                                @else
                                                    <a href="{{ route('animes.index_like', ['anime'=>$anime])}}" style="position: absolute; top: 175px; right: 5px;">
                                                        <i class="far fa-heart like-btn"></i>
                                                    </a>
                                                @endif
                                                
                                                @if($anime_user_sun->medium == "amazon")
                                                <a href="https://www.Amazon.co.jp/primevideo" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/amazon-prime-video-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_sun->medium == "netflix")
                                                <a href="https://www.netflix.com" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/netflix-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_sun->medium == "u-next")
                                                <a href="https://video.unext.jp" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/U-NEXT_logo_black.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_sun->medium == "danime")
                                                <a href="https://animestore.docomo.ne.jp" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/danime-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_sun->medium == "abema")
                                                <a href="https://abema.tv/video/genre/animation" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/AbemaTV_logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_sun->medium == "dazn")
                                                <a href="https://www.dazn.com" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/dazn.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_sun->medium == "disney")
                                                <a href="https://disneyplus.disney.co.jp" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/Disney+_logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_sun->medium == "hulu")
                                                <a href="https://www.hulu.jp" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/Hulu_logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_sun->medium == "dTV")
                                                <a href="https://video.dmkt-sp.jp/genre/genre-list/id/active_v009" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/dTV-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_sun->medium == "hikari")
                                                <a href="https://www.hikaritv.net" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/hikaritv-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_sun->medium == "anitere")
                                                <a href="https://www.tv-tokyo.co.jp/anime" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/anitere-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_sun->medium == "bandai")
                                                <a href="https://www.b-ch.com" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/bandaichannel-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_sun->medium == "FOD")
                                                <a href="https://fod.fujitv.co.jp" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/fod_premium-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @else
                                                @endif
                                                <div class="anime-title" style="font-family: 'Kaisei Decol', serif; max-width: 170px; white-space: normal;"><!--white-space: normalでタイトルを自動改行-->{{ $anime->title }}</div>
                                            </div>
                                        </a>
                                    </div>
                                    @empty
                                    @endforelse
                                </td>
                                <td>
                                    <a href="{{route('animes.search_get', ['day_of_week' => 'sun'])}}" style="white-space: nowrap; font-size: 25px; font-family: 'Yusei Magic', sans-serif;">追加する</a>
                                </td>
                            </tr> 
                            <tr>
                                <th style="background-color: #FFFFFF; white-space: nowrap;">視聴中</th>
                                <td style="width: 100%; overflow-x: auto; white-space: nowrap; background-color: #FFFFFF;">
                                    @forelse($animes_non as $key => $anime_non)
                                    @php
                                        $anime_user_non = $anime_users_non[$key] ?? null;
                                    @endphp
                                    <div style="display: inline-block; margin-right: 10px; vertical-align: top;">
                                        <a href="{{ route('animes.detail' , $anime_non) }}">
                                            <div style="position: relative; float: left;">
                                                <img class="image" width = "170", src="{{ Storage::disk('s3')->temporaryUrl($anime_non->img_path, now()->addDay()) }}" alt = "Image">
                                                
                                                <!--すべてのanime_idのどれかに一致するか検証，phpの内側で初期化しないとエラー-->
                                                @php
                                                    $liked = null;
                                                    $liked = $anime_users->contains('anime_id', $anime_non->id);
                                                    $anime = $anime_non;
                                                @endphp
                                                
                                                @if($liked)
                                                    <a href="{{ route('animes.index_unlike', ['anime'=>$anime])}}" style="position: absolute; top: 175px; right: 5px;">
                                                        <i class="fas fa-heart unlike-btn"></i>
                                                    </a>
                                                @else
                                                    <a href="{{ route('animes.index_like', ['anime'=>$anime])}}" style="position: absolute; top: 175px; right: 5px;">
                                                        <i class="far fa-heart like-btn"></i>
                                                    </a>
                                                @endif
                                                
                                                @if($anime_user_non->medium == "amazon")
                                                <a href="https://www.Amazon.co.jp/primevideo" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/amazon-prime-video-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_non->medium == "netflix")
                                                <a href="https://www.netflix.com" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/netflix-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_non->medium == "u-next")
                                                <a href="https://video.unext.jp" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/U-NEXT_logo_black.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_non->medium == "danime")
                                                <a href="https://animestore.docomo.ne.jp" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/danime-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_non->medium == "abema")
                                                <a href="https://abema.tv/video/genre/animation" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/AbemaTV_logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_non->medium == "dazn")
                                                <a href="https://www.dazn.com" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/dazn.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_non->medium == "disney")
                                                <a href="https://disneyplus.disney.co.jp" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/Disney+_logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_non->medium == "hulu")
                                                <a href="https://www.hulu.jp" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/Hulu_logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_non->medium == "dTV")
                                                <a href="https://video.dmkt-sp.jp/genre/genre-list/id/active_v009" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/dTV-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_non->medium == "hikari")
                                                <a href="https://www.hikaritv.net" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/hikaritv-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_non->medium == "anitere")
                                                <a href="https://www.tv-tokyo.co.jp/anime" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/anitere-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_non->medium == "bandai")
                                                <a href="https://www.b-ch.com" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/bandaichannel-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_non->medium == "FOD")
                                                <a href="https://fod.fujitv.co.jp" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/fod_premium-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @else
                                                @endif
                                                <div class="anime-title" style="font-family: 'Kaisei Decol', serif; max-width: 170px; white-space: normal;"><!--white-space: normalでタイトルを自動改行-->{{ $anime->title }}</div>
                                            </div>
                                        </a>
                                    </div>
                                    @empty
                                    @endforelse
                                </td>
                                <td>
                                    <a href="{{route('animes.search_get', ['day_of_week' => 'non'])}}" style="white-space: nowrap; font-size: 25px; font-family: 'Yusei Magic', sans-serif;">追加する</a>
                                </td>
                            </tr> 
                            <tr>
                                <th style="background-color: #FFFFFF; white-space: nowrap;"><i class="fas fa-heart icon"></i></th>
                                <td style="width: 100%; overflow-x: auto; white-space: nowrap; background-color: #FFFFFF;"><!--overflow: autoであふれたときにスクロールバー表示-->
                                    @forelse($animes_like as $key => $anime_like)
                                    @php
                                        $anime_user_like = $anime_users_like[$key] ?? null;
                                    @endphp
                                    <div style="display: inline-block; margin-right: 10px; vertical-align: top;"><!--inlineで横並び-->
                                        <a href="{{ route('animes.detail' , $anime_like) }}">
                                            <div style="position: relative; float: left;">
                                                <img class="image" width = "170" src="{{ Storage::disk('s3')->temporaryUrl($anime_like->img_path, now()->addDay()) }}" alt = "Image">
                                                
                                                <!--すべてのanime_idのどれかに一致するか検証，phpの内側で初期化しないとエラー-->
                                                @php
                                                    $liked = null;
                                                    $liked = $anime_users->contains('anime_id', $anime_like->id);
                                                    $anime = $anime_like;
                                                @endphp
                                                
                                                @if($liked)
                                                    <a href="{{ route('animes.index_unlike', ['anime'=>$anime])}}" style="position: absolute; top: 175px; right: 5px;">
                                                        <i class="fas fa-heart unlike-btn"></i>
                                                    </a>
                                                @else
                                                    <a href="{{ route('animes.index_like', ['anime'=>$anime])}}" style="position: absolute; top: 175px; right: 5px;">
                                                        <i class="far fa-heart like-btn"></i>
                                                    </a>
                                                @endif
                                                
                                                @if($anime_user_like->medium == "amazon")
                                                <a href="https://www.Amazon.co.jp/primevideo" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/amazon-prime-video-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_like->medium == "netflix")
                                                <a href="https://www.netflix.com" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/netflix-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_like->medium == "u-next")
                                                <a href="https://video.unext.jp" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/U-NEXT_logo_black.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_like->medium == "danime")
                                                <a href="https://animestore.docomo.ne.jp" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/danime-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_like->medium == "abema")
                                                <a href="https://abema.tv/video/genre/animation" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/AbemaTV_logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_like->medium == "dazn")
                                                <a href="https://www.dazn.com" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/dazn.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_like->medium == "disney")
                                                <a href="https://disneyplus.disney.co.jp" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/Disney+_logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_like->medium == "hulu")
                                                <a href="https://www.hulu.jp" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/Hulu_logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_like->medium == "dTV")
                                                <a href="https://video.dmkt-sp.jp/genre/genre-list/id/active_v009" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/dTV-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_like->medium == "hikari")
                                                <a href="https://www.hikaritv.net" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/hikaritv-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_like->medium == "anitere")
                                                <a href="https://www.tv-tokyo.co.jp/anime" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/anitere-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_like->medium == "bandai")
                                                <a href="https://www.b-ch.com" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/bandaichannel-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @elseif($anime_user_like->medium == "FOD")
                                                <a href="https://fod.fujitv.co.jp" target="_blank">
                                                    <img class="medium-logo" style="position: absolute; top: 5px; right: 95px;" src="{{ Storage::disk('s3')->temporaryUrl('medium_logo/fod_premium-logo.svg', now()->addDay()) }}" alt = "Image">
                                                </a>
                                                @else
                                                @endif
                                                <!--white-space: normalでタイトルを自動改行,overflow-wrap: break-word;を含んでいたためスクロールバーが表示されなかった-->
                                                <div class="anime-title" style="font-family: 'Kaisei Decol', serif; max-width: 170px; white-space: normal;">
                                                    {{ $anime->title }}
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    @empty
                                    @endforelse
                                </td>
                                <td>
                                    <a href="{{route('animes.search_get', ['day_of_week' => 'non'])}}" style="white-space: nowrap; font-size: 25px; font-family: 'Yusei Magic', sans-serif;">追加する</a>
                                </td>
                            </tr> 
                        </tbody>
                     </table><br><br>
                </div>
            </div>
        </body>
    </html>
</x-app-layout>