<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'user' => [
              'id' => $this->id,
              'name' => $this->name,
              'email' => $this->email,
              'mobile' => $this->mobile,
              'user_type' => $this->user_type,
              'address' => $this->customer->address ,
              'city' => $this->customer->city ,
              'state' => $this->customer->state ,
              'country' => $this->customer->country ,
              'pincode' => $this->customer->pincode ,
            ],
            'token' => $this->createToken('mobile-app-token')->plainTextToken,
        ];
    }
}
