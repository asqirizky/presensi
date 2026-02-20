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
        Schema::create('aset_units', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('aset_id');
            $table->unsignedBigInteger('lokasi_id');
            $table->unsignedBigInteger('sumber_id');
            $table->string('kode_unit');
            $table->string('kondisi')->default('Baik'); // tersedia, dipinjam, rusak, hilang
            $table->string('tanggal');
            $table->string('harga');
            $table->string('nb')->nullable();
            $table->string('kwitansi');
            $table->string('foto');
            $table->foreign('aset_id')->references('id')->on('asets')->onDelete('cascade');
            $table->foreign('lokasi_id')->references('id')->on('aset_lokasis')->onDelete('cascade');
            $table->foreign('sumber_id')->references('id')->on('aset_sumbers')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aset_units');
    }
};
