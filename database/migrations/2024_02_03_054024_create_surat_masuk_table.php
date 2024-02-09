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
        Schema::create('surat_masuk', function (Blueprint $table) {
            $table->id();
            $table->string('no_surat');
            $table->string('tgl_ns');
            $table->string('no_asal');
            $table->string('tgl_no_asal');
            $table->string('pengirim');
            $table->string('penerima');
            $table->string('perihal');
            $table->string('token_lampiran');
            $table->string('bagian');
            $table->string('disposisi');
            $table->string('tgl_disposisi');
            $table->integer('user_id');
            $table->string('tanggal_sm');
            $table->string('lampiran');
            $table->string('status');
            $table->string('tgl_ajuan');
            $table->string('segera');
            $table->text('catatan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_masuk');
    }
};
