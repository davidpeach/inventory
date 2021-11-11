<?php

use App\Models\Item;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command(signature: 'item:add {name}', callback: function () {

    Item::create([
        'name' => $this->argument('name'),
    ]);

})->purpose(description: 'Add a new item');

Artisan::command(signature: 'item:search {name}', callback: function () {

    $item = Item::where([
        'name' => $this->argument('name'),
    ])->first();

    $this->info($item->location->name);

})->purpose(description: 'Search for an new item');
