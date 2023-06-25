<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script><!--jQueryの読み込み-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" />
    <style>
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
    <!-- Primary Navigation Menu -->
    <div class="max-w-full mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!--<!-- Logo
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>-->

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <!--<x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>-->
                    <link href="https://fonts.googleapis.com/earlyaccess/nicomoji.css" rel="stylesheet">
                    <x-nav-link :href="route('index')" :active="request()->routeIs('index')" style="white-space: nowrap; font-family: 'Nico Moji', sans-serif; font-size: 50px;">
                        {{ __('アニメナビ') }}
                    </x-nav-link>
                    <x-nav-link :href="route('animes.search_get')" :active="request()->routeIs('animes.search_get')" style="white-space: nowrap; font-size: 20px">
                        {{ __('検索') }}
                    </x-nav-link>
                    <x-nav-link :href="route('ranking')" :active="request()->routeIs('ranking')" style="white-space: nowrap; font-size: 20px">
                        {{ __('ランキング') }}
                    </x-nav-link>
                    <!--<x-nav-link :href="route('board')" :active="request()->routeIs('board')" style="font-size: 20px">
                        {{ __('掲示板') }}
                    </x-nav-link>-->
                    <x-nav-link href="#tutorial" class="open" style="white-space: nowrap; font-size: 20px">
                        {{ __('使い方') }}
                    </x-nav-link>
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
                        $('.open').magnificPopup({
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
                          enabled: true,
                          loop: false
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
                    
                    @if(auth()->user()->id == 2)
                    <x-nav-link :href="route('upload')" :active="request()->routeIs('upload')" style="white-space: nowrap; font-size: 20px">
                        {{ __('登録') }}
                    </x-nav-link>
                    @else
                    @endif
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('プロフィール') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('ログアウト') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <!--<div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>-->
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('index')" :active="request()->routeIs('index')" style="font-family: 'Nico Moji', sans-serif; font-size: 50px; color: black;">
                {{ __('アニメナビ') }}
            </x-responsive-nav-link>
        </div>
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('animes.search_get')" :active="request()->routeIs('animes.search_get')" style="font-size: 20px; color: black;">
                {{ __('検索') }}
            </x-responsive-nav-link>
        </div>
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('ranking')" :active="request()->routeIs('ranking')" style="font-size: 20px; color: black;">
                {{ __('ランキング') }}
            </x-responsive-nav-link>
        </div>
        <!--<div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('board')" :active="request()->routeIs('board')" style="font-size: 20px; color: black;">
                {{ __('掲示板') }}
            </x-responsive-nav-link>
        </div>-->
        
        <x-responsive-nav-link href="#tutorial" class="open" style="white-space: nowrap; font-size: 20px">
            {{ __('使い方') }}
        </x-nav-link>
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
            $('.open').magnificPopup({
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
              enabled: true,
              loop: false
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
        
        @if(auth()->user()->id == 2)
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('upload')" :active="request()->routeIs('upload')" style="font-size: 20px; color: black;">
                {{ __('登録') }}
            </x-responsive-nav-link>
        </div>
        @else
        @endif

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('プロフィール') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('ログアウト') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
