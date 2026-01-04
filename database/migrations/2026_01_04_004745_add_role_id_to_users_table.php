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
        Schema::table('users', function (Blueprint $table) {
            //// Ajoute la colonne role_id avec une clé étrangère vers roles.id
            $table->foreignId('role_id')->default(1)->constrained('roles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //Supprime la clé étrangère puis la colonne
            $table->dropConstrainedForeignId('role_id');
        });
    }
};
