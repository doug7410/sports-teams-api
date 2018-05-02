<?php

use Illuminate\Database\Seeder;

class AppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Team::class, 10)
            ->create()
            ->each(function($team) {
                factory(\App\Player::class, 10)->create(['team_id' => $team->id]);
            });
    }
}
