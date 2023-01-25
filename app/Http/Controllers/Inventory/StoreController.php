<?php

declare(strict_types = 1);

namespace App\Http\Controllers\Inventory;

use App\Http\Requests\InventoryStoreRequest;
use App\Models\Inventory;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;

class StoreController
{
    public function __invoke(InventoryStoreRequest $request): Response|ResponseFactory
    {
        $in = Inventory::create([
            'name' => $request->name,
        ]);

        $in->owner()->associate(auth()->user());

        return response(content: 'Inventory item created', status: 201);
    }
}

