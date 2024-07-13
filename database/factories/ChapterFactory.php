<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ChapterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\Chapter::class;

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
        $novel_id = $this->faker->numberBetween(1, DB::table('novels')->count());
        return [
            'chapter_order' => $this->faker->unique(true)->numberBetween(1, 120),
            'chapter_name' => $this->faker->unique(true)->sentence(),
            'nbr_views' => $this->faker->numberBetween(0, 100000),
            'authoring_date' => $this->faker->dateTimeBetween('-1 year', '-1 month'),
            'last_update' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'anticipated_by' => $this->faker->numberBetween(0, 600),
            'audio_label' => $this->faker->sentence(),
            'audio_URL' => $this->faker->url(),
            'novel_id' => $novel_id,
            'author_id' => DB::table('novels')->where('novel_id', '=', $novel_id)->value('author_id'),

        ];
    }
}
