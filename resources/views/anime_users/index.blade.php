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
            </style>
            <header>
                <!--<a href="/">アニメナビ</a>
                <a href="{{route('animes.search_get')}}">検索</a>
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
                                    @forelse($animes_mon as $anime_mon)
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
                                                <div class="anime-title" style="font-family: 'Kaisei Decol', serif; max-width: 170px; white-space: normal;"><!--white-space: normalでタイトルを自動改行-->{{ $anime->title }}</div>
                                            </div>
                                        </a>
                                    </div>
                                    @empty
                                    @endforelse
                                </td>
                                <td>
                                    <a href="{{route('animes.search_get')}}" style="white-space: nowrap; font-size: 25px; font-family: 'Yusei Magic', sans-serif;">追加する</a>
                                </td>
                            </tr> 
                            <tr>
                                <th style="background-color: #FFCC99; font-size: 30px;">火</th>
                                <td style="width: 100%; overflow-x: auto; white-space: nowrap; background-color: #FFFFFF;">
                                    @forelse($animes_tue as $anime_tue)
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
                                                <div class="anime-title" style="font-family: 'Kaisei Decol', serif; max-width: 170px; white-space: normal;"><!--white-space: normalでタイトルを自動改行-->{{ $anime->title }}</div>
                                            </div>
                                        </a>
                                    </div>
                                    @empty
                                    @endforelse
                                </td>
                                <td>
                                    <a href="{{route('animes.search_get')}}" style="white-space: nowrap; font-size: 25px; font-family: 'Yusei Magic', sans-serif;">追加する</a>
                                </td>
                            </tr>
                            <tr>
                                <th style="background-color: #99FFFF; font-size: 30px;">水</th>
                                <td style="width: 100%; overflow-x: auto; white-space: nowrap; background-color: #FFFFFF;">
                                    @forelse($animes_wed as $anime_wed)
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
                                                <div class="anime-title" style="font-family: 'Kaisei Decol', serif; max-width: 170px; white-space: normal;"><!--white-space: normalでタイトルを自動改行-->{{ $anime->title }}</div>
                                            </div>
                                        </a>
                                    </div>
                                    @empty
                                    @endforelse
                                </td>
                                <td>
                                    <a href="{{route('animes.search_get')}}" style="white-space: nowrap; font-size: 25px; font-family: 'Yusei Magic', sans-serif;">追加する</a>
                                </td>
                            </tr>
                            <tr>
                                <th style="background-color: #99FF99; font-size: 30px;">木</th>
                                <td style="width: 100%; overflow-x: auto; white-space: nowrap; background-color: #FFFFFF;">
                                    @forelse($animes_thu as $anime_thu)
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
                                                <div class="anime-title" style="font-family: 'Kaisei Decol', serif; max-width: 170px; white-space: normal;"><!--white-space: normalでタイトルを自動改行-->{{ $anime->title }}</div>
                                            </div>
                                        </a>
                                    </div>
                                    @empty
                                    @endforelse
                                </td>
                                <td>
                                    <a href="{{route('animes.search_get')}}" style="white-space: nowrap; font-size: 25px; font-family: 'Yusei Magic', sans-serif;">追加する</a>
                                </td>
                            </tr> 
                            <tr>
                                <th style="background-color: #FFFF99; font-size: 30px;">金</th>
                                <td style="width: 100%; overflow-x: auto; white-space: nowrap; background-color: #FFFFFF;">
                                    @forelse($animes_fri as $anime_fri)
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
                                                <div class="anime-title" style="font-family: 'Kaisei Decol', serif; max-width: 170px; white-space: normal;"><!--white-space: normalでタイトルを自動改行-->{{ $anime->title }}</div>
                                            </div>
                                        </a>
                                    </div>
                                    @empty
                                    @endforelse
                                </td>
                                <td>
                                    <a href="{{route('animes.search_get')}}" style="white-space: nowrap; font-size: 25px; font-family: 'Yusei Magic', sans-serif;">追加する</a>
                                </td>
                            </tr> 
                            <tr>
                                <th style="background-color: #DEB887; font-size: 30px;">土</th>
                                <td style="width: 100%; overflow-x: auto; white-space: nowrap; background-color: #FFFFFF;">
                                    @forelse($animes_sat as $anime_sat)
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
                                                <div class="anime-title" style="font-family: 'Kaisei Decol', serif; max-width: 170px; white-space: normal;"><!--white-space: normalでタイトルを自動改行-->{{ $anime->title }}</div>
                                            </div>
                                        </a>
                                    </div>
                                    @empty
                                    @endforelse
                                </td>
                                <td>
                                    <a href="{{route('animes.search_get')}}" style="white-space: nowrap; font-size: 25px; font-family: 'Yusei Magic', sans-serif;">追加する</a>
                                </td>
                            </tr> 
                            <tr>
                                <th style="background-color: #FFCCE5; font-size: 30px;">日</th>
                                <td style="width: 100%; overflow-x: auto; white-space: nowrap; background-color: #FFFFFF;">
                                    @forelse($animes_sun as $anime_sun)
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
                                                <div class="anime-title" style="font-family: 'Kaisei Decol', serif; max-width: 170px; white-space: normal;"><!--white-space: normalでタイトルを自動改行-->{{ $anime->title }}</div>
                                            </div>
                                        </a>
                                    </div>
                                    @empty
                                    @endforelse
                                </td>
                                <td>
                                    <a href="{{route('animes.search_get')}}" style="white-space: nowrap; font-size: 25px; font-family: 'Yusei Magic', sans-serif;">追加する</a>
                                </td>
                            </tr> 
                            <tr>
                                <th style="background-color: #FFFFFF; white-space: nowrap;">視聴中</th>
                                <td style="width: 100%; overflow-x: auto; white-space: nowrap; background-color: #FFFFFF;">
                                    @forelse($animes_non as $anime_non)
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
                                                <div class="anime-title" style="font-family: 'Kaisei Decol', serif; max-width: 170px; white-space: normal;"><!--white-space: normalでタイトルを自動改行-->{{ $anime->title }}</div>
                                            </div>
                                        </a>
                                    </div>
                                    @empty
                                    @endforelse
                                </td>
                                <td>
                                    <a href="{{route('animes.search_get')}}" style="white-space: nowrap; font-size: 25px; font-family: 'Yusei Magic', sans-serif;">追加する</a>
                                </td>
                            </tr> 
                            <tr>
                                <th style="background-color: #FFFFFF; white-space: nowrap;"><i class="fas fa-heart icon"></i></th>
                                <td style="width: 100%; overflow-x: auto; white-space: nowrap; background-color: #FFFFFF;"><!--overflow: autoであふれたときにスクロールバー表示-->
                                    @forelse($animes_like as $anime_like )
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
                                    <a href="{{route('animes.search_get')}}" style="white-space: nowrap; font-size: 25px; font-family: 'Yusei Magic', sans-serif;">追加する</a>
                                </td>
                            </tr> 
                        </tbody>
                     </table><br><br>
                </div>
            </div>
        </body>
    </html>
</x-app-layout>