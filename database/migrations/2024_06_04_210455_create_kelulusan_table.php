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
        Schema::create('kelulusan', function (Blueprint $table) {
            $table->id();
            $table->string('name', 30)->nullable();
            $table->string('nisn', 30)->nullable();
            $table->string('kelas', 30)->nullable();
            $table->string('jurusan', 30)->nullable();
            $table->string('status_lulus', 30)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelulusan');
    }
};
