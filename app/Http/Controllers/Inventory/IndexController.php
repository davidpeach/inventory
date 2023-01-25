<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Inventory;

use App\Http\Resources\InventoryResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class IndexController
{
    public function __invoke(): AnonymousResourceCollection
    {
        return InventoryResource::collection(
            auth()->user()->inventory,
        );
    }
}
