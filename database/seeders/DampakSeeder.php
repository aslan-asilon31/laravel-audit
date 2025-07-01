<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class DampakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Ambil semua id temuan yang ada di tabel temuan
        $temuanIds = DB::table('temuan')->pluck('id')->toArray();

        // Insert data ke tabel dampak
        DB::table('dampak')->insert([
            [
                'id' => Str::uuid(),
                'temuan_id' => $temuanIds[array_rand($temuanIds)], // Ambil temuan_id secara acak
                'nama' => 'Dampak 1',
                'dibuat_oleh' => 'Admin',
                'diupdate_oleh' => 'Admin',
                'tgl_dibuat' => Carbon::now(),
                'tgl_diupdate' => Carbon::now(),
                'status' => 'Active',
            ],
            [
                'id' => Str::uuid(),
                'temuan_id' => $temuanIds[array_rand($temuanIds)], // Ambil temuan_id secara acak
                'nama' => 'Dampak 2',
                'dibuat_oleh' => 'Admin',
                'diupdate_oleh' => 'Admin',
                'tgl_dibuat' => Carbon::now(),
                'tgl_diupdate' => Carbon::now(),
                'status' => 'Active',
            ],
            [
                'id' => Str::uuid(),
                'temuan_id' => $temuanIds[array_rand($temuanIds)], // Ambil temuan_id secara acak
                'nama' => 'Dampak 3',
                'dibuat_oleh' => 'Admin',
                'diupdate_oleh' => 'Admin',
                'tgl_dibuat' => Carbon::now(),
                'tgl_diupdate' => Carbon::now(),
                'status' => 'Inactive',
            ],
            [
                'id' => Str::uuid(),
                'temuan_id' => $temuanIds[array_rand($temuanIds)], // Ambil temuan_id secara acak
                'nama' => 'Dampak 4',
                'dibuat_oleh' => 'Admin',
                'diupdate_oleh' => 'Admin',
                'tgl_dibuat' => Carbon::now(),
                'tgl_diupdate' => Carbon::now(),
                'status' => 'Inactive',
            ],
            [
                'id' => Str::uuid(),
                'temuan_id' => $temuanIds[array_rand($temuanIds)], // Ambil temuan_id secara acak
                'nama' => 'Dampak 5',
                'dibuat_oleh' => 'Admin',
                'diupdate_oleh' => 'Admin',
                'tgl_dibuat' => Carbon::now(),
                'tgl_diupdate' => Carbon::now(),
                'status' => 'Active',
            ],
            [
                'id' => Str::uuid(),
                'temuan_id' => $temuanIds[array_rand($temuanIds)], // Ambil temuan_id secara acak
                'nama' => 'Dampak 6',
                'dibuat_oleh' => 'Admin',
                'diupdate_oleh' => 'Admin',
                'tgl_dibuat' => Carbon::now(),
                'tgl_diupdate' => Carbon::now(),
                'status' => 'Inactive',
            ],
            [
                'id' => Str::uuid(),
                'temuan_id' => $temuanIds[array_rand($temuanIds)], // Ambil temuan_id secara acak
                'nama' => 'Dampak 7',
                'dibuat_oleh' => 'Admin',
                'diupdate_oleh' => 'Admin',
                'tgl_dibuat' => Carbon::now(),
                'tgl_diupdate' => Carbon::now(),
                'status' => 'Active',
            ],
            [
                'id' => Str::uuid(),
                'temuan_id' => $temuanIds[array_rand($temuanIds)], // Ambil temuan_id secara acak
                'nama' => 'Dampak 8',
                'dibuat_oleh' => 'Admin',
                'diupdate_oleh' => 'Admin',
                'tgl_dibuat' => Carbon::now(),
                'tgl_diupdate' => Carbon::now(),
                'status' => 'Inactive',
            ],
            [
                'id' => Str::uuid(),
                'temuan_id' => $temuanIds[array_rand($temuanIds)], // Ambil temuan_id secara acak
                'nama' => 'Dampak 9',
                'dibuat_oleh' => 'Admin',
                'diupdate_oleh' => 'Admin',
                'tgl_dibuat' => Carbon::now(),
                'tgl_diupdate' => Carbon::now(),
                'status' => 'Active',
            ],
            [
                'id' => Str::uuid(),
                'temuan_id' => $temuanIds[array_rand($temuanIds)], // Ambil temuan_id secara acak
                'nama' => 'Dampak 10',
                'dibuat_oleh' => 'Admin',
                'diupdate_oleh' => 'Admin',
                'tgl_dibuat' => Carbon::now(),
                'tgl_diupdate' => Carbon::now(),
                'status' => 'Inactive',
            ],
        ]);
    }
}
