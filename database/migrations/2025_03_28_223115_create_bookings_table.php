<?php

use App\Models\Coupon;
use App\Models\Room;
use App\Models\User;
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
            $table->foreignIdFor(User::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Room::class)->constrained()->onDelete('cascade');
            $table->foreignIdFor(Coupon::class)->nullable()->constrained()->onDelete('set null');
            $table->date('check_in');
            $table->date('check_out');
            $table->decimal('price', 10, 2);
            $table->enum('status', ['confirmed', 'cancelled', 'pending'])->default('pending');
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
