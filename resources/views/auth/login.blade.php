<x-guest-layout>
    @section('title', 'ログイン | アニメナビ')
    
    <!-- Session Status -->
    
    <x-auth-session-status class="mb-4" :status="session('status')" />
    
    <style>
    .w-full {
        justify-content: center;
    }
    </style>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Emailアドレス')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('パスワード')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4" style="display: flex; justify-content: center;">
            <div style="justify-content: space-between;">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('このアカウントを記録する') }}</span>
            </label>
            </div>
        </div>
        <div class="mt-4">
            <x-primary-button class="w-full" style="background-color: #1E90FF;">
            ログイン
            </x-primary-button>
        </div>
        
        <div class="flex items-center justify-between mt-4" style="justify-content: space-around;">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="/register">
                {{ __('アカウントを作成する') }}
            </a>
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('パスワードを忘れた場合') }}
                </a>
            @endif
        </div>
        <br>
        <div>
            <x-primary-button class="w-full">
                <a href="{{ route('login.guest') }}">
                    ゲストとしてログイン
                </a>
            </x-primary-button>
        </div>
        
        <!--googleログインボタンを追加-->
        
        <x-primary-button class="w-full mt-3" style="justify-content: space-around; background-color: #FFFFFF; color: #000000; border: 1px solid #000000; text-transform: none;">
            <a href="auth/google" style="display: flex; align-items: center; text-decoration: none; color: inherit;">
                <svg aria-hidden="true" class="native svg-icon iconGoogle" width="18" height="18" viewBox="0 0 18 18">
                    <path d="M16.51 8H8.98v3h4.3c-.18 1-.74 1.48-1.6 2.04v2.01h2.6a7.8 7.8 0 002.38-5.88c0-.57-.05-.66-.15-1.18z" fill="#4285F4"></path>
                    <path d="M8.98 17c2.16 0 3.97-.72 5.3-1.94l-2.6-2a4.8 4.8 0 01-7.18-2.54H1.83v2.07A8 8 0 008.98 17z" fill="#34A853"></path>
                    <path d="M4.5 10.52a4.8 4.8 0 010-3.04V5.41H1.83a8 8 0 000 7.18l2.67-2.07z" fill="#FBBC05"></path>
                    <path d="M8.98 4.18c1.17 0 2.23.4 3.06 1.2l2.3-2.3A8 8 0 001.83 5.4L4.5 7.49a4.77 4.77 0 014.48-3.3z" fill="#EA4335"></path>
                </svg>
                <span style="margin-left: 0.5rem;">Googleアカウントでログイン</span>
            </a>
        </x-primary-button>

        
    </form>
</x-guest-layout>
