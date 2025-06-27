<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Price;
use Illuminate\Support\Str;

class PriceSeeder extends Seeder
{
    public function run(): void
    {
        Price::insert([
            [
                'id' => (string) Str::uuid(),
                'name' => 'Free',
                'price' => 0.00,
                'features' => 'Access to free courses only',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => (string) Str::uuid(),
                'name' => 'Premium',
                'price' => 199.99,
                'features' => 'Unlimited course access, certification, downloadable content',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => (string) Str::uuid(),
                'name' => 'Pro',
                'price' => 349.99,
                'features' => 'Everything in Premium + 1-on-1 mentorship',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
