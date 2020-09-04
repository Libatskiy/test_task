<?php

use Illuminate\Database\Seeder;

class HookahBarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('hookah_bars')->insert([
            'name' => 'First'
        ]);

        DB::table('hookah_bars')->insert([
            'name' => 'Second'
        ]);
    }
}
