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
        Schema::create('room_view', function (Blueprint $table) {
            $table->id(); // id (int, primary key, auto increment)
            $table->unsignedBigInteger('room_id'); // foreign key to rooms.id
            $table->unsignedBigInteger('view_id'); // foreign key to views.id
            $table->timestamps(); // created_at, updated_at

            // Foreign key constraints
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
            $table->foreign('view_id')->references('id')->on('views')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_view');
    }
};
