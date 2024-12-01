<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class ShopsFactory extends Factory
{
    protected $model = Shops::class;
    private static $IdCounter;
    private static $userIdCounter;

    public function __construct()
    {
        parent::__construct();
        if (self::$IdCounter === null) {
            self::$IdCounter = (DB::table('shops')->max('id') ?? 0) + 1;
        }

        if (self::$userIdCounter === null) {
            self::$userIdCounter = (DB::table('shops')->max('user_id') ?? 0) + 1;
        }
    }
    // public function __construct(){
    //     if(self::$IdCounter === null){
    //         self::$IdCounter = DB::table('shops')->max('id')+ 1;
    //     }
    
    //     if(self::$userIdCounter === null){
    //         self::$userIdCounter = DB::table('shops')->max('user_id')+ 1;
    //     }
    // }

    /**
     * Define the model's default state.
     *
     * @return array
     */
        

     public function definition()
     {
         $nextUserId = str_pad((int)self::$userIdCounter++, 5, '0', STR_PAD_LEFT);
     
         return [
             'id' => self::$IdCounter++, 
             'user_id' => $nextUserId,
             'name' => $this->faker->word . 'ショップ',
             'description' => $this->faker->realText(20),
             'created_at' => now(),
             'updated_at' => now(),
             'bunrui' => strval($this->faker->numberBetween(1, 5))
         ];
     }
}
// 'name' => $this->faker->realText(10),
// 'created_at' => date('Y-m-d H:i:s'),
// 'updated_at' => date('Y-m-d H:i:s'),
// 'user_id' => str_pad((int)$nextUserId,5,'0',STR_PAD_LEFT),