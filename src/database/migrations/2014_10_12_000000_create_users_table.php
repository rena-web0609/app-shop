<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            'id' => '1',
            'name' => '東京',
            'email' => 'tokyo@a.com',
            'password' => bcrypt('tokyosecret'),
        ]);

        DB::table('users')->insert([
            'id' => '2',
            'name' => '大阪',
            'email' => 'osaka@a.com',
            'password' => bcrypt('osakasecret'),
        ]);

        DB::table('users')->insert([
            'id' => '3',
            'name' => '名古屋',
            'email' => 'nagoya@a.com',
            'password' => bcrypt('nagoyasecret'),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
