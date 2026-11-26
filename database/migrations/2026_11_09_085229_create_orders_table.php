<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('tracking_token', 64)->unique(); // Public tracking token
            $table->text('location_address');
            $table->text('location_description')->nullable();
            $table->string('location_photo_url')->nullable();
            $table->dateTime('scheduled_at');
            $table->enum('status', ['draft', 'menunggu_pembayaran', 'dikonfirmasi', 'selesai', 'dibatalkan'])->default('draft');
            $table->bigInteger('total_amount');
            $table->bigInteger('tax_amount')->default(0);
            $table->bigInteger('service_fee')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
