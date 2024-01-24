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
        Schema::create('owner', function (Blueprint $table) {
            $table->string('id_owner', 20)->primary();
            $table->unsignedBigInteger('user_id');
            $table->string('nama_perusahaan');
            $table->string('kota_kab', 50);
            $table->string('kecamatan', 50);
            $table->string('kelurahan', 50);
            $table->string('alamat', 100);
            $table->string('no_hp', 15);
            $table->string('jk', 10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('owner');
    }
};
