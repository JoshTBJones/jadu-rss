<?php

use Illuminate\Database\Seeder;

class FeedsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('feeds')->insert([
            [
                'team_id'    => \App\Team::where('name', 'Team One')->pluck('id')->first(),
                'name'       => 'PHP news',
                'source'     => 'https://www.php.net/news.rss',
                'created_by' => \App\User::where('team_id', 1)->pluck('id')->first(),
                'created_at' => now(),
                'updated_by' => \App\User::where('team_id', 1)->pluck('id')->first(),
                'updated_at' => now(),
            ],
            [
                'team_id'    => \App\Team::where('name', 'Team One')->pluck('id')->first(),
                'name'       => 'Slashdot',
                'source'     => 'http://rss.slashdot.org/Slashdot/slashdot',
                'created_by' => \App\User::where('team_id', 1)->pluck('id')->first(),
                'created_at' => now(),
                'updated_by' => \App\User::where('team_id', 1)->pluck('id')->first(),
                'updated_at' => now(),
            ],
        ]);
    }
}
