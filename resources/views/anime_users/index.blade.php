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
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script><!--jQueryの読み込み-->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" />
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
             .popup {
                width: 50%;
                margin: auto;
                position: relative;
                background: #fff;
                padding: 20px;
            }
            .custom-title-class {
              font-size: 20px;
              color: #FFFFFF;
              margin-top: 20px;
              margin-bottom: 50px;
              padding-top: 30px;
              padding-bottom: 30px;
              padding-left: 10px;
              padding-right: 10px;
              background-color: #000000;
              opacity: 0.7;
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
                    <!--<div id="test" class="popup mfp-hide">
                    </div>
                    <a href="#test" class="open">ポップアップ表示</a>-->
                    @if (session('firstlogin'))
                    
                    <!--
                    @php
                    session(['firstlogin' => false]);
                    $t0 = Storage::disk('s3')->temporaryUrl('tutorial/0.PNG', now()->addDay());
                    $t1 = Storage::disk('s3')->temporaryUrl('tutorial/1.PNG', now()->addDay());
                    $t2 = Storage::disk('s3')->temporaryUrl('tutorial/2.PNG', now()->addDay());
                    $t3 = Storage::disk('s3')->temporaryUrl('tutorial/3.PNG', now()->addDay());
                    $t4 = Storage::disk('s3')->temporaryUrl('tutorial/4.PNG', now()->addDay());
                    $t5 = Storage::disk('s3')->temporaryUrl('tutorial/5.PNG', now()->addDay());
                    $t6 = Storage::disk('s3')->temporaryUrl('tutorial/6.PNG', now()->addDay());
                    $t7 = Storage::disk('s3')->temporaryUrl('tutorial/7.PNG', now()->addDay());
                    $t8 = Storage::disk('s3')->temporaryUrl('tutorial/8.PNG', now()->addDay());
                    @endphp
                    -->
                    @php
                    session(['firstlogin' => false]);
                    $t0 = 'https://drive.google.com/uc?id=14uSDzjMV9Gz4xMxqKR0VoU8RSJ6Fm11I&export=download';
                    $t1 = 'https://drive.google.com/uc?id=145IMG5eiXxJ3h0GPIfs0JdbP0UQ1WOdt&export=download';
                    $t2 = 'https://drive.google.com/uc?id=13n4gWl6DK_ds9raUR1bIjDyxug6o7gc2&export=download';
                    $t3 = 'https://drive.google.com/uc?id=13ipJww1rFDCtvTxRp8NBFO4qpI6LsnT4&export=download';
                    $t4 = 'https://drive.google.com/uc?id=13gL8iBc3Bu7whMgrYrlYJVr6gU5aU1PQ&export=download';
                    $t5 = 'https://drive.google.com/uc?id=13f9DMoJzdXYfTi2C5om9rrF2T3AKtpHG&export=download';
                    $t6 = 'https://drive.google.com/uc?id=13b2mZxg1RokyXH6thCm_TrNuDjuhYCfN&export=download';
                    $t7 = 'https://drive.google.com/uc?id=13WnIInslD7BnvMgGsMuDf6X9yE2DZ6CR&export=download';
                    $t8 = 'https://drive.google.com/uc?id=146-bFoATCTxe6GKDIFHKS5SqOgCz_9c3&export=download';
                    @endphp
                    
                    <div id="0" data-t0="{{ $t0 }}"></div>
                    <div id="1" data-t1="{{ $t1 }}"></div>
                    <div id="2" data-t2="{{ $t2 }}"></div>
                    <div id="3" data-t3="{{ $t3 }}"></div>
                    <div id="4" data-t4="{{ $t4 }}"></div>
                    <div id="5" data-t5="{{ $t5 }}"></div>
                    <div id="6" data-t6="{{ $t6 }}"></div>
                    <div id="7" data-t7="{{ $t7 }}"></div>
                    <div id="8" data-t8="{{ $t8 }}"></div>
                    <script>
                      $(document).ready(function() {
                      var t0 = $('#0').data('t0');
                      var t1 = $('#1').data('t1');
                      var t2 = $('#2').data('t2');
                      var t3 = $('#3').data('t3');
                      var t4 = $('#4').data('t4');
                      var t5 = $('#5').data('t5');
                      var t6 = $('#6').data('t6');
                      var t7 = $('#7').data('t7');
                      var t8 = $('#8').data('t8');
                        $.magnificPopup.open({
                          items: [
                          {
                            src: t0,
                            title: '<span class="popup-title">アニメナビの使い方について紹介します！！！アニメナビは視聴しているアニメを管理するWebアプリです！</span>'
                          },
                          {
                            src: t1,
                            title: '<span class="popup-title">TOP画面から「検索」タブか各曜日の「追加する」ボタンを押します！追加したい曜日が決まっている場合には追加するボタンを使用します！</span>'
                          },
                          {
                            src: t2,
                            title: '<span class="popup-title">検索バーに登録したいアニメのタイトルを入力し、「検索」ボタンを押します！検索せずにアニメを登録することもできます！</span>'
                          },
                          {
                            src: t3,
                            title: '<span class="popup-title">検索結果一覧から登録したいアニメを選択します！</span>'
                          },
                          {
                            src: t4,
                            title: '<span class="popup-title">ユーザさんが視聴する曜日，時刻，視聴媒体を選択して「登録する」ボタンを押します！</span>'
                          },
                          {
                            src: t5,
                            title: '<span class="popup-title">TOP画面に登録した内容が反映されます！画像左上のアイコンを押すとそのページに遷移します！次に、登録したアニメを選択します！</span>'
                          },
                          {
                            src: t6,
                            title: '<span class="popup-title">「編集する」ボタンを押すと登録内容を変更できます！「削除する」ボタンを押すと登録した内容を削除できます！</span>'
                          },
                          {
                            src: t7,
                            title: '<span class="popup-title">ハートボタンを押すとお気に入り登録されます．このページでは全ユーザのお気に入り数のランキングを見ることができます！</span>'
                          },
                          {
                            src: t8,
                            title: '<span class="popup-title">ここまで読んでいただきありがとうございます！よいアニメライフを！！！</span>'
                          }
                        ],
                        gallery: {
                          enabled: true
                        },
                        type: 'image', // this is a default type
                        callbacks: {//cssとつなげる
                            markupParse: function(template, values, item) {
                                template.find('.mfp-title').addClass('custom-title-class');
                            }
                        }
                        });
                      });
                    </script>
                    @endif
                    <table style="margin-top: 30px; margin-right: 15px; margin-left: 15px;">
                        <tbody>
                            <tr>
                                <th style="background-color: #E5CCFF; font-size: 30px;">月</th>
                                <td style="width: 100%; overflow-x: auto; white-space: nowrap; background-color: #FFFFFF;">
                                    @forelse($animes_mon as $anime_mon)
                                    @php
                                        $anime_user_mon = $anime_users_mon->where('anime_id', $anime_mon->id)->first();
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
                                                    <a href="#" class="unlike-btn" data-anime="{{ $anime->id }}" style="position: absolute; top: 165px; right: 5px;">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                @else
                                                    <a href="#" class="like-btn" data-anime="{{ $anime->id }}" style="position: absolute; top: 165px; right: 5px;">
                                                        <i class="far fa-heart"></i>
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
                                    @forelse($animes_tue as $anime_tue)
                                    @php
                                        $anime_user_tue = $anime_users_tue->where('anime_id', $anime_tue->id)->first();
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
                                                    <a href="#" class="unlike-btn" data-anime="{{ $anime->id }}" style="position: absolute; top: 165px; right: 5px;">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                @else
                                                    <a href="#" class="like-btn" data-anime="{{ $anime->id }}" style="position: absolute; top: 165px; right: 5px;">
                                                        <i class="far fa-heart"></i>
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
                                    @forelse($animes_wed as $anime_wed)
                                    @php
                                        $anime_user_wed = $anime_users_wed->where('anime_id', $anime_wed->id)->first();
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
                                                    <a href="#" class="unlike-btn" data-anime="{{ $anime->id }}" style="position: absolute; top: 165px; right: 5px;">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                @else
                                                    <a href="#" class="like-btn" data-anime="{{ $anime->id }}" style="position: absolute; top: 165px; right: 5px;">
                                                        <i class="far fa-heart"></i>
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
                                    @forelse($animes_thu as $anime_thu)
                                    @php
                                        $anime_user_thu = $anime_users_thu->where('anime_id', $anime_thu->id)->first();
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
                                                    <a href="#" class="unlike-btn" data-anime="{{ $anime->id }}" style="position: absolute; top: 165px; right: 5px;">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                @else
                                                    <a href="#" class="like-btn" data-anime="{{ $anime->id }}" style="position: absolute; top: 165px; right: 5px;">
                                                        <i class="far fa-heart"></i>
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
                                    @forelse($animes_fri as $anime_fri)
                                    @php
                                        $anime_user_fri = $anime_users_fri->where('anime_id', $anime_fri->id)->first();
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
                                                    <a href="#" class="unlike-btn" data-anime="{{ $anime->id }}" style="position: absolute; top: 165px; right: 5px;">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                @else
                                                    <a href="#" class="like-btn" data-anime="{{ $anime->id }}" style="position: absolute; top: 165px; right: 5px;">
                                                        <i class="far fa-heart"></i>
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
                                    @forelse($animes_sat as $anime_sat)
                                    @php
                                        $anime_user_sat = $anime_users_sat->where('anime_id', $anime_sat->id)->first();
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
                                                    <a href="#" class="unlike-btn" data-anime="{{ $anime->id }}" style="position: absolute; top: 165px; right: 5px;">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                @else
                                                    <a href="#" class="like-btn" data-anime="{{ $anime->id }}" style="position: absolute; top: 165px; right: 5px;">
                                                        <i class="far fa-heart"></i>
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
                                    @forelse($animes_sun as $anime_sun)
                                    @php
                                        $anime_user_sun = $anime_users_sun->where('anime_id', $anime_sun->id)->first();
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
                                                    <a href="#" class="unlike-btn" data-anime="{{ $anime->id }}" style="position: absolute; top: 165px; right: 5px;">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                @else
                                                    <a href="#" class="like-btn" data-anime="{{ $anime->id }}" style="position: absolute; top: 165px; right: 5px;">
                                                        <i class="far fa-heart"></i>
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
                                    @forelse($animes_non as $anime_non)
                                    @php
                                        $anime_user_non = $anime_users_non->where('anime_id', $anime_non->id)->first();
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
                                                    <a href="#" class="unlike-btn" data-anime="{{ $anime->id }}" style="position: absolute; top: 165px; right: 5px;">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                @else
                                                    <a href="#" class="like-btn" data-anime="{{ $anime->id }}" style="position: absolute; top: 165px; right: 5px;">
                                                        <i class="far fa-heart"></i>
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
                                    @forelse($animes_like as $anime_like)
                                    @php
                                        $anime_user_like = $anime_users_like->where('anime_id', $anime_like->id)->first();
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
                                                    <a href="#" class="unlike-btn" data-anime="{{ $anime->id }}" style="position: absolute; top: 165px; right: 5px;">
                                                        <i class="fas fa-heart"></i>
                                                    </a>
                                                @else
                                                    <a href="#" class="like-btn" data-anime="{{ $anime->id }}" style="position: absolute; top: 165px; right: 5px;">
                                                        <i class="far fa-heart"></i>
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
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const unlikeBtns = document.querySelectorAll('.unlike-btn');
            
                    if (unlikeBtns) {
                        unlikeBtns.forEach(function(unlikeBtn) {
                            const unheartIcon = unlikeBtn.querySelector('i');

                            const indexunLikeUrl = " route('animes.index_unlike') ";

                            unlikeBtn.addEventListener('click', function(event) {
                                event.preventDefault();
            
                                const animeId = unlikeBtn.dataset.anime;
            
                                fetch(`/index_unlike/${animeId}`)
                                    .then(function(response) {
                                        if (response.ok) {
                                            return response.json();
                                        } else {
                                            throw new Error('Network response was not ok.');
                                        }
                                    })
                                    .then(function(data) {
                                        // ハートアイコンのクラスを切り替える
                                        unheartIcon.classList.toggle('fas');
                                        unheartIcon.classList.toggle('far');
                                        unlikeBtn.classList.toggle('unlike-btn');
                                        unlikeBtn.classList.toggle('like-btn');
                                    })
                                    .catch(function(error) {
                                        console.log('Error:', error);
                                    });
                            });
                        });
                    }
                });
            </script>
            
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const likeBtns = document.querySelectorAll('.like-btn');
            
                    if (likeBtns) {
                        likeBtns.forEach(function(likeBtn) {
                            const heartIcon = likeBtn.querySelector('i');
                            const indexLikeUrl = " route('animes.index_like') ";
            
                            likeBtn.addEventListener('click', function(event) {
                                event.preventDefault();
            
                                const animeId = likeBtn.dataset.anime;
            
                                fetch(`/index_like/${animeId}`)
                                    .then(function(response) {
                                        if (response.ok) {
                                            return response.json();
                                        } else {
                                            throw new Error('Network response was not ok.');
                                        }
                                    })
                                    .then(function(data) {
                                        // ハートアイコンのクラスを切り替える
                                        heartIcon.classList.toggle('far');
                                        heartIcon.classList.toggle('fas');
                                        likeBtn.classList.toggle('like-btn');
                                        likeBtn.classList.toggle('unlike-btn');
                                    })
                                    .catch(function(error) {
                                        console.log('Error:', error);
                                    });
                            });
                        });
                    }
                });
            </script>
        </body>
    </html>
</x-app-layout>
