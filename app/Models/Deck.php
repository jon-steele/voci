<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deck extends Model
{
    use HasFactory;

    protected $table = 'decks';
    protected $primaryKey = 'deck_id';

    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function cards() {
        return $this->hasMany(Card::class);
    }
}
