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
        Schema::create('feedback', function (Blueprint $table) {
            $table->string('mathacmac', 50)->primary();
            $table->string('nguoigui', 50); // Người gửi thắc mắc
            $table->foreign('nguoigui')->references('tentaikhoan')->on('users');
            $table->text('noidung'); // Nội dung thắc mắc
            $table->text('phanhoi')->nullable(); // Nội dung phản hồi
            $table->dateTime('ngaythacmac'); // Ngày gửi thắc mắc
            $table->dateTime('ngayphanhoi')->nullable(); // Ngày phản hồi
            $table->string('nguoiphanhoi', 50)->nullable(); // Người phản hồi
            $table->foreign('nguoiphanhoi')->references('tentaikhoan')->on('users');
            $table->enum('trangthai', ['pending', 'processing', 'resolved'])->default('pending'); // Trạng thái
            $table->string('mabaiviet', 50)->nullable(); // Liên kết với bài viết (nếu có)
            $table->foreign('mabaiviet')->references('matintuc')->on('news');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback');
    }
};
