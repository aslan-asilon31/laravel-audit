<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mentor;
use Illuminate\Support\Str;

class MentorSeeder extends Seeder
{
    public function run(): void
    {
        Mentor::create([
            'id'    => (string) Str::uuid(),
            'name'  => 'Karina Eun',
            'email' => 'karina@example.com',
            'bio'   => 'Experienced front-end mentor and UI/UX enthusiast.',
        ]);

        Mentor::create([
            'id'    => (string) Str::uuid(),
            'name'  => 'Cha Eunwoo',
            'email' => 'eunwoo@example.com',
            'bio'   => 'Senior software engineer mentoring full-stack web development.',
        ]);
    }
}
