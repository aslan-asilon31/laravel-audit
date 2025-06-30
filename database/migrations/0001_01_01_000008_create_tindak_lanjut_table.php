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
    Schema::create('tindak_lanjut', function (Blueprint $table) {
        $table->id();
        $table->foreignId('kriteria_id')->constrained('kriteria')->onDelete('cascade');
        $table->enum('jenis', ['T1', 'T2']);
        $table->date('tanggal_mulai')->nullable();
        $table->date('tanggal_selesai')->nullable();
        $table->enum('status', ['Open', 'Close', 'On Progress'])->default('Open');
        $table->timestamps();
    });

  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('tickets');
  }
};
