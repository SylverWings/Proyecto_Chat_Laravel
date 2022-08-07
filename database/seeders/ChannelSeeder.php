<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChannelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('channels')->insert([
            [
                'name' => 'Ocarina of Time',
                'game_id' => 1,
            ],[
                'name' => 'The Breath of the Wild',
                'game_id' => 1,
            ],[
                'name' => 'Monados',
                'game_id' => 2,
            ],[
                'name' => 'Rathalos',
                'game_id' => 3,
            ],[
                'name' => 'Glavenus',
                'game_id' => 3,
            ]
        ]);
    }
}
