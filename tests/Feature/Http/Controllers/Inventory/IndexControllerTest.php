<?php

namespace Tests\Feature\Http\Controllers\Inventory;

use App\Models\Inventory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IndexControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function the_inventory_list_can_be_returned(): void
    {
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
    }
}
