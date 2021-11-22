<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Location extends Model
{
    use HasFactory;

    public function store(Item $item): void
    {
        $item->update([
            'location_id' => $this->id,
        ]);
    }

    public function items(): HasMany
    {
        return $this->hasMany(related: Item::class);
    }
}
