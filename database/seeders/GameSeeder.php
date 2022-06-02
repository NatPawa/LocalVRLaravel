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
            'name' => 'sonic',
            'pathexe' => '/home/pi/RetroPie/roms/genesis/Sonic The Hedgehog (USA, Europe).md',
            'urllogo' => 'urllogo',
            'urlcover' => 'urlcover',
        ]);

        DB::table('games')->insert([
            'name' => 'streets of rage',
            'pathexe' => 'Bare Knuckle - Ikari no Tetsuken ~ Streets of Rage (World).md',
            'urllogo' => 'urllogo',
            'urlcover' => 'urlcover',
        ]);
    }
}
