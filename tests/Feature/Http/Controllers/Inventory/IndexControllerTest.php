<?php

declare(strict_types = 1);

use App\Models\Inventory;

test('the inventory list can be returned', function () {
        [$itemA, $itemB, $itemC] = Inventory::factory()->count(3)->create();

        $response = $this->get(route(name: 'inventory.index'));

        $response->assertStatus(200)
        ->assertExactJson(['data' => [
            [
                'name' => $itemA->name,
            ],
            [
                'name' => $itemB->name,
            ],
            [
                'name' => $itemC->name,
            ],
        ]]);
});

