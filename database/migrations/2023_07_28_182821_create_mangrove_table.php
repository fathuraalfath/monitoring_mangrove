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
        Schema::create('mangrove', function (Blueprint $table) {
            $table->id();
            $table->string('lokasi_rhl');
            $table->string('kabupaten');
            $table->string('kecamatan');
            $table->string('desa');
            $table->integer('luas');
            $table->string('kondisi');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('ket');
            $table->string('filename');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mangrove');
    }
};
