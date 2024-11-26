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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id(); // id (primary key, auto increment)
            $table->unsignedBigInteger('user_id'); // Liên kết với bảng users
            $table->unsignedBigInteger('room_id'); // Liên kết với bảng rooms
            $table->date('check_in_date'); // Ngày check-in
            $table->date('check_out_date'); // Ngày check-out
            $table->decimal('total_price', 10, 2); // Tổng tiền đặt phòng
            $table->enum('status', ['pending', 'confirmed', 'cancelled', 'completed'])->default('pending'); // Trạng thái booking
            $table->enum('payment_status', ['unpaid', 'paid', 'refunded'])->default('unpaid'); // Trạng thái thanh toán
            $table->softDeletes();
            $table->timestamps(); // created_at, updated_at

            // Khóa ngoại
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
