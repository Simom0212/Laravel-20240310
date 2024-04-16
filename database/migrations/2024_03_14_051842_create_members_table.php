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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->comment('會員id');
            $table->longtext('address')->comment('地址');
            $table->string('phone')->comment('電話');
            $table->string('dountry')->comment('國籍');
            // (timestamps更新、上傳資料庫的時間)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    // up是執行，down是倒退，往前往後的意思
     public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
