<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vendorUsers = Vendor::take(10)->get();
        foreach ($vendorUsers as $vendorUser) {
            Product::factory()->create([
                'vendor_id' => $vendorUser->id,
                'name' => fake()->word(),
                'description' => 'This is a sample product.',
                'price' => fake()->numberBetween(20,120),
                'quantity' => 50,
                'expiration_date' => now()->addMonths(12),
            ]);
        }
       
    }
}
