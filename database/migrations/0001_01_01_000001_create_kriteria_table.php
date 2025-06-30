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
    Schema::create('kriteria', function (Blueprint $table) {
    $table->id();
    $table->string('nama_kriteria');
    $table->enum('status', ['Open', 'Close']);
    $table->date('tanggal_mulai')->nullable();
    $table->date('tanggal_selesai')->nullable();
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
