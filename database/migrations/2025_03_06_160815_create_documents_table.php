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
        Schema::create('documents', function (Blueprint $table) {
            $table->string('matailieu', 50)->primary();
            $table->string('tentailieu', 255);
            $table->text('hinhanh');
            $table->text('path');
            $table->text('noidung');
            $table->dateTime('ngaydang');
            $table->boolean('trangthaiduyet')->default(false); // Trạng thái duyệt
            $table->text('lydoan')->nullable();
            $table->string('nguoidang', 50)->nullable();
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
        Schema::dropIfExists('documents');
    }
};
