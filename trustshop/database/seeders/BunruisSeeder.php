<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BunruisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       \DB::table('bunruis')->insert([
        [
            'koumoku' => '雑貨',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => null,
        ],
        [
            'koumoku' => 'コスメ',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => null,
        ],
        [
            'koumoku' => '食料品',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => null,
        ],
        [
            'koumoku' => '衣料品',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => null,
        ],
        [
            'koumoku' => '家具',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => null,
        ],

    ]);
    }
}
