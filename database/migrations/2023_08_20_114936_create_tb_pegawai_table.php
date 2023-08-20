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
        Schema::create('tb_pegawai', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bidang_id');
            $table->unsignedBigInteger('jabatan_id');
            $table->string('nip')->unique();
            $table->string('nama_lengkap');
            $table->string('no_tlp')->unique();
            $table->string('username')->unique();
            $table->string('password');
            $table->text('alamat');
            $table->string('image');
            $table->timestamps();
            $table->foreign('bidang_id')->references('id')->on('tb_bidang')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('jabatan_id')->references('id')->on('tb_jabatan')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_pegawai');
    }
};
