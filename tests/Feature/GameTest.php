<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use \App\Models\User;

class GameTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_games()
    {
        $response = $this->get('api/games');

        $response->assertStatus(200);
    }

    public function test_game_seeder()
    {
        $this->assertDatabaseHas('games', [
            'name' => 'Sonic'
        ]);
    }
}
