<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Anime;

class AnimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     
    public function run()
    {
        Anime::chunk(100, function ($records) {//チャンクごとにまとめて削除，すべてのレコードを削除
            foreach ($records as $record) {
                $record->delete();
            }
        });
        $now = new \DateTime();
        //キービジュアル = メインビジュアル != ティザービジュアル
        DB::table('animes')->insert([
            'title'=>'鬼滅の刃刀鍛冶の里偏',
            'on_air_season'=>'2023年春アニメ',
            'img_path'=>'https://lh3.googleusercontent.com/d/1X7WT1OFCH1WtRa1jnXSwlmIrMJJ1bava',
            'official_url'=>'https://kimetsu.com/anime/katanakajinosatohen/',
            'created_at'=>new $now(),
            'updated_at'=>new $now(),
        ]);
        DB::table('animes')->insert([
            'title'=>'推しの子',
            'on_air_season'=>'2023年春アニメ',
            'img_path'=>'https://lh3.googleusercontent.com/d/1-41UswhX_bnue1v1bFIhwblj-dhlMeC1',
            'official_url'=>'https://ichigoproduction.com/',
            'created_at'=>new $now(),
            'updated_at'=>new $now(),
        ]);
        DB::table('animes')->insert([
            'title'=>'久保さんは僕を許さない',
            'on_air_season'=>'2023年春アニメ',
            'img_path'=>'https://lh3.googleusercontent.com/d/1-9of4v6M_8fegH3DSihhlnvsU_Ee2eh9',
            'official_url'=>'https://kubosan-anime.jp/',
            'created_at'=>new $now(),
            'updated_at'=>new $now(),
        ]);
        DB::table('animes')->insert([
            'title'=>'この素晴らしい世界に爆焔を！',
            'on_air_season'=>'2023年春アニメ',
            'img_path'=>'https://lh3.googleusercontent.com/d/1-86O71be7j-1bGQuoqMKyWa3_7mo-RmO',
            'official_url'=>'http://konosuba.com/bakuen/',
            'created_at'=>new $now(),
            'updated_at'=>new $now(),
        ]);
        DB::table('animes')->insert([
            'title'=>'天国大魔境',
            'on_air_season'=>'2023年春アニメ',
            'img_path'=>'https://lh3.googleusercontent.com/d/1-OnPnrVRE9nehei9C3EMYKdOwYYu99Uu',
            'official_url'=>'https://tdm-anime.com/',
            'created_at'=>new $now(),
            'updated_at'=>new $now(),
        ]);
        DB::table('animes')->insert([
            'title'=>'機動戦士ガンダム 水星の魔女 Season2',
            'on_air_season'=>'2023年春アニメ',
            'img_path'=>'https://lh3.googleusercontent.com/d/1-cD6zGZnMblDwwWUpx9H6H0zNytr14qB',
            'official_url'=>'https://g-witch.net/',
            'created_at'=>new $now(),
            'updated_at'=>new $now(),
        ]);
        DB::table('animes')->insert([
            'title'=>'スパイ教室',
            'on_air_season'=>'2023年冬アニメ',
            'img_path'=>'https://lh3.googleusercontent.com/d/1-L8P_PwBkV4yx2T_Iet3BK8DI0KAtkx2',
            'official_url'=>'https://spyroom-anime.com/',
            'created_at'=>new $now(),
            'updated_at'=>new $now(),
        ]);
        DB::table('animes')->insert([
            'title'=>'機動戦士ガンダム 水星の魔女',
            'on_air_season'=>'2022年秋アニメ',
            'img_path'=>'https://lh3.googleusercontent.com/d/1-UrHCRV_-yJ7XojeAJL6qSfZnLOg6EOi',
            'official_url'=>'https://g-witch.net/',
            'created_at'=>new $now(),
            'updated_at'=>new $now(),
        ]);
        DB::table('animes')->insert([
            'title'=>'僕の心のヤバイやつ',
            'on_air_season'=>'2023年春アニメ',
            'img_path'=>'https://lh3.googleusercontent.com/d/1-iUo24-LwV0yPcNaz7qMUyIWQdhsAdlP',
            'official_url'=>'https://bokuyaba-anime.com/',
            'created_at'=>new $now(),
            'updated_at'=>new $now(),
        ]);
        DB::table('animes')->insert([
            'title'=>'地獄楽',
            'on_air_season'=>'2023年春アニメ',
            'img_path'=>'https://lh3.googleusercontent.com/d/1-ks2pT_lIhX_uCBeIuUWqt1TPgh8xU6D',
            'official_url'=>'https://www.jigokuraku.com/',
            'created_at'=>new $now(),
            'updated_at'=>new $now(),
        ]);
        DB::table('animes')->insert([
            'title'=>'無職転生 ～異世界行ったら本気だす～',
            'on_air_season'=>'2021年冬アニメ',
            'img_path'=>'https://lh3.googleusercontent.com/d/1-y7IjHiTpEGRLtX2ihwgoTi76iTwQ1Oc',
            'official_url'=>'https://mushokutensei.jp/',
            'created_at'=>new $now(),
            'updated_at'=>new $now(),
        ]);
        DB::table('animes')->insert([
            'title'=>'無職転生 ～異世界行ったら本気だす～ 第2クール',
            'on_air_season'=>'2021年秋アニメ',
            'img_path'=>'https://lh3.googleusercontent.com/d/1-ypnFEB6QFRt9zUHx5eWOax1RV6sj8p8',
            'official_url'=>'https://mushokutensei.jp/',
            'created_at'=>new $now(),
            'updated_at'=>new $now(),
        ]);
        DB::table('animes')->insert([
            'title'=>'チェンソーマン',
            'on_air_season'=>'2022年秋アニメ',
            'img_path'=>'https://lh3.googleusercontent.com/d/1-zFZEDs9kvoP22S6OzPri9VXH0thDGGh',
            'official_url'=>'https://chainsawman.dog/',
            'created_at'=>new $now(),
            'updated_at'=>new $now(),
        ]);
        DB::table('animes')->insert([
            'title'=>'転生したら剣でした',
            'on_air_season'=>'2022年秋アニメ',
            'img_path'=>'https://lh3.googleusercontent.com/d/1-zIb9HVzsub_nV362z4Rd-oiTyDVXGGh',
            'official_url'=>'https://tenken-anime.com/',
            'created_at'=>new $now(),
            'updated_at'=>new $now(),
        ]);
    }
}
/*
DB::table('animes')->insert([
            'title'=>'',
            'on_air_season'=>'20年アニメ',
            'img_path'=>'',
            'official_url'=>'',
            'created_at'=>new $now(),
            'updated_at'=>new $now(),
        ]);
*/
