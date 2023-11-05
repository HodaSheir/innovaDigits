<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customerUsers = User::where('user_type', 'customer')->take(10)->get();
        foreach ($customerUsers as $customerUser) {
            Customer::factory()->create([
                'user_id' => $customerUser->id,
                'city' => fake()->city(),
                'state' => fake()->state(),
                'country' => fake()->country(),
                'pincode' => fake()->postcode(),
                'address' => fake()->address(),
            ]);
        }
    }    
       
}
