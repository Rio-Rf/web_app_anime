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
                <!--<a href="/">アニメナビ</a>
                <a href="{{route('animes.search_get')}}">検索</a>
                <a href="/ranking">ランキング</a>
                <a href="/board">掲示板</a>-->
            </header>
            <div class='myanimes'>
                <div class='myanimes'>
                    <style>
                      table, td, th {
                        border: 1px solid black; /* 枠線のスタイルを設定 */
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
                    </style>
                    <table style="margin-top: 30px; margin-right: 15px; margin-left: 15px;">
                        <tbody>
                            <tr style="overflow-x: auto;">
                                <th style="background-color: #E5CCFF;">月</th>
                                <td style="white-space: nowrap; overflow: auto; background-color: #FFFFFF;">
                                    @forelse($animes_mon as $anime_mon)
                                    <div style="display: inline-block; margin-right: 10px;">
                                        <a href="{{ route('animes.edit' , $anime_mon) }}">
                                            <img class="image" width = "170", src="{{ Storage::disk('s3')->temporaryUrl($anime_mon->img_path, now()->addDay()) }}" alt = "Image">
                                        </a>
                                    </div>
                                    @empty
                                    @endforelse
                                </td>
                                <td>
                                    <a href="{{route('animes.search_get')}}" style="white-space: nowrap;">追加する</a>
                                </td>
                            </tr> 
                            <tr style="overflow-x: auto;">
                                <th style="background-color: #FFCC99;">火</th>
                                <td style="white-space: nowrap; overflow: auto; background-color: #FFFFFF;">
                                    @forelse($animes_tue as $anime_tue)
                                    <div style="display: inline-block; margin-right: 10px;">
                                        <a href="{{ route('animes.edit' , $anime_tue) }}">
                                            <img class="image" width = "170", src="{{ Storage::disk('s3')->temporaryUrl($anime_tue->img_path, now()->addDay()) }}" alt = "Image">
                                        </a>
                                    </div>
                                    @empty
                                    @endforelse
                                </td>
                                <td>
                                    <a href="{{route('animes.search_get')}}" style="white-space: nowrap;">追加する</a>
                                </td>
                            </tr>
                            <tr style="overflow-x: auto;">
                                <th style="background-color: #99FFFF;">水</th>
                                <td style="white-space: nowrap; overflow: auto; background-color: #FFFFFF;">
                                    @forelse($animes_wed as $anime_wed)
                                    <div style="display: inline-block; margin-right: 10px;">
                                        <a href="{{ route('animes.edit' , $anime_wed) }}">
                                            <img class="image" width = "170", src="{{ Storage::disk('s3')->temporaryUrl($anime_wed->img_path, now()->addDay()) }}" alt = "Image">
                                        </a>
                                    </div>
                                    @empty
                                    @endforelse
                                </td>
                                <td>
                                    <a href="{{route('animes.search_get')}}" style="white-space: nowrap;">追加する</a>
                                </td>
                            </tr>
                            <tr style="overflow-x: auto;">
                                <th style="background-color: #99FF99;">木</th>
                                <td style="white-space: nowrap; overflow: auto; background-color: #FFFFFF;">
                                    @forelse($animes_thu as $anime_thu)
                                    <div style="display: inline-block; margin-right: 10px;">
                                        <a href="{{ route('animes.edit' , $anime_thu) }}">
                                            <img class="image" width = "170", src="{{ Storage::disk('s3')->temporaryUrl($anime_thu->img_path, now()->addDay()) }}" alt = "Image">
                                        </a>
                                    </div>
                                    @empty
                                    @endforelse
                                </td>
                                <td>
                                    <a href="{{route('animes.search_get')}}" style="white-space: nowrap;">追加する</a>
                                </td>
                            </tr> 
                            <tr style="overflow-x: auto;">
                                <th style="background-color: #FFFF99;">金</th>
                                <td style="white-space: nowrap; overflow: auto; background-color: #FFFFFF;">
                                    @forelse($animes_fri as $anime_fri)
                                    <div style="display: inline-block; margin-right: 10px;">
                                        <a href="{{ route('animes.edit' , $anime_fri) }}">
                                            <img class="image" width = "170", src="{{ Storage::disk('s3')->temporaryUrl($anime_fri->img_path, now()->addDay()) }}" alt = "Image">
                                        </a>
                                    </div>
                                    @empty
                                    @endforelse
                                </td>
                                <td>
                                    <a href="{{route('animes.search_get')}}" style="white-space: nowrap;">追加する</a>
                                </td>
                            </tr> 
                            <tr style="overflow-x: auto;">
                                <th style="background-color: #DEB887;">土</th>
                                <td style="white-space: nowrap; overflow: auto; background-color: #FFFFFF;">
                                    @forelse($animes_sat as $anime_sat)
                                    <div style="display: inline-block; margin-right: 10px;">
                                        <a href="{{ route('animes.edit' , $anime_sat) }}">
                                            <img class="image" width = "170", src="{{ Storage::disk('s3')->temporaryUrl($anime_sat->img_path, now()->addDay()) }}" alt = "Image">
                                        </a>
                                    </div>
                                    @empty
                                    @endforelse
                                </td>
                                <td>
                                    <a href="{{route('animes.search_get')}}" style="white-space: nowrap;">追加する</a>
                                </td>
                            </tr> 
                            <tr style="overflow-x: auto;">
                                <th style="background-color: #FFCCE5;">日</th>
                                <td style="white-space: nowrap; overflow: auto; background-color: #FFFFFF;">
                                    @forelse($animes_sun as $anime_sun)
                                    <div style="display: inline-block; margin-right: 10px;">
                                        <a href="{{ route('animes.edit' , $anime_sun) }}">
                                            <img class="image" width = "170", src="{{ Storage::disk('s3')->temporaryUrl($anime_sun->img_path, now()->addDay()) }}" alt = "Image">
                                        </a>
                                    </div>
                                    @empty
                                    @endforelse
                                </td>
                                <td>
                                    <a href="{{route('animes.search_get')}}" style="white-space: nowrap;">追加する</a>
                                </td>
                            </tr> 
                            <tr style="overflow-x: auto;">
                                <th style="background-color: #FFFFFF; white-space: nowrap;">視聴中</th>
                                <td style="white-space: nowrap; overflow: auto; background-color: #FFFFFF;">
                                    @forelse($animes_non as $anime_non)
                                    <div style="display: inline-block; margin-right: 10px;">
                                        <a href="{{ route('animes.edit' , $anime_non) }}">
                                            <img class="image" width = "170", src="{{ Storage::disk('s3')->temporaryUrl($anime_non->img_path, now()->addDay()) }}" alt = "Image">
                                        </a>
                                    </div>
                                    @empty
                                    @endforelse
                                </td>
                                <td>
                                    <a href="{{route('animes.search_get')}}" style="white-space: nowrap;">追加する</a>
                                </td>
                            </tr> 
                            <tr>
                                <th style="background-color: #FFFFFF;">💗</th>
                                <td style="background-color: #FFFFFF;"></td>
                                <td>
                                    <a href="{{route('animes.search_get')}}">追加する</a>
                                </td>
                            </tr> 
                        </tbody>
                     </table>
                </div>
            </div>
        </body>
    </html>
</x-app-layout>