<?php

declare(strict_types = 1);

use App\Models\Inventory;
use App\Models\User;

test('inventory items can be created', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->postJson(route(name: 'inventory.store'), [
        'name' => 'My Special Item',
    ]);

    $response->assertStatus(201);

    $this->assertDatabaseHas(Inventory::class, [
        'name' => 'My Special Item',
        'user_id' => $user->id,
    ]);
});

test('inventory items require a name', function () {
    $this->postJson(route(name: 'inventory.store'))
        ->assertJsonValidationErrorFor('name');
});
