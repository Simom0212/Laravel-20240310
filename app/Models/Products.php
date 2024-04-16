<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $fillable = [
        // 我資料庫的name可以被更動的
        'Product_Category',
        'Product_Name',
        'quantity',
        'price',
    ];

    public function productType(){
        // (搭起橋梁belongsTo)我要對應(member成員)的資料表 是用我的ID 對應對方的Product_Category
        return $this->belongsTo(ProductType::class,'Product_Category', 'id');
    }
}
