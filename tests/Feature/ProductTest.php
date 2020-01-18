<?php

namespace Tests\Feature;

use App\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use WithoutMiddleware;

    public function testOrderProductPage(){
        $this->withoutExceptionHandling();

        $response = $this->get('/admin/products/order');

        $response->assertViewIs('products.order');
    }

    public function testOrderProduct(){
        $this->withoutExceptionHandling();

        $response = $this->post(route('admin.products.order'), [
            'sku' => '1234343',
            'name' => 'Asus VivoBook X441U',
            'quantity' => '4',
            'quantity_unit' => 'pcs',
            'rate' => '50000',
            'supplier_id' => '2',
        ]);

        $response->assertStatus(302);
        $this->count(1, Product::all());
    }
}
