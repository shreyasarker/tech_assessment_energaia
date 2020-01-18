<?php

namespace Tests\Feature;

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
}
