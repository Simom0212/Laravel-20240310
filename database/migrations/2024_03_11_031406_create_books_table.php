<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // up是執行，down是倒退，往前往後的意思
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            // (comment定義他叫書名)
            $table->string('name')->comment('書名');
            // (nullable允許空值、不輸入)
            $table->integer('price')->nullable();
            // (timestamps更新、上傳資料庫的時間)
            $table->timestamps('');
        });
    }

    /**
     * Reverse the migrations.
     */
    // up是執行，down是倒退，往前往後的意思
    public function down(): void
    {
        // (dropIfExists丟掉)
        Schema::dropIfExists('books');
    }
};
