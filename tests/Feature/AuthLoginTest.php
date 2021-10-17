<?php

namespace Tests\Feature;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthLoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_page_can_be_rendered()
    {
        $this->get('/login')->assertStatus(200);
    }

    public function test_user_can_be_auth()
    {
        $user = User::factory()->create();
        $response = $this->post('/login', [
            'nopeg' => $user->nopeg,
            'dateofbirth' => $user->dateofbirth,
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }
}
