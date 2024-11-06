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
        Schema::create("alumni", function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->year('tahun_lulus');
            $table->unsignedInteger('jurusan_id');
            $table->string('pekerjaan')->nullable();
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("alumni");
    }
};
