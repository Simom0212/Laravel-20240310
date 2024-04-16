<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // 允許更新欄位的名單，寫白名單
    protected $fillable = [
        // 我資料庫的name可以被更動的
        'name',
        'price',
        'bookimg',
    ];
}
