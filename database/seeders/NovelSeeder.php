<?php

namespace Database\Seeders;

use App\Models\Novel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NovelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Novel::factory()->count(120)->create();
    }
}
