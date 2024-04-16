<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    // 允許更新欄位的名單，寫白名單
    protected $fillable = [
        // 我資料庫的name可以被更動的
        'user_id',
        'address',
        'phone',
        'dountry',
    ];
    // (public民眾)
    public function user(){
        // 我要回應user表，利用user_id去做回應，1對1通常都是用(belongsTo屬於)去回應
        return $this->belongsTo(User::class,'user_id', 'id');
    }
}
