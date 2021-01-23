<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\Reservation;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Reservation::factory()->count(3)->for(
            Event::factory(), 'event'
        )->create();
        // \App\Models\User::factory(10)->create();
    }
}
