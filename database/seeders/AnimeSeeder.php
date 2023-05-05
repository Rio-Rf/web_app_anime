<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     
    public function run()
    {
        $now = new \DateTime();
        
        DB::table('animes')->insert([
            'title'=>'鬼滅の刃刀鍛冶の里偏',
            'on_air_season'=>'2023年春アニメ',
            'img_pass'=>'img_katanakaji.jpg',
            'official_url'=>'https://kimetsu.com/anime/katanakajinosatohen/',
            'created_at'=>new $now(),
            'updated_at'=>new $now(),
        ]);
        DB::table('animes')->insert([
            'title'=>'推しの子',
            'on_air_season'=>'2023年春アニメ',
            'img_pass'=>'oshinoko.webp',
            'official_url'=>'https://ichigoproduction.com/',
            'created_at'=>new $now(),
            'updated_at'=>new $now(),
        ]);
        DB::table('animes')->insert([
            'title'=>'久保さんは僕を許さない',
            'on_air_season'=>'2023年春アニメ',
            'img_pass'=>'kubosan.webp',
            'official_url'=>'https://kubosan-anime.jp/',
            'created_at'=>new $now(),
            'updated_at'=>new $now(),
        ]);
        DB::table('animes')->insert([
            'title'=>'この素晴らしい世界に爆焔を！',
            'on_air_season'=>'2023年春アニメ',
            'img_pass'=>'konosuba_bakuen.png',
            'official_url'=>'http://konosuba.com/bakuen/',
            'created_at'=>new $now(),
            'updated_at'=>new $now(),
        ]);
        DB::table('animes')->insert([
            'title'=>'天国大魔境',
            'on_air_season'=>'2023年春アニメ',
            'img_pass'=>'tengokudaimakyou.jfif',
            'official_url'=>'https://tdm-anime.com/',
            'created_at'=>new $now(),
            'updated_at'=>new $now(),
        ]);
        
    }
}
