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
            'name' => 'Sonic',
            'description' => "Sonic the Hedgehog (ソニック・ザ・ヘッジホッグ Sonikku za Hejjihoggu?) es un videojuego de plataforma desarrollado por Sonic Team y publicado por Sega para la consola de videojuegos doméstica Sega Genesis. El primer juego de la franquicia Sonic the Hedgehog, se lanzó en Norteamérica en junio de 1991 y en las regiones PAL y Japón el mes siguiente. El juego presenta a Sonic the Hedgehog, que puede correr a velocidades supersónicas, y emprende una búsqueda para derrotar al Dr. Robotnik, un científico que ha encerrado animales en robots y busca las poderosas Chaos Emeralds. El modo de juego implica recolectar anillos como una forma de salud y un esquema de control simple, con saltos y ataques controlados por un solo botón. ",
            'company' => 'SEGA', 
            'yearcreation' => 1991,
            'numplayers' => 1,
            'pathexe' => '/home/pi/RetroPie/roms/genesis/Sonic The Hedgehog (USA, Europe).md',
            'urllogo' => 'logos/eoc2bkrHkRE1APBDf8OOzuEgyY7har8WIJN9IQqV.png',
            'urlcover' => 'covers/Sjy8vtEGG9v33ZDVOBW2E9dhklhmlVVMWdffFhNV.jpg',
        ]);

        DB::table('games')->insert([
            'name' => 'Streets of Rage',
            'description' => "La ciudad ha sido tomada por un sindicato del crimen que se extiende hasta algunas facciones de la policía, por lo que la violencia se convierte en algo común. Ante ello, Adam Hunter, Axel Stone y Blaze Fielding, tres jóvenes policías, renuncian a su trabajo con el objetivo de combatir al sindicato y a la injusticia. Tras involucrarse en una larga batalla que recorre parte de la ciudad, llegan hasta Mr. X, el jefe del sindicato.",
            'company' => 'SEGA', 
            'yearcreation' => 1994,
            'numplayers' => 2,
            'pathexe' => '/home/pi/RetroPie/roms/genesis/Bare Knuckle - Ikari no Tetsuken ~ Streets of Rage (World).md',
            'urllogo' => 'logos/vlPyvvgOQpUheZ5LyFg3R9xra0r4iAQuovkyKfYU.jpg',
            'urlcover' => 'covers/qUMJLNSciMuAjWBbqO63tViZpYlBpMqfTdLXPQPk.jpg',
        ]);
        
        DB::table('games')->insert([
            'name' => "Michael Jackson's Moonwalker",
            'description' => "La historia, que se toma de la película Moonwalker, siguiendo a Michael, utilizando la música y la danza con diversas habilidades relacionadas, en una búsqueda para salvar a los niños secuestrados de las manos del maligno 'Mr. Big'",
            'company' => 'SEGA', 
            'yearcreation' => 1990,
            'numplayers' => 1,
            'pathexe' => "/home/pi/RetroPie/roms/genesis/Michael Jackson'\''s",
            'urllogo' => 'logos/qNnVcKvR0KPknxbJkSiMKrZenwScrfXDBvUKxSiw.jpg',
            'urlcover' => 'covers/t99N6jPfwm4RF04wkC6Qeqoa2FP6kdWFrGgKJAhu.jpg',
        ]);
        
        
    }
}
