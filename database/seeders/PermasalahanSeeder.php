<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PermasalahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Ambil semua id dampak yang ada di tabel dampak
        $dampakIds = DB::table('dampak')->pluck('id')->toArray();

        // Insert data ke tabel permasalahan
        DB::table('permasalahan')->insert([
            [
                'id' => Str::uuid(),
                'dampak_id' => $dampakIds[array_rand($dampakIds)], // Ambil dampak_id secara acak
                'nama' => 'Permasalahan 1',
                'dibuat_oleh' => 'Admin',
                'diupdate_oleh' => 'Admin',
                'tgl_dibuat' => Carbon::now(),
                'tgl_diupdate' => Carbon::now(),
                'status' => 'Active',
            ],
            [
                'id' => Str::uuid(),
                'dampak_id' => $dampakIds[array_rand($dampakIds)], // Ambil dampak_id secara acak
                'nama' => 'Permasalahan 2',
                'dibuat_oleh' => 'Admin',
                'diupdate_oleh' => 'Admin',
                'tgl_dibuat' => Carbon::now(),
                'tgl_diupdate' => Carbon::now(),
                'status' => 'Inactive',
            ],
            [
                'id' => Str::uuid(),
                'dampak_id' => $dampakIds[array_rand($dampakIds)], // Ambil dampak_id secara acak
                'nama' => 'Permasalahan 3',
                'dibuat_oleh' => 'Admin',
                'diupdate_oleh' => 'Admin',
                'tgl_dibuat' => Carbon::now(),
                'tgl_diupdate' => Carbon::now(),
                'status' => 'Active',
            ],
            [
                'id' => Str::uuid(),
                'dampak_id' => $dampakIds[array_rand($dampakIds)], // Ambil dampak_id secara acak
                'nama' => 'Permasalahan 4',
                'dibuat_oleh' => 'Admin',
                'diupdate_oleh' => 'Admin',
                'tgl_dibuat' => Carbon::now(),
                'tgl_diupdate' => Carbon::now(),
                'status' => 'Inactive',
            ],
            [
                'id' => Str::uuid(),
                'dampak_id' => $dampakIds[array_rand($dampakIds)], // Ambil dampak_id secara acak
                'nama' => 'Permasalahan 5',
                'dibuat_oleh' => 'Admin',
                'diupdate_oleh' => 'Admin',
                'tgl_dibuat' => Carbon::now(),
                'tgl_diupdate' => Carbon::now(),
                'status' => 'Active',
            ],
            [
                'id' => Str::uuid(),
                'dampak_id' => $dampakIds[array_rand($dampakIds)], // Ambil dampak_id secara acak
                'nama' => 'Permasalahan 6',
                'dibuat_oleh' => 'Admin',
                'diupdate_oleh' => 'Admin',
                'tgl_dibuat' => Carbon::now(),
                'tgl_diupdate' => Carbon::now(),
                'status' => 'Inactive',
            ],
            [
                'id' => Str::uuid(),
                'dampak_id' => $dampakIds[array_rand($dampakIds)], // Ambil dampak_id secara acak
                'nama' => 'Permasalahan 7',
                'dibuat_oleh' => 'Admin',
                'diupdate_oleh' => 'Admin',
                'tgl_dibuat' => Carbon::now(),
                'tgl_diupdate' => Carbon::now(),
                'status' => 'Active',
            ],
            [
                'id' => Str::uuid(),
                'dampak_id' => $dampakIds[array_rand($dampakIds)], // Ambil dampak_id secara acak
                'nama' => 'Permasalahan 8',
                'dibuat_oleh' => 'Admin',
                'diupdate_oleh' => 'Admin',
                'tgl_dibuat' => Carbon::now(),
                'tgl_diupdate' => Carbon::now(),
                'status' => 'Inactive',
            ],
            [
                'id' => Str::uuid(),
                'dampak_id' => $dampakIds[array_rand($dampakIds)], // Ambil dampak_id secara acak
                'nama' => 'Permasalahan 9',
                'dibuat_oleh' => 'Admin',
                'diupdate_oleh' => 'Admin',
                'tgl_dibuat' => Carbon::now(),
                'tgl_diupdate' => Carbon::now(),
                'status' => 'Active',
            ],
            [
                'id' => Str::uuid(),
                'dampak_id' => $dampakIds[array_rand($dampakIds)], // Ambil dampak_id secara acak
                'nama' => 'Permasalahan 10',
                'dibuat_oleh' => 'Admin',
                'diupdate_oleh' => 'Admin',
                'tgl_dibuat' => Carbon::now(),
                'tgl_diupdate' => Carbon::now(),
                'status' => 'Inactive',
            ],
        ]);
    }
}
