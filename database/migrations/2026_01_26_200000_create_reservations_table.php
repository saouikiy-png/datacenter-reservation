<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();

            // Link to the user
            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade');

            // Link to the resource
            $table->foreignId('resource_id')
                ->constrained('resources')
                ->onDelete('cascade');

            // Reservation period
            // start_date = reservation date
            // end_date = resource return date
            $table->dateTime('reservation_date');
            $table->dateTime('return_date');

            // User justification
            $table->text('justification');

            // Reservation status
            $table->enum('status', [
                'pending',
                'approved',
                'rejected',
                'active',
                'completed'
            ])->default('pending');

            // Manager comment
            $table->text('manager_comment')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
?>