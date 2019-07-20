<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->text('comment');
            $table->integer('price');
            $table->unsignedBigInteger('category_id');
            $table->text('pic');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
        });

        DB::table('products')->insert([
            'name' => 'ニット',
            'comment' => 'シンプルなニットです。',
            'price' => '3780',
            'pic' => 'a',
            'user_id' => '1',
            'category_id' => '0',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('products')->insert([
            'name' => 'Yシャツ',
            'comment' => 'シンプルなYシャツです。',
            'price' => '3780',
            'pic' => 'a',
            'user_id' => '1',
            'category_id' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('products')->insert([
            'name' => 'スニーカー',
            'comment' => '子供用のスニーカーです。',
            'price' => '3780',
            'pic' => 'a',
            'user_id' => '1',
            'category_id' => '2',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);


        DB::table('products')->insert([
            'name' => 'ノースリプルオーバー',
            'comment' => 'スタイルが良く見えるフレンチスリーブのTシャツです。首つまりのデザインも今年顔の１枚。',
            'price' => '3780',
            'pic' => 'a',
            'user_id' => '2',
            'category_id' => '0',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('products')->insert([
            'name' => 'アンゴラニット',
            'comment' => 'ふんわりとしたニットです。',
            'price' => '3780',
            'pic' => 'a',
            'user_id' => '3',
            'category_id' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
