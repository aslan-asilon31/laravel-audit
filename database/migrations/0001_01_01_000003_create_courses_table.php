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
  Schema::create('courses', function (Blueprint $table) {
      $table->uuid('id')->primary();

      $table->unsignedBigInteger('role_id')->nullable();
      $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade')->onUpdate('cascade');

      $table->uuid('price_id')->nullable();
      $table->foreign('price_id')->references('id')->on('prices')->onDelete('cascade')->onUpdate('cascade');

      $table->string('title')->nullable();
      $table->text('description')->nullable();

      $table->timestamps();
      $table->softDeletes();
  });

  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('courses');
  }
};
