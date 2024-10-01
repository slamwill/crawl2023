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
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // 預訂者
            $table->foreignId('coach_id')->constrained('coaches')->onDelete('cascade'); // 預訂的教練
            $table->foreignId('location_id')->constrained('locations')->onDelete('cascade'); // 預訂的場地
            $table->dateTime('start_time'); // 預訂開始時間
            $table->dateTime('end_time'); // 預訂結束時間
            $table->decimal('total_cost', 8, 2); // 總費用
            $table->decimal('platform_fee', 8, 2); // 平台手續費
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
