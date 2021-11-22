<?php

namespace App\Http\Controllers;

use App\Http\Resources\FoundItemsResource;
use App\Models\Item;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SearchController
{
    public function index(Request $request)
    {
        $items = Item::where(column: 'name', operator: '=', value: $request->get(key: 'q'))->get();

        return FoundItemsResource::collection($items);
    }
}
