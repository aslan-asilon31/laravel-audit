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
      $table->uuid('id')->primary();
      $table->string('nama');
      $table->string('prioritas');
      $table->date('tgl_mulai')->nullable();
      $table->date('tgl_selesai')->nullable();
      $table->string('dibuat_oleh', 100)->nullable()->index();
      $table->string('diupdate_oleh', 100)->nullable()->index();
      $table->timestamp('tgl_dibuat')->nullable();
      $table->timestamp('tgl_diupdate')->nullable();
      $table->string('status')->nullable();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('kriteria');
  }
};
