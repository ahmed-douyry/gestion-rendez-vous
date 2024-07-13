<?php

namespace Database\Factories;

use App\Models\Subscription;
use Closure;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SubscriptionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\Subscription::class;

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
            'author_id' => $this->faker->randomElement([null,  $this->faker->numberBetween(1, DB::table('authors')->count())]),
            'subscription_author_date' => $this->faker->dateTime(null)->format('Y-m-d H:i:s'),
            'novel_id' => $this->faker->randomElement([null,  $this->faker->numberBetween(1, DB::table('novels')->count())]),
            'subscription_novel_date' => $this->faker->dateTime(null)->format('Y-m-d H:i:s'),
        ];
    }
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($subscription) {
            if ($subscription->author_id) {
                $subscription->subscription_author_date = now();
            }
            if ($subscription->novel_id) {
                $subscription->subscription_novel_date = now();
            }
        });
    }
}
