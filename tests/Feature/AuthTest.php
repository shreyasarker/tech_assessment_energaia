<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    public function testLoginForm(){
        $this->withoutExceptionHandling();

        $response = $this->get('/');

        $response->assertViewIs('login');
    }

    public function testAdminLogin(){
        $this->withoutExceptionHandling();

        $email = 'admin@email.com';

        $response = $this->post(route('login'), [
            'email' => $email,
            'password' => 'password',
        ]);

        $user = User::where('email',$email)->first();

        $this->assertNotNull($user);
        $this->assertAuthenticatedAs($user);
        $this->assertNotFalse($user->isAdmin());

        $response->assertRedirect(route('admin.home'));
    }
}
