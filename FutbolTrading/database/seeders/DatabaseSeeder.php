<?php

namespace Database\Seeders;

use App\Models\TradeItem;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        //User::factory(5)->create();
        TradeItem::factory(10)->create();
    }
}
