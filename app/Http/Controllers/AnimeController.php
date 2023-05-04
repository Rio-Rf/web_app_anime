<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anime;

class AnimeController extends Controller
{
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $query = Anime::query();

        if(!empty($keyword)) {
            $query->where('title', 'LIKE', "%{$keyword}%");
        }else{
            //
        }
        $animes = $query->get();

        $request->session()->push('animes', $animes);
        $request->session()->push('keyword', $keyword);
        //dd($animes);
        //dd($SessionData);
        return view('anime_users/search', compact('animes', 'keyword'));
    }
    public function edit(Anime $anime)
    {
        return view('anime_users/edit', compact('anime'));
    }
     public function search_session(Request $request)
    {
        $keyword = $request->session()->get('keyword');
        $num = count($keyword)-1;
        $animes = $request->session()->get('animes');
        
        for($i = $num; $i>=0; $i--){
            if($keyword[$i] != null && $animes[$i] != null){
                $keyword = $keyword[$i];
                $animes = $animes[$i];
                break;
            }else{
                //   
            }
        }
        //dd($animes);
        //dd($keyword);
        return view('anime_users/search', compact('animes', 'keyword'));
    }
}
