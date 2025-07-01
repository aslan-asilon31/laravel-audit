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
    Schema::create('temuan', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->uuid('kriteria_id')->nullable();
      $table->foreign('kriteria_id')->references('id')->on('kriteria')->onDelete('cascade')->onUpdate('cascade');
      $table->uuid('ms_file_id')->nullable();
      $table->foreign('ms_file_id')->references('id')->on('ms_file')->onDelete('cascade')->onUpdate('cascade');
      $table->string('nama');
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
    Schema::dropIfExists('temuan');
  }
};
