<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('games')->insert([
            [
                'title' => 'The Legend of Zelda',                
            ],[
                'title' => 'Xenoblade Chronicles',                
            ],[
                'title' => 'Monster Hunter',                
            ],[
                'title' => 'Stardew Valley',                
            ]
        ]);
    }
}
