<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('client_orders', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('order_id')->constrained()->cascadeOnDelete();
            $table->foreignId('client_id')->constrained();
            $table->enum('status', ['menunggu_konfirmasi', 'dikonfirmasi', 'selesai', 'dibatalkan'])->default('menunggu_konfirmasi');
            $table->text('notes')->nullable();
            $table->bigInteger('subtotal');
            $table->timestamps();

            $table->index(['client_id', 'status', 'created_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('client_orders');
    }
};
