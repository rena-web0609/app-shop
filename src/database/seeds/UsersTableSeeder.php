<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => '東京',
            'email' => 'tokyo@a.com',
            'password' => bcrypt('tokyosecret'),
        ]);

        DB::table('users')->insert([
            'name' => '大阪',
            'email' => 'osaka@a.com',
            'password' => bcrypt('osakasecret'),
        ]);

        DB::table('users')->insert([
            'name' => '名古屋',
            'email' => 'nagoyaa@a.com',
            'password' => bcrypt('nagoyasecret'),
        ]);
    }
}
