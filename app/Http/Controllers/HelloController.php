<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index()
    {
      return ['message' => 'Hello World'];
    }
    public function create(Request $request)
    {
        // リクエストデータを処理
        $input = $request->all();

        // ここでリクエストデータのバリデーションなどのロジックを実装

        // レスポンスを返す
        return ['message' => 'POST request successful', 'data' => $input];
    }
}
