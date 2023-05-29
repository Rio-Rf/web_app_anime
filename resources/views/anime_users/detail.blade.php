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
        </head>
        <body>
            <style>
            table, td, th {
                border: 1px solid black; /* 枠線のスタイルを設定 */
                border-collapse: collapse; /* セルの境界線を結合 */
                padding: 10px;
                background-color: #FFFFFF;
            }
            .like-btn {
                 width:50px;
                 height: 60px;
                 font-size: 50px;
                 color: #808080; 
                 margin-left: 20px;
             }
            .unlike-btn {
                 width: 50px;
                 height: 60px;
                 font-size: 50px;
                 color: #e54747;
                 margin-left: 20px;
            }
            </style>
            <header>
            </header>
            <div>
              <div style="margin-top: 30px;">
                <div style="position: relative; float: left; margin-right: 30px; margin-left: 5px;">
                    <img width = "300", src="{{ Storage::disk('s3')->temporaryUrl($anime->img_path, now()->addDay()) }}" alt = "Image"　align="left" style="float: left; margin-right: 50px; margin-left: 30px; border: 1px solid #000000;">
                    @if($anime_user->like == 1)
                    <a href="{{ route('animes.detail_unlike' , ['anime'=>$anime])}}" style="position: absolute; bottom: 0; right: 60px;">
                        <i class="fas fa-heart unlike-btn"></i>
                        <span style="font-size: 50px; color: white;">{{$like_count}}</span>
                    </a>
                    @else
                    <a href="{{ route('animes.detail_like' , ['anime'=>$anime])}}" style="position: absolute; bottom: 0; right: 60px;">
                        <i class="far fa-heart like-btn"></i>
                        <span style="font-size: 50px; color: white;">{{$like_count}}</span>
                    </a>
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
                                <td><a href = {{$anime->official_url}}>{{$anime->official_url}}</a></td>
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
        </body>
    </html>
</x-app-layout>