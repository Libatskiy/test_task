<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call(HookahBarTableSeeder::class);
        $this->call(HookahTableSeeder::class);
        $this->call(ReservationTableSeeder::class);
    }
}
