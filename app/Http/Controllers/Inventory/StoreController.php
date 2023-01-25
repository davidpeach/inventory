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
        Inventory::make([
            'name' => $request->name,
        ])->owner()->associate(auth()->user())->save();

        return response(content: 'Inventory item created', status: 201);
    }
}

