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
Schema::create('libraries', function (Blueprint $table) {
    $table->uuid('id')->primary();
    $table->string('title');
    $table->string('author')->nullable();
    $table->string('file_url')->nullable();
    $table->string('type')->nullable(); // book, ebook, article, etc.
    $table->timestamps();
    $table->softDeletes();
});


  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('libraries');
  }
};
