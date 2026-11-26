<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('order_id')->constrained();
            $table->string('payment_reference')->unique(); // Unique constraint untuk idempotensi
            $table->bigInteger('amount');
            $table->string('bank_origin')->nullable();
            $table->string('bank_destination');
            $table->string('proof_url')->nullable();
            $table->enum('status', ['menunggu_verifikasi', 'terverifikasi', 'ditolak', 'kedaluwarsa'])->default('menunggu_verifikasi');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
