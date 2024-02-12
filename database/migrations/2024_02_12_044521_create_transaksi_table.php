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
        Schema::create('transaksi', function (Blueprint $table) {
            $table->uuid('uid_tr')->primary();
            $table->foreignUuid('id');
            $table->foreignUuid('uid_b');
            $table->integer('jumlah_item');
            $table->integer('total_harga');
            $table->longText('alamat_pembeli');
            $table->enum('status', ['DIBAYAR', 'DIKIRIM', 'DITERIMA']);
            $table->foreign('id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('uid_b')->references('uid_b')->on('barang')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
