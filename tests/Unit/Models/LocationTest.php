<?php

namespace Tests\Unit\Models;

use App\Models\Item;
use App\Models\Location;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LocationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_can_store_items_in_itself()
    {
        $item = Item::factory()->create([
            'name' => 'My stored item',
        ]);
        // ...that is stored in a known location.
        $location = Location::factory()->create([
            'name' => 'My location',
        ]);

        $location->store(item: $item);

        $this->assertCount(expectedCount: 1, haystack: $location->items);
    }
}
