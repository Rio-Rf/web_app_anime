<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // 追加
use Illuminate\Support\Facades\Auth; // 追加
use Socialite; // 追加
use App\Models\User; //追加

class GoogleLoginController extends Controller
{
    public function redirectToGoogle()
    {
        // Googleへのリダイレクト→Google側で認証処理
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(Request $request)
    {
        // googleのユーザ情報を取得
        $googleUser = Socialite::driver('google')->stateless()->user();
        // email が合致するユーザをDBから取得
        $user = User::where('email', $googleUser->email)->first();
        // DBに該当するユーザがなければ新しくユーザを作成
        if ($user == null) {
            $user = $this->createUser($googleUser);
        }

        // 作成したユーザでログイン処理
        Auth::login($user, true);
        
        // 初回ログインフラグをセッションに追加
        $request->session()->put('firstlogin', true);

        // /homeにリダイレクト
        return redirect('/');
    }

    public function createUser($googleUser)
    {
        $user = User::create([
            'name'     => $googleUser->name,
            'email'    => $googleUser->email,
            'password' => Hash::make(uniqid()),
            'icon_file_path'=>"default_value",
            'birthday'=>"default_value",
        ]);
        return $user;
    }
}
