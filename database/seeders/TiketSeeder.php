<?php

namespace Database\Seeders;

use App\Models\Tiket;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TiketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Ambil ID user yang ada dari tabel users
        $userIds = User::pluck('id')->toArray(); // Mengambil semua ID user dari tabel users

        // Daftar tiket pertama yang sudah diberikan
        $tickets = [
            [
                'id' => $faker->uuid,
                'judul' => 'Produk Rusak Diterima Pelanggan',
                'ditugaskan_kepada' => $faker->randomElement($userIds), // Menggunakan ID user yang valid
                'deskripsi' => 'Pelanggan melaporkan bahwa produk yang diterima rusak. Minta penggantian atau pengembalian dana.',
                'tipe_tiket' => 'Product Issue',
                'tiket_prioritas' => 'High',
                'pengalihan_tiket' => 'sales',
                'lampiran' => $faker->fileExtension,
                'status' => $faker->randomElement(['Open', 'Closed', 'In Progress']),
                'tiket_dibuka' => $faker->dateTimeThisYear,
                'tiket_diselesaikan' => $faker->dateTimeBetween('-2 days', 'now'),
            ],
            [
                'id' => $faker->uuid,
                'judul' => 'Permasalahan Pembayaran Pelanggan',
                'ditugaskan_kepada' => $faker->randomElement($userIds), // Menggunakan ID user yang valid
                'deskripsi' => 'Pelanggan mengeluh tentang masalah pembayaran yang tidak tercatat di sistem.',
                'tipe_tiket' => 'Payment Issue',
                'tiket_prioritas' => 'Medium',
                'pengalihan_tiket' => 'finance',
                'lampiran' => $faker->fileExtension,
                'status' => $faker->randomElement(['Open', 'Closed', 'In Progress']),
                'tiket_dibuka' => $faker->dateTimeThisYear,
                'tiket_diselesaikan' => $faker->dateTimeBetween('-2 days', 'now'),
            ],
            [
                'id' => $faker->uuid,
                'judul' => 'Permasalahan Pembayaran Pelanggan',
                'ditugaskan_kepada' => $faker->randomElement($userIds), // Menggunakan ID user yang valid
                'deskripsi' => 'Pelanggan mengeluh tentang masalah pembayaran yang tidak tercatat di sistem.',
                'tipe_tiket' => 'Payment Issue',
                'tiket_prioritas' => 'Medium',
                'pengalihan_tiket' => 'finance',
                'lampiran' => $faker->fileExtension,
                'status' => $faker->randomElement(['Open', 'Closed', 'In Progress']),
                'tiket_dibuka' => $faker->dateTimeThisYear,
                'tiket_diselesaikan' => $faker->dateTimeBetween('now', '+2 days'),
            ],
            [
                'id' => $faker->uuid,
                'judul' => 'Keterlambatan Pengiriman Barang',
                'ditugaskan_kepada' => $faker->randomElement($userIds),
                'deskripsi' => 'Pelanggan melaporkan bahwa barang yang dipesan terlambat dikirim.',
                'tipe_tiket' => 'Shipping Issue',
                'tiket_prioritas' => 'High',
                'pengalihan_tiket' => 'shipping',
                'lampiran' => $faker->fileExtension,
                'status' => $faker->randomElement(['Open', 'Closed', 'In Progress']),
                'tiket_dibuka' => $faker->dateTimeThisYear,
                'tiket_diselesaikan' => $faker->dateTimeBetween('now', '+6 days'),
            ],
            [
                'id' => $faker->uuid,
                'judul' => 'Keluhan Tentang Kualitas Layanan Pelanggan',
                'ditugaskan_kepada' => $faker->randomElement($userIds),
                'deskripsi' => 'Pelanggan tidak puas dengan respons yang diberikan oleh layanan pelanggan.',
                'tipe_tiket' => 'Customer Service',
                'tiket_prioritas' => 'Medium',
                'pengalihan_tiket' => 'customer_service',
                'lampiran' => $faker->fileExtension,
                'status' => $faker->randomElement(['Open', 'Closed', 'In Progress']),
                'tiket_dibuka' => $faker->dateTimeThisYear,
                'tiket_diselesaikan' => $faker->dateTimeBetween('now', '+5 days'),
            ],
            [
                'id' => $faker->uuid,
                'judul' => 'Kesalahan Dalam Penagihan',
                'ditugaskan_kepada' => $faker->randomElement($userIds),
                'deskripsi' => 'Pelanggan melaporkan kesalahan dalam jumlah tagihan yang diterima.',
                'tipe_tiket' => 'Billing Issue',
                'tiket_prioritas' => 'High',
                'pengalihan_tiket' => 'billing',
                'lampiran' => $faker->fileExtension,
                'status' => $faker->randomElement(['Open', 'Closed', 'In Progress']),
                'tiket_dibuka' => $faker->dateTimeThisYear,
                'tiket_diselesaikan' => $faker->dateTimeBetween('now', '+2 days'),
            ],
            [
                'id' => $faker->uuid,
                'judul' => 'Masalah Pada Pembayaran Online',
                'ditugaskan_kepada' => $faker->randomElement($userIds),
                'deskripsi' => 'Pelanggan melaporkan masalah saat melakukan pembayaran melalui sistem online.',
                'tipe_tiket' => 'Payment Issue',
                'tiket_prioritas' => 'Medium',
                'pengalihan_tiket' => 'online_payment',
                'lampiran' => $faker->fileExtension,
                'status' => $faker->randomElement(['Open', 'Closed', 'In Progress']),
                'tiket_dibuka' => $faker->dateTimeThisYear,
                'tiket_diselesaikan' => $faker->dateTimeBetween('-3 days', 'now'),
            ],
        ];

        foreach ($tickets as $ticket) {
            Tiket::create($ticket);
        }




        // // Menambahkan tiket tambahan menggunakan Faker
        // foreach (range(4, 30) as $index) {
        //     Ticket::create([
        //         'id' => $faker->uuid,
        //         'judul' => $faker->sentence(6),
        //         'ditugaskan_kepada' => $faker->randomElement($userIds), // Menggunakan ID user yang valid
        //         'tipe_tiket' => $faker->randomElement(['Product Issue', 'Complaint', 'Inquiry', 'Customer Support', 'Return Request', 'Payment Issue']),
        //         'tiket_prioritas' => $faker->randomElement(['High', 'Medium', 'Low']),
        //         'deskripsi' => $faker->paragraph,
        //         'pengalihan_tiket' => $faker->randomElement(['department', 'warehouse', 'job_position']),
        //         'lampiran' => $faker->fileExtension,
        //         'status' => $faker->randomElement(['Open', 'Closed', 'In Progress']),
        //         'tiket_dibuka' => $faker->dateTimeThisYear,
        //         'tiket_diselesaikan' => $faker->optional()->dateTimeThisYear,
        //     ]);
        // }
    }
}
