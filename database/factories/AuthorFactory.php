<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class AuthorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Author::class;

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
            'nickname' => $this->faker->unique()->userName(),
            'nbr_subscriptions' => $this->faker->numberBetween(0, 1000),
            'nbr_novels' => $this->faker->numberBetween(0, 100),
            'nbr_chapters' => $this->faker->numberBetween(0, 1200),
            'badges' => $this->faker->randomElement([null, json_encode(['badge1', 'badge2', 'badge3', 'badge4', 'badge5'])]),
            // 'user_id' => $foreignKeys->where('COLUMN_NAME', '=', 'user_id')->random()->REFERENCED_COLUMN_NAME(),
            'user_id' => $this->faker->unique()->numberBetween(1, DB::table('users')->count()),
        ];
    }
}
