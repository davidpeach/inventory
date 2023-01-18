<?php

use App\Models\Inventory;

test('inventory items can be created', function () {
    $response = $this->postJson(route(name: 'inventory.store'), [
        'name' => 'My Special Item',
    ]);

    $response->assertStatus(201);

    $this->assertDatabaseHas(Inventory::class, [
        'name' => 'My Special Item',
    ]);
});

test('inventory items require a name', function () {
    $this->postJson(route(name: 'inventory.store'))
        ->assertJsonValidationErrorFor('name');
});
