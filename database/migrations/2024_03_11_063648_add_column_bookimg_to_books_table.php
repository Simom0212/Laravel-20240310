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
        Schema::table('books', function (Blueprint $table) {
            // 加一個新的欄位進去
            // (after 在...東西後面)
            $table->longText('bookimg')->after('price')->comment('書本圖片');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            // rollback回去，所以要再把bookimg丟掉，這一定要寫很重要，不要偷懶不寫
            $table->dropColumn('bookimg');
        });
    }
};
