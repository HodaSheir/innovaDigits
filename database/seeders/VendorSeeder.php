<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vendorUsers = User::where('user_type', 'vendor')->take(10)->get();

        foreach ($vendorUsers as $vendorUser) {
            Vendor::factory()->create([
                'user_id' => $vendorUser->id,
                'phone' => fake()->phoneNumber(),
                'address' => fake()->address(),
                'company_name' => fake()->company(),
            ]);
        }    
    }
}
