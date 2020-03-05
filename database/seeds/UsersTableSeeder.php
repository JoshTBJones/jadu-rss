<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('users')->insert([
            [
                'team_id'   => \App\Team::where('name', 'Team One')->pluck('id')->first(),
                'name'      => 'Test User',
                'email'     => 'test@example.com',
                'password'  => bcrypt('password')
            ],
            [
                'team_id'   => \App\Team::where('name', 'Starfleet')->pluck('id')->first(),
                'name'      => 'Number One',
                'email'     => 'wriker@sf.net',
                'password'  => bcrypt('password')
            ]
        ]);
    }
}
