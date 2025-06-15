<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bunrui extends Model
{
    use HasFactory;
    protected $table = 'bunruis';

    // Shopsテーブルとのリレーション
    public function shops(): HasMany{
        return $this->hasMany(Shops::class,'shop_bunrui','id');
    }
}
