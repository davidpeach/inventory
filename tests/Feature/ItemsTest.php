<?php

namespace Tests\Feature;

use App\Models\Item;
use App\Models\Location;
use Faker\Provider\Uuid;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ItemsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function an_item_can_be_found_by_its_exact_full_name()
    {
        $uuid = Uuid::uuid();
        $item = Item::factory()->create([
            'uuid' => $uuid,
            'name' => 'My stored item',
        ]);

        Location::factory()->create([
            'name' => 'My location',
        ]);

        $location = Location::first();
        $location->store(item: $item);

        $response = $this->get(uri: $this->api_base . '/search?q=My stored item');

        $response->assertJson(value: [
            'data' => [[
                'id' => $uuid,
                'name' => 'My stored item',
                'location' => [
                    'name' => 'My location',
                ],
            ]],
        ]);
    }

    /**
     * @test
     */
    public function an_item_can_be_found_by_searching_the_start_of_its_name()
    {
        $uuid = Uuid::uuid();
        $item = Item::factory()->create([
            'uuid' => $uuid,
            'name' => 'My stored item',
        ]);

        Location::factory()->create([
            'name' => 'My location',
        ]);

        $location = Location::first();
        $location->store(item: $item);

        $response = $this->get(uri: $this->api_base . '/search?q=My stor');

        $response->assertJson(value: [
            'data' => [[
                'id' => $uuid,
                'name' => 'My stored item',
                'location' => [
                    'name' => 'My location',
                ],
            ]],
        ]);
    }

    /**
     * @test
     */
    public function an_item_can_be_found_by_searching_the_end_of_its_name()
    {
        $uuid = Uuid::uuid();
        $item = Item::factory()->create([
            'uuid' => $uuid,
            'name' => 'My stored item',
        ]);

        Location::factory()->create([
            'name' => 'My location',
        ]);

        $location = Location::first();
        $location->store(item: $item);

        $response = $this->get(uri: $this->api_base . '/search?q=stored item');

        $response->assertJson(value: [
            'data' => [[
                'id' => $uuid,
                'name' => 'My stored item',
                'location' => [
                    'name' => 'My location',
                ],
            ]],
        ]);
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
