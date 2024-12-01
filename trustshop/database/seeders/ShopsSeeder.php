<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Shops;

class ShopsSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::statement('ALTER TABLE shops AUTO_INCREMENT = 1');

        $maxUserId = \DB::table('shops')->max('user_id');

        $nextUserId = str_pad((int)$maxUserId+1, 5, '0', STR_PAD_LEFT);

        $data = [
              [ 'user_id' => str_pad((int)$nextUserId,5,'0',STR_PAD_LEFT),
                'name' => 'gohanショップ',
                'description' => '美味しいご飯作りをサポートします',
                'created_at' => now(),
                'updated_at' => now(),
                'bunrui' => '3',
            ],
            [
                'user_id' => str_pad((int)$nextUserId+1,5,'0',STR_PAD_LEFT),
                'name' => 'naturalショップ',
                'description' => '快適な住まいをご提案',
                'created_at' => now(),
                'updated_at' => now(),
                'bunrui' => '3',
            ],
           [
                'user_id' => str_pad((int)$nextUserId+2,5,'0',STR_PAD_LEFT),
                'name' => 'もふもふショップ',
                'description' => 'トレンドをいち早くお届け！',
                'created_at' => now(),
                'updated_at' => now(),
                'bunrui' => '4',
            ]
           ];
        
           \DB::table('shops')->insert($data);
   }
}



           
    // }     



    // Shops::factory()->count(3)->create(); 