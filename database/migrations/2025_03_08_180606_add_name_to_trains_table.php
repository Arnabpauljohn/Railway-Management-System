<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('trains', function (Blueprint $table) {
            $table->string('train_no')->unique();
            $table->string('Number of Seat'); // Add the 'name' column
            $table->string('route');
            $table->time('departure_time');
            $table->time('arrival_time');
            $table->date('date');
            $table->string('from_city');
            $table->string('to_city');
            $table->decimal('prize', 8, 2);
            $table->string('status')->default('Running');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('trains', function (Blueprint $table) {
            $table->dropColumn('name'); // Drop 'name' column if rolled back
        });
    }
};
