<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Card extends Model
{
    /**
     * CARD ATTRIBUTES
     * $this->attributes['id'] - int - contains the card primary key (id)
     * $this->attributes['name'] - string - contains the card name
     * this->attributes['description'] - string - contains the card description
     * this->attributes['image'] - string - contains the card image
     * $this->attributes['price'] - decimal - contains the card price
     * $this->attributes['quantity'] - int - contains the card stock
     * $this->attributes['created_at'] - DateTime - contains the date and time of the Card creation
     * $this->attributes['updated_at'] - DateTime - contains the date and time of the Card last update
     * $this->items - Item[] - contains the associated Items
     * $this->wishlist - Wishlist[] - contains the associated Wishlist
     */
    protected $fillable = ['name', 'description', 'image', 'price', 'quantity'];

    public function validate($request): void
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string',
            'price' => 'required|float|min:0',
            'quantity' => 'required|integer|min:0',
        ]);
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function setName(string $name): void
    {
        $this->attributes['name'] = $name;
    }

    public function getDescription(): string
    {
        return $this->attributes['description'];
    }

    public function setDescription(string $description): void
    {
        $this->attributes['description'] = $description;
    }

    public function getImage(): string
    {
        return $this->attributes['image'];
    }

    public function setImage(string $image): void
    {
        $this->attributes['image'] = $image;
    }

    public function getPrice(): float
    {
        return $this->attributes['price'];
    }

    public function setPrice(int $price): void
    {
        $this->attributes['price'] = $price;
    }

    public function getQuantity(): int
    {
        return $this->attributes['quantity'];
    }

    public function setQuantity(int $quantity): void
    {
        $this->attributes['quantity'] = $quantity;
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }

    public function getItems(): ?Collection
    {
        return $this->items;
    }

    public function setItems(Collection $items): void
    {
        $this->items = $items;
    }

    public function wishlist(): BelongsTo
    {
        return $this->belongsTo(Wishlist::class);
    }

    public function getWishlist(): Wishlist
    {
        return $this->attributes['wishlist'];
    }

    public function setWishlist(int $wishlist): void
    {
        $this->attributes['wishlist'] = $wishlist;
    }

    public static function sumPricesByQuantities($cards, $cardsInSession): float
    {
        $total = 0;
        foreach ($cards as $card) {
            $total += $card->getPrice() * $cardsInSession[$card->getId()];
        }

        return $total;
    }
}
