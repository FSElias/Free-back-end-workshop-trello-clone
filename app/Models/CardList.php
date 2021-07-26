<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CardList extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    public function cards(): HasMany
    {
        return $this->hasMany(Card::class);
    }

    public function board(): BelongsTo
    {
        return $this->belongsTo(Board::class);
    }
}
