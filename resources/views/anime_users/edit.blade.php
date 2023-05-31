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
                 width:85px;
                 height: 102px;
                 font-size: 85px;
                 color: #808080; 
                 margin-left: 20px;
             }
            .unlike-btn {
                 width: 85px;
                 height: 102px;
                 font-size: 85px;
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
                    <a href="{{ route('animes.edit_unlike' , ['anime'=>$anime])}}" style="position: absolute; top: 315px; right: 60px;">
                        <i class="fas fa-heart unlike-btn"></i>
                        <span style="font-size: 82px; color: white;">{{$like_count}}</span>
                    </a>
                    @else
                    <a href="{{ route('animes.edit_like' , ['anime'=>$anime])}}" style="position: absolute; top: 315px; right: 60px;">
                        <i class="far fa-heart like-btn"></i>
                        <span style="font-size: 82px; color: white;">{{$like_count}}</span>
                    </a>
                    @endif
                </div>
                <table>
                     <form action="{{ route('animes.edit_post') }}" method="POST">
                        @csrf
                        <tbody>
                            <tr>
                                <th>タイトル</th>
                                <td style="font-family: 'Kaisei Decol', serif; font-size: 30px;">{{$anime->title}}</td>
                            </tr> 
                            <!--<tr>
                                <th>ジャンル</th>
                                <td>sample</td>
                            </tr>-->
                            <tr>
                                <th>放送クール</th>
                                <td>{{$anime->on_air_season}}</td>
                            </tr>
                            <tr>
                                <th>曜日</th>
                                <td>
                                    <select name = "day_of_week">
                                        <option value = "non"{{ $anime_user->day_of_week == 'non' ? 'selected' : '' }}>指定なし</option><!--day_of_weekがnonだったらselected属性を追加-->
                                        <option value = "mon"{{ $anime_user->day_of_week == 'mon' ? 'selected' : '' }}>月曜日</option>
                                        <option value = "tue"{{ $anime_user->day_of_week == 'tue' ? 'selected' : '' }}>火曜日</option>
                                        <option value = "wed"{{ $anime_user->day_of_week == 'wed' ? 'selected' : '' }}>水曜日</option>
                                        <option value = "thu"{{ $anime_user->day_of_week == 'thu' ? 'selected' : '' }}>木曜日</option>
                                        <option value = "fri"{{ $anime_user->day_of_week == 'fri' ? 'selected' : '' }}>金曜日</option>
                                        <option value = "sat"{{ $anime_user->day_of_week == 'sat' ? 'selected' : '' }}>土曜日</option>
                                        <option value = "sun"{{ $anime_user->day_of_week == 'sun' ? 'selected' : '' }}>日曜日</option>
                                    </select>
                                </td>
                            </tr> 
                            <tr>
                                <th>時刻</th>
                                <td>
                                    <input type ="time" name = "time"　id="time" value="00:00">
                                </td>
                            </tr> 
                            <tr>
                                <th>視聴媒体</th>
                                <td>
                                    <select name = "medium">
                                        <option value = "none">指定なし</option>
                                        <option value = "amazon">Amazon Prime Video</option>
                                        <option value = "netflix">Netflix</option>
                                        <option value = "u-next">U-NEXT</option>
                                        <option value = "danime">dアニメストア</option>
                                        <option value = "abema">ABEMA</option>
                                        <option value = "dazn">DAZN</option>
                                        <option value = "disney">Disney+</option>
                                        <option value = "hulu">Hulu</option>
                                        <option value = "dTV">dTV</option>
                                        <option value = "hikari">ひかりTV</option>
                                        <option value = "anitere">あにてれ</option>
                                        <option value = "bandai">バンダイチャンネル</option>
                                        <option value = "FOD">FODプレミアム</option>
                                    </select>
                                </td>
                            </tr> 
                            <tr>
                                <th>公式サイト</th>
                                <td><a href = {{$anime->official_url}}>{{$anime->official_url}}</a></td>
                            </tr> 
                        </tbody>
                    </table>
                    <input type="hidden" name = "anime_id" value = "{{$anime->id}}">
                    <input type="submit" style="margin-top: 20px; margin-right: 30px; float: left; background-color: #3490dc; border: none; border-radius: 4px;" value="上記の内容で登録する">
                </form>
                </div>
                <br clear="both"><!-- 回り込みの解除 -->
                <div style="margin-top: 50px; margin-left: 30px;">
                    <a href="{{route('search.session')}}" style="background-color: black; color: #ffffff; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;">戻る</a>
                </div>
            </div>
        </body>
    </html>
</x-app-layout>