<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use DateTime;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'ゲストユーザー',
            'email' => 'guest@guest.com',
            'password' => Hash::make('guestuser'),
            'icon_file_path' => 'default_value',
            'birthday' => 'default_value',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
        DB::table('users')->insert([
            'id' => 2,
            'name' => 'ホストユーザー',
            'email' => 'host@host.com',
            'password' => Hash::make('hostuser'),
            'icon_file_path' => 'default_value',
            'birthday' => 'default_value',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ]);
    }
}
