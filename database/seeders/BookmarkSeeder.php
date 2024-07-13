<?php

namespace Database\Seeders;

use App\Models\Bookmark;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookmarkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {

        Bookmark::factory()->count(100)->create();

        // DB::table('bookmarks')->insert([
        //     [
        //         'user_id' => 1,
        //         'novel_id' => 1,
        //         'chapter_id' => 1,
        //         'setted_in' => now(),
        //     ],
        //     [
        //         'user_id' => 2,
        //         'novel_id' => 2,
        //         'chapter_id' => 2,
        //         'setted_in' => now(),
        //     ],
        //     [
        //         'user_id' => 3,
        //         'novel_id' => 3,
        //         'chapter_id' => 3,
        //         'setted_in' => now(),
        //     ],
        // ]);
    }
}
