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
Schema::create('assignments', function (Blueprint $table) {
    $table->uuid('id')->primary();

    $table->unsignedBigInteger('user_id')->nullable();
    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

    $table->uuid('course_id')->nullable();
    $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade')->onUpdate('cascade');

    $table->string('name')->nullable();
    $table->timestamps();
    $table->softDeletes();
});

  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('assignments');
  }
};
