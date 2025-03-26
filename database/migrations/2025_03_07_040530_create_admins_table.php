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
        Schema::create('admins', function (Blueprint $table) {
            $table->string('maquantri', 50)->primary();
            $table->string('tenquantri', 100);
            $table->string('hinhanh')->nullable();
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
        Schema::dropIfExists('admins');
    }
};
