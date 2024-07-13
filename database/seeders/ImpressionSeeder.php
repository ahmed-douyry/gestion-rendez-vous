<?php

namespace Database\Seeders;

use App\Models\Impression;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImpressionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Impression::factory()->count(100)->create();

        // DB::table('impressions')->insert([
        //     [
        //         'user_id' => 1,
        //         'novel_id' => 1,
        //         'impressions' => 'This is a great novel! I really enjoyed reading it.',
        //         'created_date' => now(),
        //         'latest_update' => now(),
        //     ],
        //     [
        //         'user_id' => 2,
        //         'novel_id' => 2,
        //         'impressions' => 'This novel was okay. I didn\'t really enjoy it as much as the first one.',
        //         'created_date' => now(),
        //         'latest_update' => now(),
        //     ],
        //     [
        //         'user_id' => 3,
        //         'novel_id' => 3,
        //         'impressions' => 'This novel was amazing! I couldn\'t put it down.',
        //         'created_date' => now(),
        //         'latest_update' => now(),
        //     ],
        // ]);
    }
}
