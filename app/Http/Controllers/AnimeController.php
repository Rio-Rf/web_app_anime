<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anime;
use App\Models\User;
use App\Models\Anime_user;
use App\Models\Like;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


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
        $anime_users_like = Anime_user::where('like', 1)->where('user_id', $user_id)->get();
        $anime_ids_like = $anime_users_like->pluck('anime_id');
        $animes_like = Anime::whereIn('id', $anime_ids_like)->get();
        //dd($animes_non);
        
        $user_id = $request->user()->id;
        $anime_users = Anime_user::where('user_id', $user_id)->where('like', 1)->get();
        //d($anime_user);
        return view('anime_users/index', compact('anime_users', 'animes_non', 'animes_mon', 'animes_tue', 'animes_wed', 'animes_thu', 'animes_fri', 'animes_sat', 'animes_sun', 'animes_like'));
    }
    public function index_like(Request $request, Anime $anime)
    {
        $anime_id = $anime->id;
        $user_id = $request->user()->id;
        //dd($anime);
        Anime_user::where('anime_id', $anime_id)//中間テーブルの操作はこの方法が適しているようだ
                    ->where('user_id', $user_id)
                    ->update(['like' => 1]);
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
        $anime_users_like = Anime_user::where('like', 1)->where('user_id', $user_id)->get();
        $anime_ids_like = $anime_users_like->pluck('anime_id');
        $animes_like = Anime::whereIn('id', $anime_ids_like)->get();
        //dd($animes_non);
        
        
        $anime_users = Anime_user::where('user_id', $user_id)->where('like', 1)->get();
        //d($anime_user);
        return view('anime_users/index', compact('anime_users', 'animes_non', 'animes_mon', 'animes_tue', 'animes_wed', 'animes_thu', 'animes_fri', 'animes_sat', 'animes_sun', 'animes_like'));
    }
    public function index_unlike(Request $request, Anime $anime)
    {
        $anime_id = $anime->id;
        $user_id = $request->user()->id;
        //dd($anime);
        Anime_user::where('anime_id', $anime_id)//中間テーブルの操作はこの方法が適しているようだ
                    ->where('user_id', $user_id)
                    ->update(['like' => 0]);
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
        $anime_users_like = Anime_user::where('like', 1)->where('user_id', $user_id)->get();
        $anime_ids_like = $anime_users_like->pluck('anime_id');
        $animes_like = Anime::whereIn('id', $anime_ids_like)->get();
        //dd($animes_non);
        
        
        $anime_users = Anime_user::where('user_id', $user_id)->where('like', 1)->get();
        //d($anime_user);
        return view('anime_users/index', compact('anime_users', 'animes_non', 'animes_mon', 'animes_tue', 'animes_wed', 'animes_thu', 'animes_fri', 'animes_sat', 'animes_sun', 'animes_like'));
    }
    public function ranking(Request $request)
    {
        //likeカラムの合計値をlike_countカラムに保存, 実在するanime_usersテーブルを直接指定して操作している
        $animeRanks = Anime::select('animes.*', DB::raw('SUM(anime_users.like) AS like_count'))
            ->leftJoin('anime_users', 'animes.id', '=', 'anime_users.anime_id')
            ->groupBy('animes.id', 'animes.title', 'animes.on_air_season', 'animes.img_path', 'animes.official_url', 'animes.created_at', 'animes.updated_at', 'animes.deleted_at') // グループ化する列
            ->orderByRaw('like_count DESC')
            ->paginate(10);
        //dd($animeRanks);
        
        $user_id = $request->user()->id;
        $anime_users = Anime_user::where('user_id', $user_id)->where('like', 1)->get();
        
        $before_like_count = $request->query('before_like_count');//前ページのURLからの変数を継承
        $count = $request->query('count');//前ページの順位のURLからの変数を継承
            return view('anime_users/ranking', compact('animeRanks', 'anime_users', 'before_like_count', 'count'));
    }
    public function ranking_like(Request $request, Anime $anime)
    {
        $anime_id = $anime->id;
        $user_id = $request->user()->id;
        $user = User::find($user_id);
        //dd($anime);
        $check = $anime->users()
                ->newPivotQuery()
                ->where('anime_id', $anime_id)
                ->where('user_id', $user_id)
                ->get('*');
        //dd($check);
        if($check->isEmpty()){//該当のanime_userレコードが存在しないときはlike=1で初期化
            $anime->users()->attach($user->id, [
                'edit_title' => 'none', 
                'edit_on_air_season' => 'none', 
                'edit_img_path' => 'none', 
                'day_of_week' => 'none', 
                'hours' => 0, 
                'minutes' => 0, 
                'medium' => 'none', 
                'official_url' => 'none', 
                'created_at' => now(), 
                'updated_at' => now(),
                'like' => 1
                ]);
        }else{        
            Anime_user::where('anime_id', $anime_id)//中間テーブルの操作はこの方法が適しているようだ
                        ->where('user_id', $user_id)
                        ->update(['like' => 1]);
        }
        //likeカラムの合計値をlike_countカラムに保存，実在するanime_usersテーブルを直接指定して操作している
        $animeRanks = Anime::select('animes.*', DB::raw('SUM(anime_users.like) AS like_count'))
            ->leftJoin('anime_users', 'animes.id', '=', 'anime_users.anime_id')
            ->groupBy('animes.id', 'animes.title', 'animes.on_air_season', 'animes.img_path', 'animes.official_url', 'animes.created_at', 'animes.updated_at', 'animes.deleted_at') // グループ化する列
            ->orderByRaw('like_count DESC')
            ->paginate(10);
        //dd($animeRanks);
        
        $anime_users = Anime_user::where('user_id', $user_id)->where('like', 1)->get();
        
        $before_like_count = $request->query('before_like_count');//前ページの変数を継承
        $count = $request->query('count');//前ページの順位の変数を継承
            return view('anime_users/ranking', compact('animeRanks', 'anime_users', 'before_like_count', 'count'));
    }
    public function ranking_unlike(Request $request, Anime $anime)
    {
        $anime_id = $anime->id;
        $user_id = $request->user()->id;
        //dd($anime);
        Anime_user::where('anime_id', $anime_id)//中間テーブルの操作はこの方法が適しているようだ
                    ->where('user_id', $user_id)
                    ->update(['like' => 0]);
                        
        //likeカラムの合計値をlike_countカラムに保存，実在するanime_usersテーブルを直接指定して操作している
        $animeRanks = Anime::select('animes.*', DB::raw('SUM(anime_users.like) AS like_count'))
            ->leftJoin('anime_users', 'animes.id', '=', 'anime_users.anime_id')
            ->groupBy('animes.id', 'animes.title', 'animes.on_air_season', 'animes.img_path', 'animes.official_url', 'animes.created_at', 'animes.updated_at', 'animes.deleted_at') // グループ化する列
            ->orderByRaw('like_count DESC')
            ->paginate(10);
        //dd($animeRanks);
        
        $anime_users = Anime_user::where('user_id', $user_id)->where('like', 1)->get();
        //dd($anime_users);
        
        $before_like_count = $request->query('before_like_count');//前ページの変数を継承
        $count = $request->query('count');//前ページの順位の変数を継承
            return view('anime_users/ranking', compact('animeRanks', 'anime_users', 'before_like_count', 'count'));
    }
    public function board()
    {
        return view('anime_users/board');
    }
    public function edit(Anime $anime, Request $request)
    {
        $anime_id = $anime->id;
        $user_id = $request->user()->id;
        $anime_user = Anime_user::where('anime_id', $anime_id)->where('user_id', $user_id)->get();
        if($anime_user->isEmpty()){
            $anime_user = new Anime_user;
        }else{
            $anime_user = $anime_user[0];
        }
        $like_count = Anime_user::where('anime_id', $anime_id)->where('like', 1)->count();
        return view('anime_users/edit', compact('anime', 'anime_user', 'like_count'));
    }
    public function search_get(Request $request)
    {
        $keyword = "タイトルを入力してください．";
        $query = Anime::query();
        $animes = $query->get();//検索ボックスが空の時にはすべてを表示する．
        $user_id = $request->user()->id;
        $anime_users = Anime_user::where('user_id', $user_id)->where('like', 1)->get();
        
        return view('anime_users/search', compact('keyword', 'animes', 'anime_users'));
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
        $user_id = $request->user()->id;
        $anime_users = Anime_user::where('user_id', $user_id)->where('like', 1)->get();
        return view('anime_users/search', compact('keyword', 'animes', 'anime_users'));
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
        $user_id = $request->user()->id;
        $anime_users = Anime_user::where('user_id', $user_id)->where('like', 1)->get();
        return view('anime_users/search', compact('keyword', 'animes', 'anime_users'));
    }
    public function search_like(Request $request, Anime $anime)
    {
        $anime_id = $anime->id;
        $user_id = $request->user()->id;
        $user = User::find($user_id);
        //dd($anime);
        $check = $anime->users()
                ->newPivotQuery()
                ->where('anime_id', $anime_id)
                ->where('user_id', $user_id)
                ->get('*');
        //dd($check);
        if($check->isEmpty()){//該当のanime_userレコードが存在しないときはlike=1で初期化
            $anime->users()->attach($user->id, [
                'edit_title' => 'none', 
                'edit_on_air_season' => 'none', 
                'edit_img_path' => 'none', 
                'day_of_week' => 'none', 
                'hours' => 0, 
                'minutes' => 0, 
                'medium' => 'none', 
                'official_url' => 'none', 
                'created_at' => now(), 
                'updated_at' => now(),
                'like' => 1
                ]);
        }else{        
            Anime_user::where('anime_id', $anime_id)//中間テーブルの操作はこの方法が適しているようだ
                        ->where('user_id', $user_id)
                        ->update(['like' => 1]);
        }
        $keyword = "タイトルを入力してください．";
        $query = Anime::query();
        $animes = $query->get();//検索ボックスが空の時にはすべてを表示する．
        $user_id = $request->user()->id;
        $anime_users = Anime_user::where('user_id', $user_id)->where('like', 1)->get();
        return view('anime_users/search', compact('keyword', 'animes', 'anime_users'));
    }
    public function search_unlike(Request $request, Anime $anime)
    {
        $anime_id = $anime->id;
        $user_id = $request->user()->id;
        //dd($anime);
        Anime_user::where('anime_id', $anime_id)//中間テーブルの操作はこの方法が適しているようだ
                    ->where('user_id', $user_id)
                    ->update(['like' => 0]);
        $keyword = "タイトルを入力してください．";
        $query = Anime::query();
        $animes = $query->get();//検索ボックスが空の時にはすべてを表示する．
        $user_id = $request->user()->id;
        $anime_users = Anime_user::where('user_id', $user_id)->where('like', 1)->get();
        return view('anime_users/search', compact('keyword', 'animes', 'anime_users'));
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
            Anime_user::where('anime_id', $anime_id)//中間テーブルの操作はこの方法が適しているようだ
                    ->where('user_id', $user_id)
                    ->update([
                        'day_of_week' => $day_of_week, 
                        'hours' => $hour, 
                        'minutes' => $minute, 
                        'medium' => $medium, 
                        'created_at' => now(), 
                        'updated_at' => now()
                    ]);
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
        $anime_users_like = Anime_user::where('like', 1)->where('user_id', $user_id)->get();
        $anime_ids_like = $anime_users_like->pluck('anime_id');
        $animes_like = Anime::whereIn('id', $anime_ids_like)->get();
        //dd($check);
        $user_id = $request->user()->id;
        $anime_users = Anime_user::where('user_id', $user_id)->where('like', 1)->get();
        
        return view('anime_users/index', compact('anime_users', 'animes_like', 'animes_non', 'animes_mon', 'animes_tue', 'animes_wed', 'animes_thu', 'animes_fri', 'animes_sat', 'animes_sun'));
    }
    public function detail(Anime $anime, Request $request)
    {
        $anime_id = $anime->id;
        $user_id = $request->user()->id;
        $user = User::find($user_id);
        $check = $anime->users()
                ->newPivotQuery()
                ->where('anime_id', $anime_id)
                ->where('user_id', $user_id)
                ->get('*');
        //dd($check);
        if($check->isEmpty()){//該当のanime_userレコードが存在しないときはlike=1で初期化
            $anime->users()->attach($user->id, [
                'edit_title' => 'none', 
                'edit_on_air_season' => 'none', 
                'edit_img_path' => 'none', 
                'day_of_week' => 'none', 
                'hours' => 0, 
                'minutes' => 0, 
                'medium' => 'none', 
                'official_url' => 'none', 
                'created_at' => now(), 
                'updated_at' => now(),
                'like' => 0
                ]);
        }else{        
            //
        }
        $anime_user = Anime_user::where('anime_id', $anime_id)->where('user_id', $user_id)->get();
        //dd($anime_user);
        $anime_user = $anime_user[0];
        //dd($anime_user);
        $like_count = Anime_user::where('anime_id', $anime_id)->where('like', 1)->count();
        return view('anime_users/detail', compact('anime', 'anime_user', 'like_count'));
    }
    public function delete(Anime $anime, Request $request)
    {
        $anime_id = $anime->id;
        $user_id = $request->user()->id;
        Anime_user::where('anime_id', $anime_id)->where('user_id', $user_id)->forceDelete();
        //dd($anime_user);
        return $this->index($request);
    }
    public function edit_like(Anime $anime, Request $request)//中間テーブルを2つ作る方法はないようだ
    {
        $anime_id = $anime->id;
        //dd($anime);
        $anime = Anime::find($anime_id);
        $user_id = Auth::id();
        $user = User::find($user_id);
        //$check = DB::table('anime_users')->select('day_of_week')->get();//登録後かどうかを判別する，nullableではないから
        $user = User::find($user_id);
        
        $anime_user = Anime_user::where('anime_id', $anime_id)->where('user_id', $user_id)->get();
        if($anime_user->isEmpty()){
            $anime->users()->attach($user->id, [
                'edit_title' => 'none', 
                'edit_on_air_season' => 'none', 
                'edit_img_path' => 'none', 
                'day_of_week' => 'none', 
                'hours' => 0, 
                'minutes' => 0, 
                'medium' => 'none', 
                'official_url' => 'none', 
                'created_at' => now(), 
                'updated_at' => now()
                ]);
        }else{
            $anime_user = $anime_user[0];
        }
        Anime_user::where('anime_id', $anime_id)//中間テーブルの操作はこの方法が適しているようだ
                    ->where('user_id', $user_id)
                    ->update(['like' => 1]);
        //dd($anime_user);
        $anime_user = Anime_user::where('anime_id', $anime_id)->where('user_id', $user_id)->get();//$anime_userを更新
        $anime_user = $anime_user[0];
        $like_count = Anime_user::where('anime_id', $anime_id)->where('like', 1)->count();
        //dd($anime_user);
        return view('anime_users/edit', compact('anime', 'like_count', 'anime_user'));
    }
    public function edit_unlike(Anime $anime, Request $request)//中間テーブルを2つ作る方法はないようだ
    {
        $anime_id = $anime->id;
        //dd($anime);
        $anime = Anime::find($anime_id);
        $user_id = Auth::id();
        $user = User::find($user_id);
        
        $anime_user = Anime_user::where('anime_id', $anime_id)->where('user_id', $user_id)->get();
        if($anime_user->isEmpty()){
            $anime->users()->attach($user->id, [
                'edit_title' => 'none', 
                'edit_on_air_season' => 'none', 
                'edit_img_path' => 'none', 
                'day_of_week' => 'none', 
                'hours' => 0, 
                'minutes' => 0, 
                'medium' => 'none', 
                'official_url' => 'none', 
                'created_at' => now(), 
                'updated_at' => now()
                ]);
        }else{
            $anime_user = $anime_user[0];
        }
        Anime_user::where('anime_id', $anime_id)//中間テーブルの操作はこの方法が適しているようだ
                    ->where('user_id', $user_id)
                    ->update(['like' => 0]);
        $anime_user = Anime_user::where('anime_id', $anime_id)->where('user_id', $user_id)->get();//$anime_userを更新
        $anime_user = $anime_user[0];
        $like_count = Anime_user::where('anime_id', $anime_id)->where('like', 1)->count();
        return view('anime_users/edit', compact('anime', 'like_count', 'anime_user'));
    }
    public function detail_like(Anime $anime, Request $request)//中間テーブルを2つ作る方法はないようだ
    {
        $anime_id = $anime->id;
        //dd($anime);
        $anime = Anime::find($anime_id);
        $user_id = Auth::id();
        $user = User::find($user_id);
        //$check = DB::table('anime_users')->select('day_of_week')->get();//登録後かどうかを判別する，nullableではないから
        $user = User::find($user_id);
        
        $anime_user = Anime_user::where('anime_id', $anime_id)->where('user_id', $user_id)->get();
        if($anime_user->isEmpty()){
            $anime->users()->attach($user->id, [
                'edit_title' => 'none', 
                'edit_on_air_season' => 'none', 
                'edit_img_path' => 'none', 
                'day_of_week' => 'none', 
                'hours' => 0, 
                'minutes' => 0, 
                'medium' => 'none', 
                'official_url' => 'none', 
                'created_at' => now(), 
                'updated_at' => now()
                ]);
        }else{
            $anime_user = $anime_user[0];
        }
        Anime_user::where('anime_id', $anime_id)//中間テーブルの操作はこの方法が適しているようだ
                    ->where('user_id', $user_id)
                    ->update(['like' => 1]);
        //dd($anime_user);
        $anime_user = Anime_user::where('anime_id', $anime_id)->where('user_id', $user_id)->get();//$anime_userを更新
        $anime_user = $anime_user[0];
        $like_count = Anime_user::where('anime_id', $anime_id)->where('like', 1)->count();
        //dd($anime_user);
        return view('anime_users/detail', compact('anime', 'like_count', 'anime_user'));
    }
    public function detail_unlike(Anime $anime, Request $request)//中間テーブルを2つ作る方法はないようだ
    {
        $anime_id = $anime->id;
        //dd($anime);
        $anime = Anime::find($anime_id);
        $user_id = Auth::id();
        $user = User::find($user_id);
        
        $anime_user = Anime_user::where('anime_id', $anime_id)->where('user_id', $user_id)->get();
        if($anime_user->isEmpty()){
            $anime->users()->attach($user->id, [
                'edit_title' => 'none', 
                'edit_on_air_season' => 'none', 
                'edit_img_path' => 'none', 
                'day_of_week' => 'none', 
                'hours' => 0, 
                'minutes' => 0, 
                'medium' => 'none', 
                'official_url' => 'none', 
                'created_at' => now(), 
                'updated_at' => now()
                ]);
        }else{
            $anime_user = $anime_user[0];
        }
        Anime_user::where('anime_id', $anime_id)//中間テーブルの操作はこの方法が適しているようだ
                    ->where('user_id', $user_id)
                    ->update(['like' => 0]);
        $anime_user = Anime_user::where('anime_id', $anime_id)->where('user_id', $user_id)->get();//$anime_userを更新
        $anime_user = $anime_user[0];
        $like_count = Anime_user::where('anime_id', $anime_id)->where('like', 1)->count();
        return view('anime_users/detail', compact('anime', 'like_count', 'anime_user'));
    }
}
