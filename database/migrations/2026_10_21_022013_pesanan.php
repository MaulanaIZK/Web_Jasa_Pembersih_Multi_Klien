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
        Schema::create('pesanan', function (Blueprint $table): void {
            $table->id('idPesanan');
            $table->string('namaCostumer');
            $table->string('lokasiTempat');
            $table->date('tanggalPesanan');
            $table->integer('jumlahJasa');
            $table->string('FotoKondisiTempat');
            $table->enum('status', ['proses', 'selesai']);
            $table->bigInteger('idCostumer')->unsigned();
            $table->bigInteger('idLayanan')->unsigned();
            $table->bigInteger('idClient')->unsigned();
            $table->foreign('idCostumer')->references('idCostumer')->on('costumer');
            $table->foreign('idLayanan')->references('idLayanan')->on('layanan');
            $table->foreign('idClient')->references('idClient')->on('client');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};
