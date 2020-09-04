<?php

use Illuminate\Database\Seeder;

class HookahTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        factory(\App\Models\Hookah::class,'hookahs', 50)->create()->each(function ($hookah) {
            $hookah->relation()->save(factory(\App\Models\HookahRelation::class, 'relation')->make());
        });
    }
}
