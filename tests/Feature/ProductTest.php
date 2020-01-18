<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use WithoutMiddleware;

    public function testOrderProductPage(){
        $this->withoutExceptionHandling();

        $response = $this->get('/admin/products/order');

        $response->assertSee('product');
    }
}
