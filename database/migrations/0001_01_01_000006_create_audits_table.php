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
    Schema::create('audits', function (Blueprint $table) {
      $table->unsignedBigInteger('id')->primary();
      $table->unsignedBigInteger('parent_id')->nullable();
      $table->string('kriteria');
      $table->string('temuan');
      $table->string('lampiran');
      $table->string('keterangan');
      $table->string('prioritas');
      $table->string('dampak');
      $table->string('permasalahan');
      $table->string('tindak_lanjut');
      $table->string('waktu_penyelesaian_kriteria');
      $table->string('status');
      $table->timestamps();
      $table->string('status')->nullable();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('audits');
  }
};
