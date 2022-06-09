<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use \App\Models\User;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_login()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_register_user()
    {
        $response = $this->post('/register' , [
            'name' => "ExempleTest",
            'email' => "test@test.com",
            'password' => "Daw2020@",
            'password_confirmation' => "Daw2020@",
        ]);

        $response->assertRedirect('/');
    }

    public function test_login_user()
    {
        $response = $this->post('/login' , [
            'email' => "bernatdeulo1@gmail.com",
            'password' => "jn246n217",
            'remember' => "false",
        ]);

        $response->assertRedirect('/');
    }

    public function test_user_seeder()
    {
        $this->assertDatabaseHas('users', [
            'name' => 'NatPawa'
        ]);
    }
}
