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
      $table->uuid('id')->primary();

      $table->uuid('permasalahan_id')->nullable();
      $table->foreign('permasalahan_id')->references('id')->on('permasalahan')->onDelete('cascade')->onUpdate('cascade');

      $table->string('nama', 255)->nullable()->index();
      $table->date('tanggal_mulai')->nullable();
      $table->date('tanggal_selesai')->nullable();
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
    Schema::dropIfExists('tindak_lanjut');
  }
};
