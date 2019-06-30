<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $addresses = ['北海道', '東北', '関東', '中部', '近畿', '中国・四国', '九州・沖縄'];

        foreach ($addresses as $address) {
            DB::table('addresses')->insert([
                'name' => $address,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
