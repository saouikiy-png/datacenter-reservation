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
        Schema::create('resources', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('category_id')->constrained('resource_categories')->onDelete('cascade');
            $table->integer('cpu')->nullable();
            $table->integer('ram')->nullable();
            $table->integer('storage')->nullable();
            $table->integer('bandwidth')->nullable();
            $table->string('os')->nullable();
            $table->string('location')->nullable();
            $table->enum('status', ['available', 'maintenance', 'disabled'])->default('available');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resources');
    }
};
