<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\FoundItemsResource;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SearchController
{
    public function index(Request $request): ResourceCollection
    {
        $items = Item::where(
            column: 'name',
            operator: 'LIKE',
            value: '%' . $request->get(key: 'q') . '%'
        )->get();

        return FoundItemsResource::collection($items);
    }
}
