<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use App\Models\Mentor;
use App\Models\Price;
use Illuminate\Support\Str;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        $mentor = Mentor::first(); // Ambil mentor pertama
        $price = Price::where('name', 'Premium')->first(); // Ambil harga premium

        if ($mentor && $price) {
            Course::create([
                'id' => (string) Str::uuid(),
                'mentor_id' => $mentor->id,
                'price_id' => $price->id,
                'title' => 'Web Development Fundamentals',
                'description' => 'Learn HTML, CSS, JavaScript from scratch with guided projects and mentorship.',
            ]);
        }
    }
}
