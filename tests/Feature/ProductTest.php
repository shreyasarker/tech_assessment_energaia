<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    public function testOrderProductPage(){
        $this->withoutExceptionHandling();
        $this->withoutMiddleware();

        $response = $this->get('/admin/products/order');

        $response->assertViewIs('products.order');
    }
}
