<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Shops extends Model
{
    use HasFactory;
    // protected $table = '実際のテーブル名'
    protected $table = 'shops';

    // Bunruisテーブルとのリレーション
    public function bunrui(): BelongsTo{
        return $this->belongsTo(Bunrui::class,'shop_bunrui','id');
    }
    
}
// モデル名を指定するとララベルが自動的にmodelテーブルがあると推測し、そこからデータがする。
// 実際のテーブル名が異なる場合は$tableプロパティを使ってテーブル名を指定する。