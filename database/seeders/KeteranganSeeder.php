<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class KeteranganSeeder extends Seeder
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

        // Insert data ke tabel keterangan
        DB::table('keterangan')->insert([
            [
                'id' => Str::uuid(),
                'temuan_id' => $temuanIds[array_rand($temuanIds)], // Ambil temuan_id secara acak
                'isi_keterangan' => 'Keterangan untuk temuan 1: Ini adalah keterangan untuk temuan pertama di tabel temuan.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'temuan_id' => $temuanIds[array_rand($temuanIds)], // Ambil temuan_id secara acak
                'isi_keterangan' => 'Keterangan untuk temuan 2: Keterangan ini berisi informasi lebih lanjut terkait temuan kedua.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'temuan_id' => $temuanIds[array_rand($temuanIds)], // Ambil temuan_id secara acak
                'isi_keterangan' => 'Keterangan untuk temuan 3: Keterangan ini memberikan rincian tentang temuan ketiga.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'temuan_id' => $temuanIds[array_rand($temuanIds)], // Ambil temuan_id secara acak
                'isi_keterangan' => 'Keterangan untuk temuan 4: Keterangan ini menjelaskan lebih lanjut mengenai temuan keempat.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'temuan_id' => $temuanIds[array_rand($temuanIds)], // Ambil temuan_id secara acak
                'isi_keterangan' => 'Keterangan untuk temuan 5: Keterangan untuk temuan kelima ini berfokus pada detail lebih lanjut.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'temuan_id' => $temuanIds[array_rand($temuanIds)], // Ambil temuan_id secara acak
                'isi_keterangan' => 'Keterangan untuk temuan 6: Keterangan ini memberikan penjelasan tambahan tentang temuan keenam.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'temuan_id' => $temuanIds[array_rand($temuanIds)], // Ambil temuan_id secara acak
                'isi_keterangan' => 'Keterangan untuk temuan 7: Keterangan ini memberikan penilaian terhadap temuan ketujuh.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'temuan_id' => $temuanIds[array_rand($temuanIds)], // Ambil temuan_id secara acak
                'isi_keterangan' => 'Keterangan untuk temuan 8: Keterangan ini memberikan informasi tambahan mengenai temuan kedelapan.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'temuan_id' => $temuanIds[array_rand($temuanIds)], // Ambil temuan_id secara acak
                'isi_keterangan' => 'Keterangan untuk temuan 9: Keterangan ini berisi penjelasan tentang temuan kesembilan.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => Str::uuid(),
                'temuan_id' => $temuanIds[array_rand($temuanIds)], // Ambil temuan_id secara acak
                'isi_keterangan' => 'Keterangan untuk temuan 10: Keterangan ini mencakup analisis mendalam mengenai temuan kesepuluh.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
