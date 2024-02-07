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
            $table->string('nama_barang');
            $table->longText('deskripsi');
            $table->integer('harga');
            $table->integer('stok');
            $table->string('slug')->unique();
            // $table->string('thumbnail', 2048)->nullable();
            // $table->enum('status', ['A', 'T'])->default('A')->comment = 'A: Aktif, T:Tidak Aktif';
            // $table->datetime('published_at');
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
