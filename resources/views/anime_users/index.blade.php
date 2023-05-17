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
                    <table>
                        <tbody>
                            <tr>
                                <th>月</th>
                                <td style = "display: flex;">
                                @forelse($animes_mon as $anime_mon)
                                <a href="{{ route('animes.edit' , $anime_mon) }}">
                                    <div><img class="image" width = "100", height = "113", src="{{ Storage::disk('s3')->temporaryUrl($anime_mon->img_path, now()->addDay()) }}" alt = "Image"></div>
                                </a>
                                @empty
                                検索条件に一致する作品はデータベースに登録されておりません.
                                @endforelse
                                </td>
                                <td>
                                    <a href="{{route('animes.search_get')}}">　　追加する</a>
                                </td>
                            </tr> 
                            <tr>
                                <th>火</th>
                                @forelse($animes_tue as $anime_tue)
                                <td><a href="{{ route('animes.edit' , $anime_tue) }}">
                                    <div><img class="image" width = "100", height = "113", src="{{ Storage::disk('s3')->temporaryUrl($anime_tue->img_path, now()->addDay()) }}" alt = "Image"></div>
                                </a></td>
                                @empty
                                <td></td>
                                @endforelse
                                <td>
                                    <a href="{{route('animes.search_get')}}">　　追加する</a>
                                </td>
                            </tr>
                            <tr>
                                <th>水</th>
                                @forelse($animes_wed as $anime_wed)
                                <td><a href="{{ route('animes.edit' , $anime_wed) }}">
                                    <div><img class="image" width = "100", height = "113", src="{{ Storage::disk('s3')->temporaryUrl($anime_wed->img_path, now()->addDay()) }}" alt = "Image"></div>
                                </a></td>
                                @empty
                                <td></td>
                                @endforelse
                                <td>
                                    <a href="{{route('animes.search_get')}}">　　追加する</a>
                                </td>
                            </tr>
                            <tr>
                                <th>木</th>
                                @forelse($animes_thu as $anime_thu)
                                <td><a href="{{ route('animes.edit' , $anime_thu) }}">
                                    <div><img class="image" width = "100", height = "113", src="{{ Storage::disk('s3')->temporaryUrl($anime_thu->img_path, now()->addDay()) }}" alt = "Image"></div>
                                </a></td>
                                @empty
                                <td></td>
                                @endforelse
                                <td>
                                    <a href="{{route('animes.search_get')}}">　　追加する</a>
                                </td>
                            </tr> 
                            <tr>
                                <th>金</th>
                                @forelse($animes_fri as $anime_fri)
                                <td><a href="{{ route('animes.edit' , $anime_fri) }}">
                                    <div><img class="image" width = "100", height = "113", src="{{ Storage::disk('s3')->temporaryUrl($anime_fri->img_path, now()->addDay()) }}" alt = "Image"></div>
                                </a></td>
                                @empty
                                <td></td>
                                @endforelse
                                <td>
                                    <a href="{{route('animes.search_get')}}">　　追加する</a>
                                </td>
                            </tr> 
                            <tr>
                                <th>土</th>
                                @forelse($animes_sat as $anime_sat)
                                <td><a href="{{ route('animes.edit' , $anime_sat) }}">
                                    <div><img class="image" width = "100", height = "113", src="{{ Storage::disk('s3')->temporaryUrl($anime_sat->img_path, now()->addDay()) }}" alt = "Image"></div>
                                </a></td>
                                @empty
                                <td></td>
                                @endforelse
                                <td>
                                    <a href="{{route('animes.search_get')}}">　　追加する</a>
                                </td>
                            </tr> 
                            <tr>
                                <th>日</th>
                                @forelse($animes_sun as $anime_sun)
                                <td><a href="{{ route('animes.edit' , $anime_sun) }}">
                                    <div><img class="image" width = "100", height = "113", src="{{ Storage::disk('s3')->temporaryUrl($anime_sun->img_path, now()->addDay()) }}" alt = "Image"></div>
                                </a></td>
                                @empty
                                <td></td>
                                @endforelse
                                <td>
                                    <a href="{{route('animes.search_get')}}">　　追加する</a>
                                </td>
                            </tr> 
                            <tr>
                                <th>視聴中</th>
                                @forelse($animes_non as $anime_non)
                                <td><a href="{{ route('animes.edit' , $anime_non) }}">
                                    <div><img class="image" width = "100", height = "113", src="{{ Storage::disk('s3')->temporaryUrl($anime_non->img_path, now()->addDay()) }}" alt = "Image"></div>
                                </a></td>
                                @empty
                                <td></td>
                                @endforelse
                                <td>
                                    <a href="{{route('animes.search_get')}}">　　追加する</a>
                                </td>
                            </tr> 
                            <tr>
                                <th>💗</th>
                                <td>sample</td>
                                <td>
                                    <a href="{{route('animes.search_get')}}">　　追加する</a>
                                </td>
                            </tr> 
                        </tbody>
                     </table>
                </div>
            </div>
        </body>
    </html>
</x-app-layout>