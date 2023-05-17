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
            </header>
            <div>
              <h1>編集機能</h1>
              <div>
                <img width = "300", src="{{ Storage::disk('s3')->temporaryUrl($anime->img_path, now()->addDay()) }}" alt = "Image"　align="left" style="float: left; margin-right: 10px;">
                <table>
                     <form action="{{ route('animes.edit_post') }}" method="POST">
                        @csrf
                        <tbody>
                            <tr>
                                <th>タイトル</th>
                                <td>{{$anime->title}}</td>
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
                                        <option value = "non">指定なし</option>
                                        <option value = "mon">月曜日</option>
                                        <option value = "tue">火曜日</option>
                                        <option value = "wed">水曜日</option>
                                        <option value = "thu">木曜日</option>
                                        <option value = "fri">金曜日</option>
                                        <option value = "sat">土曜日</option>
                                        <option value = "sun">日曜日</option>
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
                        <input type="hidden" name = "anime_id" value = "{{$anime->id}}">
                        <input type="submit" value="下記の内容で登録する">
                     </form>
                </table>
                </div>
                <br clear="both"><!-- 回り込みの解除 -->
                <div>
                    <a href="{{route('search.session')}}">戻る</a>
                </div>
            </div>
        </body>
    </html>
</x-app-layout>