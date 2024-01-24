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
        Schema::create('makeup', function (Blueprint $table) {
            $table->id();
            $table->string('name_makeup');
            $table->unsignedBigInteger('user_id');
            $table->string('description');
            $table->bigInteger('price');
            $table->string('image');
            $table->string('posting_by');
            $table->string('category');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('makeup');
    }
};
