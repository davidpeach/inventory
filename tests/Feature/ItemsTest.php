<?php

namespace Tests\Feature;

use App\Models\Item;
use App\Models\Location;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ItemsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function an_item_can_be_found_by_its_full_name()
    {
        // GIVEN I have an item...
        $item = Item::factory()->create([
            'name' => 'My stored item',
        ]);

        // ...that is stored in a known location.
        $location = Location::factory()->create([
            'name' => 'My location',
        ]);

        $location->store(item: $item);

        // WHEN I search for that item by name.
        $this->assertTrue(condition: true);

        // THEN I should be given the correct location.
    }

    /**
     * @test
     */
    public function newly_added_items_will_not_yet_have_a_location_by_default()
    {
        $this->assertTrue(condition: true);

//        $addedItem = Item::first();
//
//        $this->assertEquals(expected: null, actual: $addedItem->location);
    }
}
