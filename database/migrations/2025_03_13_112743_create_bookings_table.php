<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();  // Booking ID
            $table->foreignId('user_id')->constrained()->onDelete('cascade');  // User reference (Foreign Key)
            $table->string('train_no');  // Train number
            $table->string('from_city');  // Departure city
            $table->string('to_city');  // Arrival city
            $table->time('departure_time');  // Departure time
            $table->time('arrival_time');  // Arrival time
            $table->decimal('ticket_price', 8, 2);  // Ticket price
            $table->enum('payment_status', ['pending', 'paid'])->default('pending');  // Payment status
            $table->timestamps();  // Created at & Updated at timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('bookings');  // Drop table when rolling back migration
    }
};
