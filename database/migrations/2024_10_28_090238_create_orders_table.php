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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('lapangan_id')->constrained('lapangans')->onDelete('cascade');
            $table->dateTime('tanggal_pesan');
            $table->dateTime('jam_pesan');
            $table->integer('lama_sewa');
            $table->dateTime('lama_habis');
            $table->integer('total_harga');
            $table->string('bukti_transfer');
            $table->enum('konfirmasi', ['Belum Konfirmasi', 'Konfirmasi'])->default('Belum Konfirmasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
