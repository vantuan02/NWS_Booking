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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id(); // id (int, primary key, auto increment)
            $table->unsignedBigInteger('hotel_id'); // Liên kết với bảng hotels
            $table->unsignedBigInteger('user_id'); // Liên kết với bảng users
            $table->decimal('rating', 2, 1); // Điểm đánh giá (thang 1-5)
            $table->text('comment'); // Nội dung đánh giá
            $table->softDeletes();
            $table->timestamps(); // created_at, updated_at

            // Khóa ngoại
            $table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
