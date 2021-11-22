<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LocationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        /** @noinspection PhpUndefinedFieldInspection */
        return [
            'name' => $this->name, /** @phpstan-ignore-line */
        ];
    }
}
