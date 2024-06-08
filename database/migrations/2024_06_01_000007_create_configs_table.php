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
        Schema::create('configs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kepsek')->nullable();
            $table->string('nip_kepsek', 50)->nullable();
            $table->string('nama_web', 50)->nullable();
            $table->string('logo', 50)->nullable();
            $table->string('ttd', 50)->nullable();
            $table->string('cap', 50)->nullable();
            $table->text('visi')->nullable();
            $table->text('misi')->nullable();
            $table->text('jam')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('configs');
    }
};
