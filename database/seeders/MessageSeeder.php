<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('messages')->insert([
            [
                'message' => 'Entonces, qué escudo prefieres? El hyliano o el Reflectante?',
                'user_id' => 1,
                'channel_id' => 1,
                'date' => '2022-08-01'
            ],[
                'message' => 'Pfff... el Hyliano de calle',
                'user_id' => 11,
                'channel_id' => 1,
                'date' => '2022-08-01'
            ],[
                'message' => 'Por qué?',
                'user_id' => 1,
                'channel_id' => 1,
                'date' => '2022-08-01'
            ]
        ]);    
    }
}
