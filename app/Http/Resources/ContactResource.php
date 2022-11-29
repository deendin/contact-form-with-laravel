<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactResource extends JsonResource
{
    /**
     * Transforms the contact resource into an array.
     * 
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->uuid,
            'name' => $this->name,
            'email' => $this->email_address,
            'message' => $this->message
        ];
    }

    public function with($request)
    {
        return [
            'status' => 'success',
            'message' => 'Contact created successfully.'
        ];
    }
}