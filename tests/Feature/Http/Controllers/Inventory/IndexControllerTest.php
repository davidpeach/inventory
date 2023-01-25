<?php

declare(strict_types = 1);

use App\Models\Inventory;
use App\Models\User;

test('an inventory list for the authenticated user can be returned', function () {
    $correctUser = User::factory()->create();
    $wrongUser = User::factory()->create();

    [$itemA, $itemB] = Inventory::factory()->count(2)->create(['user_id' => $wrongUser->id]);
    $itemC = Inventory::factory()->create(['user_id' => $correctUser->id]);
    $itemD = Inventory::factory()->create(['user_id' => $wrongUser->id]);
    $itemE = Inventory::factory()->create(['user_id' => $correctUser->id]);

    $response = $this->actingAs($correctUser)->get(route(name: 'inventory.index'));

    $response->assertStatus(200)
    ->assertExactJson(['data' => [
        [
            'name' => $itemC->name,
        ],
        [
            'name' => $itemE->name,
        ],
    ]]);
});

test('guests can not return a list of inventory items', function () {
    $this->getJson(route(name: 'inventory.index'))
        ->assertStatus(status: 401);
});
