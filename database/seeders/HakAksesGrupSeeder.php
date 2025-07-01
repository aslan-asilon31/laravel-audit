<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\HakAkses; // Import the HakAkses model

class HakAksesGrupSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        $halamanData = [

            ['nama' => 'dashboard-lihat'],

            ['nama' => 'ms_barang-daftar'],
            ['nama' => 'ms_barang-buat'],
            ['nama' => 'ms_barang-edit'],
            ['nama' => 'ms_barang-update'],
            ['nama' => 'ms_barang-simpan'],
            ['nama' => 'ms_barang-hapus'],
            ['nama' => 'ms_barang-lihat'],

            ['nama' => 'ms_cabang-daftar'],
            ['nama' => 'ms_cabang-buat'],
            ['nama' => 'ms_cabang-edit'],
            ['nama' => 'ms_cabang-update'],
            ['nama' => 'ms_cabang-simpan'],
            ['nama' => 'ms_cabang-hapus'],
            ['nama' => 'ms_cabang-lihat'],

            ['nama' => 'ms_file-daftar'],
            ['nama' => 'ms_file-buat'],
            ['nama' => 'ms_file-edit'],
            ['nama' => 'ms_file-update'],
            ['nama' => 'ms_file-simpan'],
            ['nama' => 'ms_file-hapus'],
            ['nama' => 'ms_file-lihat'],

            ['nama' => 'ms_file_jenis-daftar'],
            ['nama' => 'ms_file_jenis-buat'],
            ['nama' => 'ms_file_jenis-edit'],
            ['nama' => 'ms_file_jenis-update'],
            ['nama' => 'ms_file_jenis-simpan'],
            ['nama' => 'ms_file_jenis-hapus'],
            ['nama' => 'ms_file_jenis-lihat'],

            ['nama' => 'ms_gudang-daftar'],
            ['nama' => 'ms_gudang-buat'],
            ['nama' => 'ms_gudang-edit'],
            ['nama' => 'ms_gudang-update'],
            ['nama' => 'ms_gudang-simpan'],
            ['nama' => 'ms_gudang-hapus'],
            ['nama' => 'ms_gudang-lihat'],

            ['nama' => 'ms_hak_akses-daftar'],
            ['nama' => 'ms_hak_akses-buat'],
            ['nama' => 'ms_hak_akses-edit'],
            ['nama' => 'ms_hak_akses-update'],
            ['nama' => 'ms_hak_akses-simpan'],
            ['nama' => 'ms_hak_akses-hapus'],
            ['nama' => 'ms_hak_akses-lihat'],

            ['nama' => 'ms_jabatan-daftar'],
            ['nama' => 'ms_jabatan-buat'],
            ['nama' => 'ms_jabatan-edit'],
            ['nama' => 'ms_jabatan-update'],
            ['nama' => 'ms_jabatan-simpan'],
            ['nama' => 'ms_jabatan-hapus'],
            ['nama' => 'ms_jabatan-lihat'],

            ['nama' => 'ms_pegawai-daftar'],
            ['nama' => 'ms_pegawai-buat'],
            ['nama' => 'ms_pegawai-edit'],
            ['nama' => 'ms_pegawai-update'],
            ['nama' => 'ms_pegawai-simpan'],
            ['nama' => 'ms_pegawai-hapus'],
            ['nama' => 'ms_pegawai-lihat'],

            ['nama' => 'tr_pesanan_penjualan-daftar'],
            ['nama' => 'tr_pesanan_penjualan-buat'],
            ['nama' => 'tr_pesanan_penjualan-edit'],
            ['nama' => 'tr_pesanan_penjualan-update'],
            ['nama' => 'tr_pesanan_penjualan-simpan'],
            ['nama' => 'tr_pesanan_penjualan-hapus'],
            ['nama' => 'tr_pesanan_penjualan-lihat'],

        ];

        $groups = [];

        // First pass: Insert the groups into the hak_akses_grup table
        foreach ($halamanData as $data) {
            // Extract the group name (e.g., ms_barang from ms_barang-daftar)
            $groupName = explode('-', $data['nama'])[0];

            // Skip if the group has already been inserted
            if (!in_array($groupName, $groups)) {
                // Insert the group into hak_akses_grup
                DB::table('hak_akses_grup')->insert([
                    'id' => Str::uuid(),
                    'nama' => strtoupper(str_replace('_', ' ', $groupName)), // Format group name (e.g., MS BARANG)
                    'dibuat_oleh' => 'seeder',
                    'diupdate_oleh' => 'seeder',
                    'tgl_dibuat' => $now,
                    'tgl_diupdate' => $now,
                ]);

                // Add the group name to the list to avoid re-insertion
                $groups[] = $groupName;
            }
        }
        $nomor = 1;
        // Second pass: Insert the access rights into hak_akses
        foreach ($halamanData as $data) {
            // Extract the group name (e.g., ms_barang from ms_barang-daftar)
            $groupName = explode('-', $data['nama'])[0];

            // Find the group ID by the group name
            $groupId = DB::table('hak_akses_grup')->where('nama', strtoupper(str_replace('_', ' ', $groupName)))->value('id');

            // Insert each access right into hak_akses and associate it with the group ID
            DB::table('hak_akses')->insert([
                'id' => Str::uuid(),
                'hak_akses_grup_id' => $groupId,  // Link to the group ID
                'nama' => $data['nama'],  // Keep the original access right name (e.g., ms_file-batal)
                'dibuat_oleh' => 'seeder',
                'diupdate_oleh' => 'seeder',
                'tgl_dibuat' => $now,
                'tgl_diupdate' => $now,
            ]);
        }

        $this->command->info('✔ hak_akses_grup and hak_akses seeded.');
    }
}
