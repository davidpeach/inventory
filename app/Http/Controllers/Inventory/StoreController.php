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
        Inventory::create([
            'name' => $request->get(key: 'name'),
        ]);

        return response(content: 'Inventory item created', status: 201);
    }
}

