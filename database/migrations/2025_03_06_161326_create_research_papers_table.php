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
        Schema::create('research_papers', function (Blueprint $table) {
            $table->string('mabaiviet', 50)->primary();
            $table->string('tenbaiviet', 255);
            $table->string('mota', 255);
            $table->text('noidung');
            $table->text('path');
            $table->string('hinhanh', 255);
            $table->dateTime('ngaydang');
            $table->string('nguoidang', 50);
            $table->foreign('nguoidang')->references('tentaikhoan')->on('users');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('research_papers');
    }
};
