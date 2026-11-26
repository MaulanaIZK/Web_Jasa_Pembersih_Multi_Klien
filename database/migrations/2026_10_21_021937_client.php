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
        Schema::create('client', function (Blueprint $table): void {
            $table->id('idClient');
            $table->string('namaPebisnis');
            $table->string('namaClient');
            $table->string('email');
            $table->string('noTelepon');
            $table->string('alamat');
            $table->enum('layanan', ['bangunan', 'ruangan', 'kendaraan', 'other']);
            $table->string('deskripsi');
            $table->enum('status', ['aktif', 'tidak aktif', 'libur']);
            $table->string('fotoProfil');
            $table->date('tglNonAktif');
            $table->string('alasaNonaktif');
            $table->timestamps();
            $table->bigInteger('idAdmin')->unsigned();
            $table->foreign('idAdmin')->references('idAdmin')->on('admin');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client');
    }
};
