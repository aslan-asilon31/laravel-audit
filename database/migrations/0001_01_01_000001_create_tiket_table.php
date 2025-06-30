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
    Schema::create('tiket', function (Blueprint $table) {
      $table->uuid('id')->primary();
      $table->string('judul')->nullable(); // Judul tiket

      $table->unsignedBigInteger('ditugaskan_kepada')->nullable(); // ID user yang ditugaskan
      $table->foreign('ditugaskan_kepada')->references('id')->on('users')->onDelete('set null')->onUpdate('cascade'); // Relasi ke tabel users

      $table->text('deskripsi')->nullable(); // Deskripsi tiket
      $table->string('tipe_tiket')->nullable(); // Jenis tiket untuk CRM : customer_support', 'product_issue', 'inquiry', 'complaint', 'other'
      $table->string('tiket_prioritas')->nullable(); // Prioritas tiket : 'low', 'medium', 'high'
      $table->string('pengalihan_tiket')->nullable(); // Pengalihan tiket : 'department', 'division', 'job_position'
      $table->string('lampiran')->nullable(); // Lampiran terkait tiket
      $table->timestamp('tiket_dibuka')->useCurrent()->nullable(); // Waktu tiket dibuka
      $table->timestamp('tiket_diselesaikan')->nullable(); // Waktu tiket diselesaikan
      $table->string('dibuat_oleh')->nullable(); // Lampiran terkait tiket
      $table->string('diupdate_oleh')->nullable(); // Lampiran terkait tiket
      $table->string('status')->nullable(); // Lampiran terkait tiket
      $table->timestamp('tgl_dibuat')->nullable();
      $table->timestamp('tgl_diupdate')->nullable();
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
