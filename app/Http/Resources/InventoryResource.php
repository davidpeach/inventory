<?php

namespace App\Http\Resources;

use App\Models\Inventory;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Inventory
 */
class InventoryResource extends JsonResource
{
    /**
     * @return array<string, string>
     */ 
    public function toArray($request): array
    {
        return [
            'name' => $this->name,
        ];
    }
}
