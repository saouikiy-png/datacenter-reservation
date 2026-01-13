<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();

            // Link to Personne 1 (users)
            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade');

            $table->unsignedBigInteger('resource_id');

            // Reservation period
            $table->dateTime('start_date');
            $table->dateTime('end_date');

            // User justification
            $table->text('justification');

            // Reservation workflow status
            $table->enum('status', [
                'en_attente',
                'approuvee',
                'refusee',
                'active',
                'terminee'
            ])->default('en_attente');

            // Manager comment 
            $table->text('manager_comment')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};

