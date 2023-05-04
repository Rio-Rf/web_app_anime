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
            'created_at'=>new $now(),
            'updated_at'=>new $now(),
        ]);
    }
}
