<?php

namespace App\Livewire\TiketResources\Forms;

use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\Form;

class TiketForm extends Form
{
  public string|null $judul = null;
  public string|null $pemilik = null;
  public string|null $ditugaskan_kepada = null;
  public string|null $deskripsi = null;
  public string|null $tipe_tiket = null;
  public string|null $tiket_prioritas = null;
  public string|null $tiket_ditugaskan = null;
  public string|null $pengalihan_tiket = null;
  public string|null $lampiran = null;
  public string|null $tiket_dibuka = null;
  public string|null $tiket_diselesaikan = null;
  public string|null $status = null;
  public string|null $dibuat_oleh = null;
  public string|null $diupdate_oleh = null;
  public string|null $tgl_dibuat = null;
  public string|null $tgl_diupdate = null;


  public function rules(string|null $id = null): array
  {
    return [
      'masterForm.judul' => 'required|string',
      'masterForm.ditugaskan_kepada' => 'required|string',
      'masterForm.deskripsi' => 'required|string',
      'masterForm.tipe_tiket' => 'required|string',
      'masterForm.tiket_prioritas' => 'required|string',
      'masterForm.tiket_ditugaskan' => 'required|string',
      'masterForm.pengalihan_tiket' => 'required|string',
      'masterForm.lampiran' => 'required|string',
      'masterForm.tiket_dibuka' => 'required|string',
      'masterForm.tiket_diselesaikan' => 'required|string',
      'masterForm.status' => 'required|string',
      'masterForm.dibuat_oleh' => 'required|string',
      'masterForm.diupdate_oleh' => 'required|string',
      'masterForm.tgl_dibuat' => 'required|string',
      'masterForm.tgl_diupdate' => 'required|string',
    ];
  }

  public function attributes(): array
  {
    return [
      'masterForm.judul' => 'Judul',
      'masterForm.ditugaskan_kepada' => 'Ditugaskan Kepada',
      'masterForm.tipe_tiket' => 'Tipe Tiket',
      'masterForm.tiket_prioritas' => 'Tiket Prioritas',
      'masterForm.tiket_ditugaskan' => 'Tiket Ditugaskan',
      'masterForm.pengalihan_tiket' => 'Pengalihan Tiket',
      'masterForm.lampiran' => 'Lapiran',
      'masterForm.tiket_dibuka' => 'Image URL',
      'masterForm.tiket_diselesaikan' => 'Selling Price',
      'masterForm.status' => 'Is Activated',
      'masterForm.dibuat_oleh' => 'Is Activated',
      'masterForm.diupdate_oleh' => 'Is Activated',
      'masterForm.tgl_dibuat' => 'Is Activated',
      'masterForm.tgl_diupdate' => 'Is Activated',
    ];
  }
}
