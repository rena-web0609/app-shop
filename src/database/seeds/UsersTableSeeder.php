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
            'email' => 'aaa@a.com',
            'password' => bcrypt('aaaaaaaa'),
        ]);
    }
}
