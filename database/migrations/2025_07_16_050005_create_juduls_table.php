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
        Schema::create('juduls', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mahasiswa_id')->index()->constrained();
            $table->foreignId('pembimbing1_id')->nullable()->constrained('dosens')->onDelete('set null');
            $table->foreignId('pembimbing2_id')->nullable()->constrained('dosens')->onDelete('set null');
            $table->foreignId('penguji1_id')->nullable()->constrained('dosens')->onDelete('set null');
            $table->foreignId('penguji2_id')->nullable()->constrained('dosens')->onDelete('set null');
            $table->foreignId('penguji3_id')->nullable()->constrained('dosens')->onDelete('set null');

            $table->text('judul');
            $table->text('keterangan')->nullable();

            $table->string('sk_pembimbing')->nullable();  // path atau nama file SK Pembimbing
            $table->string('sk_penguji')->nullable();     // path atau nama file SK Penguji

            $table->boolean('status')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('juduls');
    }
};
