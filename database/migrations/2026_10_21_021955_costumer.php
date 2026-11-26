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
        Schema::create('costumer', function (Blueprint $table): void {
            $table->id('idCostumer');
            $table->string('namaCostumer');
            $table->string('noTelepon');
            $table->string('email');
            $table->string('password');
            $table->string('alamat');
            $table->enum('gender', ['pria', 'wanita']);
            $table->string('fotoProfil');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('costumer');
    }
};
