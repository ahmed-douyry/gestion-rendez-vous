<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BookmarkFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\Bookmark::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        // $foreignKeys = DB::table('information_schema.KEY_COLUMN_USAGE')
        //     ->where('TABLE_SCHEMA', '=', DB::getDatabaseName())
        //     ->where('TABLE_NAME', '=', 'subscriptions')
        //     ->whereIn('COLUMN_NAME', ['user_id', 'author_id', 'novel_id'])
        //     ->get();
        $chapter_id = $this->faker->unique()->numberBetween(1, DB::table('chapters')->count());
        return [
            'user_id' => $this->faker->numberBetween(1, DB::table('users')->count()),
            'novel_id' => DB::table('chapters')->where('chapter_id', '=', $chapter_id)->value('novel_id'),
            'chapter_id' => $chapter_id,
            'setted_in' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
