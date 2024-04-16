<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    use HasFactory;
    // 允許更新欄位的名單，寫白名單
    protected $fillable = [
        // 我資料庫的name可以被更動的
        'classification',
    ];


    public function Products(){
        // (搭起橋梁hasMany)我要對應(Products產品)成員的資料表 是用我的classification_id 對應對方的id
        return $this->hasMany(Products::class,'Product_Category', 'id');
    }
}
