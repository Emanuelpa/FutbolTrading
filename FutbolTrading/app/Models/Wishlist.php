<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Wishlist extends Model
{
    /**
     * CARD ATTRIBUTES
     * $this->attributes['id'] - int - contains the wishlist primary key (id)
     * $this->attributes['created_at'] - DateTime - contains the date and time of the Wishlist creation
     * $this->attributes['updated_at'] - DateTime - contains the date and time of the Wishlist last update
     * $this->user - User - contains the associated User
     * $this->cards - Card[] - contains the associated Cards
     */

    protected $fillable = ['user'];

    public static function validate($request): void
    {
        $request->validate([
            'user' => 'required|int',
            'card' => 'nullable|int'
        ]);
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    public function user() : BelongsTo 
    {
        return $this->belongsTo(User::class);
    }

    public function getUser(): User
    {
        return $this->attributes['user'];
    }

    public function setUser(int $user): void
    {
        $this->attributes['user'] = $user;
    }

    public function cards(): HasMany
    {
        return $this->hasMany(Card::class);
    }

    public function getCards(): ?Collection
    {
        return $this->attributes['cards'];
    }

    public function setCards(Collection $cards): void
    {
        $this->attributes['cards'] = $cards;
    }
}
