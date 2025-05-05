<!DOCTYPE html>
<x-app-layout>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <head>
            <meta charset="utf-8">
            @section('title', 'アップロード | アニメナビ')
            <!-- Fonts -->
            <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
            <style>
            table, td, th {
                border: 1px solid black; /* 枠線のスタイルを設定 */
                border-collapse: collapse; /* セルの境界線を結合 */
                padding: 10px;
                background-color: #FFFFFF;
            }
            </style>
        </head>
        <body style="text-align: center">
            <header>
            </header>
            <div>
              <h1 style="font-size: 30px; margin-top: 10px; margin-bottom: 20px;">アップロード機能</h1>
            </div>
            <table style="margin: 0 auto;">
                     <form action="{{ route('animes.upload_post') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <tbody>
                            <tr>
                                <th>タイトル</th>
                                <td>
                                    <input type="text" name="title">
                                </td>
                            </tr> 
                            <tr>
                                <th>放送クール</th>
                                <td>
                                    <input type="text" name="on_air_season">
                                </td>
                            </tr>
                            <tr>
                                <th>公式サイト</th>
                                <td>
                                    <input type="text" name="official_url">
                                </td>
                            </tr>
                            <tr>
                                <th>画像パス(https://lh3.googleusercontent.com/d/XXXXX)</th>
                                <td>
                                    <!--<input type="file" name="visual">-->
                                    <input type="text" name="img_path">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <input type="submit" style="margin-top: 20px; margin-right: 30px; background-color: #3490dc; border: none; border-radius: 4px;" value="上記の内容で登録する">
                </form>
        </body>
    </html>
</x-app-layout>
