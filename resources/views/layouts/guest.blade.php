<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-05CLXWFBKC"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
        
          gtag('config', 'G-05CLXWFBKC');
        </script>
        
        <!--ファビコン-->
        <!--<link href="{{Storage::disk('s3')->temporaryUrl('logo.png', now()->addDay())}}" rel="icon" sizes="48x48">-->
        <link href="https://drive.google.com/uc?export=view&id=10FbKZlMxQ2k2CD2LJVL3dDXubGRA34qh" rel="icon" sizes="48x48">
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <!--app.blade.phpと同格-->
        @hasSection('title')<!--変更_sectionがあればsectionで定義されたタイトルを用いる-->
            <button title=""></button>
            <title>@yield('title')</title>
        @else
            <button title=""></button>
            <title>{{ config('app.name') }}</title>
        @endif

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <script src="https://apis.google.com/js/platform.js" async defer></script>  <!--追加-->
        <div class="min-h-screen flex flex-col sm:justify-center items-center bg-gray-100">
            <div>
                <a href="/">
                   <link href="https://fonts.googleapis.com/earlyaccess/nicomoji.css" rel="stylesheet">
                    <style>
                        h1 {
                            font-family: "Nico Moji", sans-serif;
                            font-size: 80px;
                        }
                    </style>
                    <h1>アニメナビ</h1>
                </a>
                <p></p>
            </div>

            <div class="w-full sm:max-w-xl mt-4 px-6 py-6 bg-white shadow-md overflow-hidden sm:rounded-lg">
                <!--sm:max-w-xlでボックスの幅を指定_TailwindCSSのクラス-->
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
