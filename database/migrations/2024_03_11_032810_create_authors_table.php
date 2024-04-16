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
        Schema::create('authors', function (Blueprint $table) {
            $table->id();
            // , 50 => 只有string才可以這樣用，可以跟局情況去調整，不見得每次都只寫string，不能每個都255會占空間
            $table->string('author_name', 50)->comment('作者姓名');
            // 注意!!php一定要分號結尾
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // (dropIfExists丟掉)
        Schema::dropIfExists('authors');
    }
};
