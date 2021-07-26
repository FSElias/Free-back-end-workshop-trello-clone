<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Card extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'order', 'card_list_id', 'user_id'];

    public function cardList(): BelongsTo
    {
        return $this->belongsTo(CardList::class);
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
