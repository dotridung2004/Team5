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
        Schema::create('news', function (Blueprint $table) {
            $table->string('matintuc', 50)->primary();
            $table->string('tentintuc', 255);
            $table->text('mota');
            $table->text('path');
            $table->text('noidung');
            $table->enum('trangthai', ['pending', 'public', 'rejected'])->default('pending');
            $table->string('nguoidang', 50);
            $table->foreign('nguoidang')->references('tentaikhoan')->on('users');
            $table->text('lydotuchoi')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
