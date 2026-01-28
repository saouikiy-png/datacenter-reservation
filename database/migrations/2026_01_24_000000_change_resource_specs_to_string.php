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
        Schema::table('resources', function (Blueprint $table) {
            $table->string('cpu')->nullable()->change();
            $table->string('ram')->nullable()->change();
            $table->string('storage')->nullable()->change();
            $table->string('bandwidth')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Reverting not easily possible due to data loss risk when converting string back to int, 
        // but for this dev env it's fine to leave or try best effort.
        Schema::table('resources', function (Blueprint $table) {
            // $table->integer('cpu')->nullable()->change(); 
        });
    }
};
