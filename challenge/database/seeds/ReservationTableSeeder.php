<?php

use Illuminate\Database\Seeder;

class ReservationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        factory(\App\Models\Reservation::class,'reservation', 5)->make()->each(function ($reservation) {
            $pipe = round($reservation->number_people / 2);
            $hookah = factory(\App\Models\Hookah::class, 'hookahs')->make();
            $hookah->pipe = $pipe;
            $hookah->save();
            $reservation->hookah()->associate($hookah)->save();
        });
    }
}
