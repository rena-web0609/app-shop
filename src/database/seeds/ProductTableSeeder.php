<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'ドットノースリプルオーバー',
            'comment' => '去年の夏に大人気で完売していた商品が数量限定で待望の再入荷！！今季トレンドのワッフル素材にドット柄が登場。スタイルが良く見えるフレンチスリーブのTシャツです。首つまりのデザインも今年顔の１枚。春はカーデやシャツのインナー、夏は１枚でメインに着てもさらっと着て頂けます。',
            'price' => '3780',
            'category_id' => 1,
            'pic' => 'a',
            'user_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
