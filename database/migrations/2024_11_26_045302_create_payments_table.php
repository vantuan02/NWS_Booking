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
        Schema::create('payments', function (Blueprint $table) {
            $table->id(); // Tạo cột id tự tăng
            $table->unsignedBigInteger('booking_id'); // Khóa ngoại tới bảng bookings
            $table->unsignedBigInteger('payment_method_id'); // Khóa ngoại tới bảng payment_methods
            $table->decimal('amount', 10, 2); // Số tiền thanh toán
            $table->enum('status', ['pending', 'paid', 'failed']); // Trạng thái thanh toán
            $table->timestamps(); // Các cột created_at, updated_at
            $table->softDeletes(); // Thêm khả năng xóa mềm

            // Các ràng buộc khóa ngoại
            $table->foreign('booking_id')->references('id')->on('bookings')->onDelete('cascade');
            $table->foreign('payment_method_id')->references('id')->on('payment_methods')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
