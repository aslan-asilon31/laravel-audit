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
    Schema::create('keterangan', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->uuid('temuan_id')->nullable();
      $table->foreign('temuan_id')->references('id')->on('temuan')->onDelete('cascade')->onUpdate('cascade');
      $table->text('isi_keterangan');
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
