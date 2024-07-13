<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ImpressionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\Impression::class;

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
            'user_id' => $this->faker->numberBetween(1, DB::table('users')->count()),
            'novel_id' => $this->faker->numberBetween(1, DB::table('novels')->count()),
            'impressions' => $this->faker->paragraph(),
            'created_date' => $this->faker->dateTimeBetween('-1 year', '-1 month'),
            'latest_update' => $this->faker->dateTimeBetween('-1 month', 'now'),
        ];
    }
}
