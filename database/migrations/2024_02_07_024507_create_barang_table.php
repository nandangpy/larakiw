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
        Schema::create('barang', function (Blueprint $table) {
            $table->uuid('uid_b')->primary();
            $table->foreignUuid('uid_bk');
            $table->string('nama_barang')->unique();;
            $table->longText('deskripsi_barang');
            $table->integer('harga_barang');
            $table->integer('stok_barang');
            $table->string('foto_barang', 2048)->nullable();
            $table->string('slug')->unique();
            $table->foreign('uid_bk')->references('uid_bk')->on('kategoribarang')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
