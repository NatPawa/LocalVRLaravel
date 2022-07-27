<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SliderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('slider_items')->insert([
            'type' => 'text',
            'title' => 'LocalVR', 
            'description' => "Fusionando recreativas y VR",
            'urlcover' => '/Games/covers/Sjy8vtEGG9v33ZDVOBW2E9dhklhmlVVMWdffFhNV.jpg'
        ]);
    }
}
