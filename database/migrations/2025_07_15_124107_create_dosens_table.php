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
        Schema::create('dosens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->index()->constrained();
            $table->string('nidn');
            $table->string('nama_dosen');
            $table->string('jenis_kelamin');
            $table->text('alamat_dosen');
            $table->string('email');
            $table->string('telepon');
            $table->string('pendidikan_terakhir');
            $table->string('bidang_ilmu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosens');
    }
};
