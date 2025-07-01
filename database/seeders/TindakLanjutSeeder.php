<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class TindakLanjutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Ambil semua id permasalahan yang ada di tabel permasalahan
        $permasalahanIds = DB::table('permasalahan')->pluck('id')->toArray();

        // Insert data ke tabel tindak_lanjut
        DB::table('tindak_lanjut')->insert([
            [
                'id' => Str::uuid(),
                'permasalahan_id' => $permasalahanIds[array_rand($permasalahanIds)], // Ambil permasalahan_id secara acak
                'nama' => 'Tindak Lanjut 1',
                'tanggal_mulai' => Carbon::now()->subDays(5)->toDateString(),
                'tanggal_selesai' => Carbon::now()->addDays(10)->toDateString(),
                'dibuat_oleh' => 'Admin',
                'diupdate_oleh' => 'Admin',
                'tgl_dibuat' => Carbon::now(),
                'tgl_diupdate' => Carbon::now(),
                'status' => 'Active',
            ],
            [
                'id' => Str::uuid(),
                'permasalahan_id' => $permasalahanIds[array_rand($permasalahanIds)], // Ambil permasalahan_id secara acak
                'nama' => 'Tindak Lanjut 2',
                'tanggal_mulai' => Carbon::now()->subDays(3)->toDateString(),
                'tanggal_selesai' => Carbon::now()->addDays(12)->toDateString(),
                'dibuat_oleh' => 'Admin',
                'diupdate_oleh' => 'Admin',
                'tgl_dibuat' => Carbon::now(),
                'tgl_diupdate' => Carbon::now(),
                'status' => 'Inactive',
            ],
            [
                'id' => Str::uuid(),
                'permasalahan_id' => $permasalahanIds[array_rand($permasalahanIds)], // Ambil permasalahan_id secara acak
                'nama' => 'Tindak Lanjut 3',
                'tanggal_mulai' => Carbon::now()->subDays(2)->toDateString(),
                'tanggal_selesai' => Carbon::now()->addDays(15)->toDateString(),
                'dibuat_oleh' => 'Admin',
                'diupdate_oleh' => 'Admin',
                'tgl_dibuat' => Carbon::now(),
                'tgl_diupdate' => Carbon::now(),
                'status' => 'Active',
            ],
            [
                'id' => Str::uuid(),
                'permasalahan_id' => $permasalahanIds[array_rand($permasalahanIds)], // Ambil permasalahan_id secara acak
                'nama' => 'Tindak Lanjut 4',
                'tanggal_mulai' => Carbon::now()->subDays(7)->toDateString(),
                'tanggal_selesai' => Carbon::now()->addDays(5)->toDateString(),
                'dibuat_oleh' => 'Admin',
                'diupdate_oleh' => 'Admin',
                'tgl_dibuat' => Carbon::now(),
                'tgl_diupdate' => Carbon::now(),
                'status' => 'Inactive',
            ],
            [
                'id' => Str::uuid(),
                'permasalahan_id' => $permasalahanIds[array_rand($permasalahanIds)], // Ambil permasalahan_id secara acak
                'nama' => 'Tindak Lanjut 5',
                'tanggal_mulai' => Carbon::now()->subDays(10)->toDateString(),
                'tanggal_selesai' => Carbon::now()->addDays(20)->toDateString(),
                'dibuat_oleh' => 'Admin',
                'diupdate_oleh' => 'Admin',
                'tgl_dibuat' => Carbon::now(),
                'tgl_diupdate' => Carbon::now(),
                'status' => 'Active',
            ],
            [
                'id' => Str::uuid(),
                'permasalahan_id' => $permasalahanIds[array_rand($permasalahanIds)], // Ambil permasalahan_id secara acak
                'nama' => 'Tindak Lanjut 6',
                'tanggal_mulai' => Carbon::now()->subDays(4)->toDateString(),
                'tanggal_selesai' => Carbon::now()->addDays(8)->toDateString(),
                'dibuat_oleh' => 'Admin',
                'diupdate_oleh' => 'Admin',
                'tgl_dibuat' => Carbon::now(),
                'tgl_diupdate' => Carbon::now(),
                'status' => 'Inactive',
            ],
            [
                'id' => Str::uuid(),
                'permasalahan_id' => $permasalahanIds[array_rand($permasalahanIds)], // Ambil permasalahan_id secara acak
                'nama' => 'Tindak Lanjut 7',
                'tanggal_mulai' => Carbon::now()->subDays(6)->toDateString(),
                'tanggal_selesai' => Carbon::now()->addDays(11)->toDateString(),
                'dibuat_oleh' => 'Admin',
                'diupdate_oleh' => 'Admin',
                'tgl_dibuat' => Carbon::now(),
                'tgl_diupdate' => Carbon::now(),
                'status' => 'Active',
            ],
            [
                'id' => Str::uuid(),
                'permasalahan_id' => $permasalahanIds[array_rand($permasalahanIds)], // Ambil permasalahan_id secara acak
                'nama' => 'Tindak Lanjut 8',
                'tanggal_mulai' => Carbon::now()->subDays(9)->toDateString(),
                'tanggal_selesai' => Carbon::now()->addDays(9)->toDateString(),
                'dibuat_oleh' => 'Admin',
                'diupdate_oleh' => 'Admin',
                'tgl_dibuat' => Carbon::now(),
                'tgl_diupdate' => Carbon::now(),
                'status' => 'Inactive',
            ],
            [
                'id' => Str::uuid(),
                'permasalahan_id' => $permasalahanIds[array_rand($permasalahanIds)], // Ambil permasalahan_id secara acak
                'nama' => 'Tindak Lanjut 9',
                'tanggal_mulai' => Carbon::now()->subDays(3)->toDateString(),
                'tanggal_selesai' => Carbon::now()->addDays(18)->toDateString(),
                'dibuat_oleh' => 'Admin',
                'diupdate_oleh' => 'Admin',
                'tgl_dibuat' => Carbon::now(),
                'tgl_diupdate' => Carbon::now(),
                'status' => 'Active',
            ],
            [
                'id' => Str::uuid(),
                'permasalahan_id' => $permasalahanIds[array_rand($permasalahanIds)], // Ambil permasalahan_id secara acak
                'nama' => 'Tindak Lanjut 10',
                'tanggal_mulai' => Carbon::now()->subDays(2)->toDateString(),
                'tanggal_selesai' => Carbon::now()->addDays(22)->toDateString(),
                'dibuat_oleh' => 'Admin',
                'diupdate_oleh' => 'Admin',
                'tgl_dibuat' => Carbon::now(),
                'tgl_diupdate' => Carbon::now(),
                'status' => 'Inactive',
            ],
        ]);
    }
}
