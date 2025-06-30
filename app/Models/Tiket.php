<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class Tiket extends Model
{
    use HasFactory;

    // Mengatur nama tabel jika berbeda
    protected $table = 'tiket';

    // Menentukan atribut yang dapat diisi
    protected $guarded = [];

    // Menentukan tipe data yang harus di-cast ke dalam format yang sesuai
    protected $casts = [
        'tgl_dibuat' => 'datetime',
        'tgl_diupdate' => 'datetime',
    ];

    const CREATED_AT = 'tgl_dibuat';
    const UPDATED_AT = 'tgl_diupdate';

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function assignTo()
    {
        return $this->belongsTo(User::class, 'ditugaskan_kepada');
    }
}
