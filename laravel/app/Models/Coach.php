<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    use HasFactory;

    protected $table = 'coaches'; // 指定資料表名稱

    protected $fillable = [
        'user_id',         // 使用者 ID (外鍵)
        'hourly_rate',     // 每小時費用
        'bio',             // 簡介
        'available_locations', // 可用場地
    ];

    // 定義關聯，例如與 User 模型的關聯
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
