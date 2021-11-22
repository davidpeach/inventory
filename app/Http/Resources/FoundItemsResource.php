<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FoundItemsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        /** @noinspection PhpUndefinedFieldInspection */
        return [
            'id' => $this->uuid, /** @phpstan-ignore-line */
            'name' => $this->name, /** @phpstan-ignore-line */
            'location' => new LocationResource($this->location), /** @phpstan-ignore-line */
        ];
    }
}
