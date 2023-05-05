<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anime;

class AnimeController extends Controller
{
    public function search_get(){
        $keyword = "タイトルを入力してください．";
        //$animes = array();
        $query = Anime::query();
        $animes = $query->get();//検索ボックスが空の時にはすべてを表示する．
        return view('anime_users/search', compact('keyword', 'animes'));
    }
    public function search_post(Request $request)
    {
        $keyword = $request->input('keyword');
        $query = Anime::query();

        if(!empty($keyword)) {
            $query->where('title', 'LIKE', "%{$keyword}%");
        }else{
            //
        }
        $animes = $query->get();
        //$request->session()->flush();//ここでセッションを全て削除すると連続で検索ができなくなる．．
        $request->session()->push('animes', $animes);
        $request->session()->push('keyword', $keyword);
        //dd($animes);
        //dd($SessionData);
        return view('anime_users/search', compact('keyword', 'animes'));
    }
    public function edit(Anime $anime)
    {
        return view('anime_users/edit', compact('anime'));
    }
     public function search_session(Request $request)
    {
        $keyword = $request->session()->get('keyword');
        $animes = $request->session()->get('animes');
        $num = count($animes)-1;
        for($i = $num; $i>=0; $i--){
            if($keyword[$i] != null && $animes[$i] != null){
                $keyword = $keyword[$i];
                $animes = $animes[$i];
                break;
            }else{
                $keyword="タイトルを入力してください．";
                $animes = $animes[$i];
            }
        }
        //dd($animes);
        //dd($keyword);
        
        return view('anime_users/search', compact('keyword', 'animes'));
    }
}
