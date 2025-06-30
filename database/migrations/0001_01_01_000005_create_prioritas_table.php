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
    Schema::create('prioritas', function (Blueprint $table) {
        $table->id();
        $table->foreignId('kriteria_id')->constrained('kriteria')->onDelete('cascade');
        $table->enum('tingkat_prioritas', ['Tinggi', 'Normal', 'Rendah']);
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
