<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anime;
use App\Models\User;
use App\Models\Anime_user;
use Carbon\Carbon;

class AnimeController extends Controller
{
    public function index(Request $request)
    {
        $user_id = $request->user()->id;
        $anime_users_non = Anime_user::where('day_of_week', 'non')->where('user_id', $user_id)->get();//曜日がnonかつログイン中のuser_idのレコードを取得
        $anime_ids_non = $anime_users_non->pluck('anime_id');//anime_idの配列を取得
        $animes_non = Anime::whereIn('id', $anime_ids_non)->get();//animesテーブルのidが$anime_idsに一致するものを取得
        $anime_users_mon = Anime_user::where('day_of_week', 'mon')->where('user_id', $user_id)->get();
        $anime_ids_mon = $anime_users_mon->pluck('anime_id');
        $animes_mon = Anime::whereIn('id', $anime_ids_mon)->get();
        $anime_users_tue = Anime_user::where('day_of_week', 'tue')->where('user_id', $user_id)->get();
        $anime_ids_tue = $anime_users_tue->pluck('anime_id');
        $animes_tue = Anime::whereIn('id', $anime_ids_tue)->get();
        $anime_users_wed = Anime_user::where('day_of_week', 'wed')->where('user_id', $user_id)->get();
        $anime_ids_wed = $anime_users_wed->pluck('anime_id');
        $animes_wed = Anime::whereIn('id', $anime_ids_wed)->get();
        $anime_users_thu = Anime_user::where('day_of_week', 'thu')->where('user_id', $user_id)->get();
        $anime_ids_thu = $anime_users_thu->pluck('anime_id');
        $animes_thu = Anime::whereIn('id', $anime_ids_thu)->get();
        $anime_users_fri = Anime_user::where('day_of_week', 'fri')->where('user_id', $user_id)->get();
        $anime_ids_fri = $anime_users_fri->pluck('anime_id');
        $animes_fri = Anime::whereIn('id', $anime_ids_fri)->get();
        $anime_users_sat = Anime_user::where('day_of_week', 'sat')->where('user_id', $user_id)->get();
        $anime_ids_sat = $anime_users_sat->pluck('anime_id');
        $animes_sat = Anime::whereIn('id', $anime_ids_sat)->get();
        $anime_users_sun = Anime_user::where('day_of_week', 'sun')->where('user_id', $user_id)->get();
        $anime_ids_sun = $anime_users_sun->pluck('anime_id');
        $animes_sun = Anime::whereIn('id', $anime_ids_sun)->get();
        //dd($animes_non);
        return view('anime_users/index', compact('animes_non', 'animes_mon', 'animes_tue', 'animes_wed', 'animes_thu', 'animes_fri', 'animes_sat', 'animes_sun'));
    }
    public function ranking()
    {
        return view('anime_users/ranking');
    }
    public function board()
    {
        return view('anime_users/board');
    }
    public function edit(Anime $anime)
    {
        return view('anime_users/edit', compact('anime'));
    }
    public function search_get()
    {
        $keyword = "タイトルを入力してください．";
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
        //$request->session()->flush();//セッションを全て削除する．
        $request->session()->forget('animes');
        $request->session()->push('animes', $animes);
        $request->session()->push('keyword', $keyword);
        //dd($animes);
        return view('anime_users/search', compact('keyword', 'animes'));
    }
    public function search_session(Request $request)
    {
        $keyword = $request->session()->get('keyword');
        $animes = $request->session()->get('animes');
        //dd($animes);
        //dd($keyword);
        if($animes == null){
            $query = Anime::query();
        $animes = $query->get();
        }else{
            $num = count($animes)-1;
            for($i = $num; $i>=0; $i--){
                if($keyword[$i] != null && $animes[$i] != null){
                    $keyword = $keyword[$i];
                    $animes = $animes[$i];
                    break;
                }else if($keyword[$i] == null && $animes[$i] != null){
                    $keyword = "タイトルを入力してください．";
                    $animes = $animes[$i];
                    break;
                }else{
                    $keyword="タイトルを入力してください．";
                    $animes = $animes[$i];
                }
            }
        }
        //dd($animes);
        //dd($keyword);
        return view('anime_users/search', compact('keyword', 'animes'));
    }
    public function edit_post(Request $request)
    {
        $anime_id = (int)$request['anime_id'];
        $user_id = $request->user()->id;
        
        $day_of_week = $_POST['day_of_week'];
        $time = $request['time'];
        $carbonTime = Carbon::createFromFormat('H:i', $time);
        $hour = $carbonTime->hour;
        $minute = $carbonTime->minute;
        $medium = $_POST['medium'];
        $anime_user = new Anime_user;
        $anime_user->day_of_week = $day_of_week;
        $anime_user->hours = $hour;
        $anime_user->minutes = $minute;
        $anime_user->medium = $medium;
        
        $anime = Anime::find($anime_id);
        $user = User::find($user_id);
        //$check = $anime->users()->select('users.*', 'anime_users.anime_id', 'anime_users.user_id')->wherePivot('anime_id', $anime_id)->wherePivot('user_id', $user_id)->get(); //中間テーブルへのアクセスには中間テーブルのモデルを使わない
       $check = $anime->users()
                ->newPivotQuery()
                ->where('anime_id', $anime_id)
                ->where('user_id', $user_id)
                ->get('*');

        //dd($check); //検索結果が無かった場合空のコレクションを返すので$checkはnullではなく空という認識
        if($check->isEmpty()){
            $anime->users()->attach($user->id, [
                'edit_title' => 'none', 
                'edit_on_air_season' => 'none', 
                'edit_img_path' => 'none', 
                'day_of_week' => $day_of_week, 
                'hours' => $hour, 
                'minutes' => $minute, 
                'medium' => $medium, 
                'official_url' => 'none', 
                'created_at' => now(), 
                'updated_at' => now()
                ]);
        }else{
            //
        }
        
        $anime_users_non = Anime_user::where('day_of_week', 'non')->where('user_id', $user_id)->get();//曜日がnonかつログイン中のuser_idのレコードを取得
        $anime_ids_non = $anime_users_non->pluck('anime_id');//anime_idの配列を取得
        $animes_non = Anime::whereIn('id', $anime_ids_non)->get();//animesテーブルのidが$anime_idsに一致するものを取得
        $anime_users_mon = Anime_user::where('day_of_week', 'mon')->where('user_id', $user_id)->get();
        $anime_ids_mon = $anime_users_mon->pluck('anime_id');
        $animes_mon = Anime::whereIn('id', $anime_ids_mon)->get();
        $anime_users_tue = Anime_user::where('day_of_week', 'tue')->where('user_id', $user_id)->get();
        $anime_ids_tue = $anime_users_tue->pluck('anime_id');
        $animes_tue = Anime::whereIn('id', $anime_ids_tue)->get();
        $anime_users_wed = Anime_user::where('day_of_week', 'wed')->where('user_id', $user_id)->get();
        $anime_ids_wed = $anime_users_wed->pluck('anime_id');
        $animes_wed = Anime::whereIn('id', $anime_ids_wed)->get();
        $anime_users_thu = Anime_user::where('day_of_week', 'thu')->where('user_id', $user_id)->get();
        $anime_ids_thu = $anime_users_thu->pluck('anime_id');
        $animes_thu = Anime::whereIn('id', $anime_ids_thu)->get();
        $anime_users_fri = Anime_user::where('day_of_week', 'fri')->where('user_id', $user_id)->get();
        $anime_ids_fri = $anime_users_fri->pluck('anime_id');
        $animes_fri = Anime::whereIn('id', $anime_ids_fri)->get();
        $anime_users_sat = Anime_user::where('day_of_week', 'sat')->where('user_id', $user_id)->get();
        $anime_ids_sat = $anime_users_sat->pluck('anime_id');
        $animes_sat = Anime::whereIn('id', $anime_ids_sat)->get();
        $anime_users_sun = Anime_user::where('day_of_week', 'sun')->where('user_id', $user_id)->get();
        $anime_ids_sun = $anime_users_sun->pluck('anime_id');
        $animes_sun = Anime::whereIn('id', $anime_ids_sun)->get();
        //dd($animes_mon);
        return view('anime_users/index', compact('animes_non', 'animes_mon', 'animes_tue', 'animes_wed', 'animes_thu', 'animes_fri', 'animes_sat', 'animes_sun'));
    }
}
