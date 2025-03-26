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
        Schema::create('students', function (Blueprint $table) {
            $table->string('masinhvien', 50)->primary();
            $table->string('tensinhvien', 100);
            $table->string('hinhanh')->nullable();
            $table->string('khoa', 100)->nullable();
            $table->string('lop', 100)->nullable();
            $table->string('ngaysinh', 50);
            $table->string('gioitinh', 50);
            $table->string('quequan', 255)->nullable();
            $table->string('tentaikhoan', 50);
            $table->foreign('tentaikhoan')->references('tentaikhoan')->on('users');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
