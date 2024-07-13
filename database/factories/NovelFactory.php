<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NovelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\Novel::class;

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
        return [
            'version_name' => $this->faker->unique()->word(),
            'alt_names' => $this->faker->sentence(),
            'summary' => $this->faker->paragraph(),
            'genre' => json_encode($this->faker->randomElements(['Action', 'Adventure', 'Comedy', 'Drama', 'Fantasy', 'Horror', 'Mystery', 'Romance', 'Science Fiction', 'Thriller'])),
            'nbr_subscriptions' => $this->faker->numberBetween(0, 1000),
            'nbr_views' => $this->faker->numberBetween(0, 10000),
            'nbr_votes' => $this->faker->numberBetween(0, 100),
            'recommendation_rate' => $this->faker->randomFloat(2, 0, 1),
            'chapters' => json_encode($this->faker->randomElements(['Chapter 1', 'Chapter 2', 'Chapter 3', 'Chapter 4', 'Chapter 5'])),
            'authoring_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'last_update' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'posterURL' => $this->faker->imageUrl(),
            'thumbnailURL' => $this->faker->imageUrl(),
            'inspirations' => json_encode($this->faker->randomElements(['Inspiration 1', 'Inspiration 2', 'Inspiration 3'])),
            'related_to' => json_encode($this->faker->randomElements(['Related 1', 'Related 2', 'Related 3'])),
            // 'author_id' => $foreignKeys->where('COLUMN_NAME', '=', 'author_id')->random()->REFERENCED_COLUMN_NAME(),
            'author_id' => $this->faker->numberBetween(1, DB::table('authors')->count()),
        ];
    }
}
