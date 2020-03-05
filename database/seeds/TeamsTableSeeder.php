<?php

use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teams')->insert([
            [
                'name'  => 'Team One',
            ],
            [
                'name'  => 'Starfleet'
            ]
        ]);
    }
}
