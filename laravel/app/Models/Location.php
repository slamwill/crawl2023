<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    // 定義與資料表的關聯
    protected $table = 'locations';

    // 定義可批量賦值的屬性
    protected $fillable = [
        'name',             // 場地名稱
        'address',          // 地址
        'hourly_rate',      // 每小時費用
        'capacity',         // 容量
        'description',      // 場地描述
        'created_at',       // 建立時間
        'updated_at'        // 更新時間
    ];

    // 如果需要，可以定義關聯方法，例如場地與教練的關聯
    public function coaches()
    {
        return $this->hasMany(Coach::class);
    }
}
