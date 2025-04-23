<?php

// MarcelaLondoño

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Wishlist extends Model
{
    /**
     * CARD ATTRIBUTES
     * $this->attributes['id'] - int - contains the wishlist primary key (id)
     * $this->attributes['cards'] - array - contains the cards id in an array
     * $this->attributes['created_at'] - DateTime - contains the date and time of the Wishlist creation
     * $this->attributes['updated_at'] - DateTime - contains the date and time of the Wishlist last update
     * $this->user - User - contains the associated User
     */
    protected $fillable = ['user', 'cards'];

    protected $casts = [
        'cards' => 'array',
    ];

    public static function validate($request): void
    {
        $request->validate([
            'user' => 'required|int',
            'cards' => 'nullable',
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

    public function user(): BelongsTo
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

    public function getCards(): Collection
    {
        $cardIds = is_array($this->cards) ? $this->cards : [];

        return Card::whereIn('id', $cardIds)->get();
    }

    public function setCards(array $cards): void
    {
        $this->update(['cards' => $cards]);
    }
}
