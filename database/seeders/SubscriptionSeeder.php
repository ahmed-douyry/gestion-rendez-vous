<?php

namespace Database\Seeders;

use App\Models\Subscription;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Subscription::factory()->count(200)->create();

        // $foreignKeys = DB::select('SELECT * FROM information_schema.KEY_COLUMN_USAGE WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'subscriptions' AND COLUMN_NAME IN ('user_id', 'author_id', 'novel_id')');
        // $foreignKeys = DB::table('information_schema.KEY_COLUMN_USAGE')
        //     ->where('TABLE_SCHEMA', '=', DB::getDatabaseName())
        //     ->where('TABLE_NAME', '=', 'subscriptions')
        //     ->whereIn('COLUMN_NAME', ['user_id', 'author_id', 'novel_id'])
        //     ->get();


        // DB::table('subscriptions')->insert([
        //     [
        //         'user_id' => 1,
        //         'subscription_author_date' => '2023-04-17',
        //         'author_id' => $foreignKeys[0]->REFERENCED_TABLE_NAME,
        //         'subscription_novel_date' => '2023-04-17',
        //         'novel_id' => $foreignKeys[2]->REFERENCED_TABLE_NAME,
        //     ],
        //     [
        //         'user_id' => 2,
        //         'subscription_author_date' => '2023-04-18',
        //         'author_id' => $foreignKeys[1]->REFERENCED_TABLE_NAME,
        //         'subscription_novel_date' => '2023-04-18',
        //         'novel_id' => $foreignKeys[2]->REFERENCED_TABLE_NAME,
        //     ],
        //     [
        //         'user_id' => 3,
        //         'subscription_author_date' => '2023-04-19',
        //         'author_id' => $foreignKeys[1]->REFERENCED_TABLE_NAME,
        //         'subscription_novel_date' => '2023-04-19',
        //         'novel_id' => $foreignKeys[2]->REFERENCED_TABLE_NAME,
        //     ],
        // ]);
    }
}
