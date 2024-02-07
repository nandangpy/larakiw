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
        Schema::create('berita', function (Blueprint $table) {
            $table->uuid('uid_b')->primary();
            $table->foreignUuid('uid_bk');
            $table->string('title');
            $table->string('slug')->unique();
            // $table->string('thumbnail', 2048)->nullable();
            $table->longText('content');
            $table->enum('status', ['A', 'T'])->default('A')->comment = 'A: Aktif, T:Tidak Aktif';
            $table->datetime('published_at');
            $table->foreign('uid_bk')->references('uid_bk')->on('berita_kategori')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berita');
    }
};
