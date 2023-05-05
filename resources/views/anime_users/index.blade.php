<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>AnimeNavi</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <header>
            <a href="/">アニメナビ</a>
            <a href="{{route('animes.search_get')}}">検索</a>
            <a href="/ranking">ランキング</a>
            <a href="/board">掲示板</a>
        </header>
        <div class='myanimes'>
            <div class='myanimes'>
                <table>
                    <tbody>
                        <tr>
                            <th>月</th>
                            <td>sample</td>
                            <td>
                                <a href="">追加する</a>
                            </td>
                        </tr> 
                        <tr>
                            <th>火</th>
                            <td>sample</td>
                            <td>
                                <a href="">追加する</a>
                            </td>
                        </tr>
                        <tr>
                            <th>水</th>
                            <td>sample</td>
                            <td>
                                <a href="">追加する</a>
                            </td>
                        </tr>
                        <tr>
                            <th>木</th>
                            <td>sample</td>
                            <td>
                                <a href="">追加する</a>
                            </td>
                        </tr> 
                        <tr>
                            <th>金</th>
                            <td>sample</td>
                            <td>
                                <a href="">追加する</a>
                            </td>
                        </tr> 
                        <tr>
                            <th>土</th>
                            <td>sample</td>
                            <td>
                                <a href="">追加する</a>
                            </td>
                        </tr> 
                        <tr>
                            <th>日</th>
                            <td>sample</td>
                            <td>
                                <a href="">追加する</a>
                            </td>
                        </tr> 
                        <tr>
                            <th>視聴中</th>
                            <td>sample</td>
                            <td>
                                <a href="">追加する</a>
                            </td>
                        </tr> 
                        <tr>
                            <th>💗</th>
                            <td>sample</td>
                            <td>
                                <a href="">追加する</a>
                            </td>
                        </tr> 
                    </tbody>
                 </table>
            </div>
        </div>
    </body>
</html>