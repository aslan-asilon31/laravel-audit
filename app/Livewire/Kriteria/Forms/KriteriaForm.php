<?php

namespace App\Livewire\Kriteria\Forms;

use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\Form;

class KriteriaForm extends Form
{
  public string|null $id = null;
  public string|null $nama = null;
  public int|null $nomor = null;
  public string|null $dibuat_oleh = null;
  public string|null $diupdate_oleh = null;
  public string|null $status = null;

  public function rules(string|null $id = null): array
  {
    return [
      'masterForm.nama' => 'required|string',
      'masterForm.prioritas' => 'nullable|integer',
      'masterForm.dibuat_oleh' => 'required|string',
      'masterForm.diupdate_oleh' => 'required|string',
      'masterForm.tgl_dibuat' => 'required|string',
      'masterForm.tgl_diupdate' => 'required|string',
    ];
  }

  public function attributes(): array
  {
    return [
      'masterForm.nama' => 'Nama',
      'masterForm.prioritas' => 'prioritas',
      'masterForm.dibuat_oleh' => 'Dibuat Oleh',
      'masterForm.diupdate_oleh' => 'Diupdate Oleh',
    ];
  }
}
