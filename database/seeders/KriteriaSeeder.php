<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kriteria')->insert([
            [
                'id' => Str::uuid(),
                'nama' => 'Kepatuhan terhadap Peraturan dan Standar Keamanan Produk',
                'prioritas' => 'tinggi',
                'tgl_mulai' => Carbon::now()->subDays(10)->toDateString(),
                'tgl_selesai' => Carbon::now()->addDays(10)->toDateString(),
                'dibuat_oleh' => 'Admin',
                'diupdate_oleh' => 'Admin',
                'tgl_dibuat' => Carbon::now(),
                'tgl_diupdate' => Carbon::now(),
                'status' => 'Active',
            ],
            [
                'id' => Str::uuid(),
                'nama' => 'Pengelolaan Stok dan Persediaan Barang',
                'prioritas' => 'normal',
                'tgl_mulai' => Carbon::now()->subDays(5)->toDateString(),
                'tgl_selesai' => Carbon::now()->addDays(15)->toDateString(),
                'dibuat_oleh' => 'Admin',
                'diupdate_oleh' => 'Admin',
                'tgl_dibuat' => Carbon::now(),
                'tgl_diupdate' => Carbon::now(),
                'status' => 'Active',
            ],
            [
                'id' => Str::uuid(),
                'nama' => 'Kualitas Layanan Pelanggan',
                'prioritas' => 'rendah',
                'tgl_mulai' => Carbon::now()->subDays(7)->toDateString(),
                'tgl_selesai' => Carbon::now()->addDays(20)->toDateString(),
                'dibuat_oleh' => 'Admin',
                'diupdate_oleh' => 'Admin',
                'tgl_dibuat' => Carbon::now(),
                'tgl_diupdate' => Carbon::now(),
                'status' => 'Inactive',
            ],
            [
                'id' => Str::uuid(),
                'nama' => 'Penyajian dan Penataan Produk di gudang',
                'prioritas' => 'rendah',
                'tgl_mulai' => Carbon::now()->subDays(7)->toDateString(),
                'tgl_selesai' => Carbon::now()->addDays(20)->toDateString(),
                'dibuat_oleh' => 'Admin',
                'diupdate_oleh' => 'Admin',
                'tgl_dibuat' => Carbon::now(),
                'tgl_diupdate' => Carbon::now(),
                'status' => 'Inactive',
            ],
            [
                'id' => Str::uuid(),
                'nama' => 'Kepatuhan terhadap Prosedur Keuangan dan Transaksi',
                'prioritas' => 'tinggi',
                'tgl_mulai' => Carbon::now()->subDays(7)->toDateString(),
                'tgl_selesai' => Carbon::now()->addDays(20)->toDateString(),
                'dibuat_oleh' => 'Admin',
                'diupdate_oleh' => 'Admin',
                'tgl_dibuat' => Carbon::now(),
                'tgl_diupdate' => Carbon::now(),
                'status' => 'Inactive',
            ],
        ]);
    }
}
