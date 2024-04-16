<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('Product_Category')->comment('商品類別');
            $table->string('Product_Name')->comment('商品名稱');
            $table->integer('quantity')->comment('數量');
            $table->integer('price')->comment('價錢');
            // (timestamps更新、上傳資料庫的時間)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
