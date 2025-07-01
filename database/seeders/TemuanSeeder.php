<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class TemuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $kriteriaIds = DB::table('kriteria')->pluck('id')->toArray();

        DB::table('temuan')->insert([
            [
                'id' => Str::uuid(),
                'kriteria_id' => $kriteriaIds[array_rand($kriteriaIds)],
                'ms_file_id' => null,
                'nama' => 'Temuan 1',
                'dibuat_oleh' => 'Admin',
                'diupdate_oleh' => 'Admin',
                'tgl_dibuat' => Carbon::now(),
                'tgl_diupdate' => Carbon::now(),
                'status' => 'Active',
            ],
            [
                'id' => Str::uuid(),
                'kriteria_id' => $kriteriaIds[array_rand($kriteriaIds)],
                'ms_file_id' => null,
                'nama' => 'Temuan 2',
                'dibuat_oleh' => 'Admin',
                'diupdate_oleh' => 'Admin',
                'tgl_dibuat' => Carbon::now(),
                'tgl_diupdate' => Carbon::now(),
                'status' => 'Active',
            ],
            [
                'id' => Str::uuid(),
                'kriteria_id' => $kriteriaIds[array_rand($kriteriaIds)],
                'ms_file_id' => null,
                'nama' => 'Temuan 3',
                'dibuat_oleh' => 'Admin',
                'diupdate_oleh' => 'Admin',
                'tgl_dibuat' => Carbon::now(),
                'tgl_diupdate' => Carbon::now(),
                'status' => 'Inactive',
            ],
            [
                'id' => Str::uuid(),
                'kriteria_id' => $kriteriaIds[array_rand($kriteriaIds)],
                'ms_file_id' => null,
                'nama' => 'Temuan 4',
                'dibuat_oleh' => 'Admin',
                'diupdate_oleh' => 'Admin',
                'tgl_dibuat' => Carbon::now(),
                'tgl_diupdate' => Carbon::now(),
                'status' => 'Inactive',
            ],
            [
                'id' => Str::uuid(),
                'kriteria_id' => $kriteriaIds[array_rand($kriteriaIds)], // Ambil id kriteria secara acak
                'ms_file_id' => null, // Anda dapat menyesuaikan dengan file id yang ada
                'nama' => 'Temuan 5',
                'dibuat_oleh' => 'Admin',
                'diupdate_oleh' => 'Admin',
                'tgl_dibuat' => Carbon::now(),
                'tgl_diupdate' => Carbon::now(),
                'status' => 'Active',
            ],
            [
                'id' => Str::uuid(),
                'kriteria_id' => $kriteriaIds[array_rand($kriteriaIds)], // Ambil id kriteria secara acak
                'ms_file_id' => null, // Anda dapat menyesuaikan dengan file id yang ada
                'nama' => 'Temuan 6',
                'dibuat_oleh' => 'Admin',
                'diupdate_oleh' => 'Admin',
                'tgl_dibuat' => Carbon::now(),
                'tgl_diupdate' => Carbon::now(),
                'status' => 'Active',
            ],
            [
                'id' => Str::uuid(),
                'kriteria_id' => $kriteriaIds[array_rand($kriteriaIds)], // Ambil id kriteria secara acak
                'ms_file_id' => null, // Anda dapat menyesuaikan dengan file id yang ada
                'nama' => 'Temuan 7',
                'dibuat_oleh' => 'Admin',
                'diupdate_oleh' => 'Admin',
                'tgl_dibuat' => Carbon::now(),
                'tgl_diupdate' => Carbon::now(),
                'status' => 'Inactive',
            ],
            [
                'id' => Str::uuid(),
                'kriteria_id' => $kriteriaIds[array_rand($kriteriaIds)], // Ambil id kriteria secara acak
                'ms_file_id' => null, // Anda dapat menyesuaikan dengan file id yang ada
                'nama' => 'Temuan 8',
                'dibuat_oleh' => 'Admin',
                'diupdate_oleh' => 'Admin',
                'tgl_dibuat' => Carbon::now(),
                'tgl_diupdate' => Carbon::now(),
                'status' => 'Active',
            ],
            [
                'id' => Str::uuid(),
                'kriteria_id' => $kriteriaIds[array_rand($kriteriaIds)], // Ambil id kriteria secara acak
                'ms_file_id' => null, // Anda dapat menyesuaikan dengan file id yang ada
                'nama' => 'Temuan 9',
                'dibuat_oleh' => 'Admin',
                'diupdate_oleh' => 'Admin',
                'tgl_dibuat' => Carbon::now(),
                'tgl_diupdate' => Carbon::now(),
                'status' => 'Inactive',
            ],
            [
                'id' => Str::uuid(),
                'kriteria_id' => $kriteriaIds[array_rand($kriteriaIds)], // Ambil id kriteria secara acak
                'ms_file_id' => null, // Anda dapat menyesuaikan dengan file id yang ada
                'nama' => 'Temuan 10',
                'dibuat_oleh' => 'Admin',
                'diupdate_oleh' => 'Admin',
                'tgl_dibuat' => Carbon::now(),
                'tgl_diupdate' => Carbon::now(),
                'status' => 'Active',
            ],
        ]);
    }
}
