<?php

namespace Tests\Feature;

use App\Enums\OrderStatus;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class productOrderFeatureTest extends TestCase
{
    public function testProductQuantityDeduction()
    {
        $product =  Product::factory()->create([
            'vendor_id' => 4,
            'name' => fake()->word(),
            'description' => 'This is a sample product.',
            'price' => fake()->numberBetween(20, 120),
            'quantity' => 10,
            'expiration_date' => now()->addMonths(12),
        ]);
        $response = $this->post(route('orders.store'), [
            'customer_id' => 1,  
            'order_number' => '#54657758421',
            'products' => [
                ['product_id' => $product->id, 'quantity' => 3],  
            ],
            'status' => OrderStatus::PENDING,
            'total_amount' => 30 ,
            'vendor_id' => 4,
            'shipping_address' => 'address shipping',
            'billing_address' => 'address billing',
            'payment_method' => 'fawry',
        ]);
        $response->assertRedirect();
        $updatedProduct = Product::find($product->id);
        $this->assertEquals(7, $updatedProduct->quantity);
    }
}
