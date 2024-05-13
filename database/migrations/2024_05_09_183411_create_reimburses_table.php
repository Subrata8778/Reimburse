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
        Schema::create('reimburses', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('nama');
            $table->longText('deskripsi');
            $table->string('url_file')->unique();
            $table->enum('status', ['Diproses', 'Menunggu', 'Ditolak', 'Disetujui'])->default('Diproses');
            $table->string('user_nip');
            $table->foreign('user_nip')->references('nip')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reimburses');
    }
};
