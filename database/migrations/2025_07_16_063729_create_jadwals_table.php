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
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('judul_id')->index()->constrained();
            $table->foreignId('pembimbing_id')->constrained('dosens')->onDelete('cascade'); // Pembimbing spesifik
            $table->date('tanggal_bimbingan');
            $table->time('waktu_mulai');
            $table->time('waktu_selesai');
            $table->text('topik_bimbingan')->nullable();
            $table->string('tempat')->nullable();
            $table->enum('status', ['dijadwalkan', 'selesai', 'batal'])->default('dijadwalkan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwals');
    }
};
