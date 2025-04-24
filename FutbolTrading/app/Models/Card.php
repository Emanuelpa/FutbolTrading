<?php

// MarcelaLondoño

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;

class Card extends Model
{
    /**
     * CARD ATTRIBUTES
     * $this->attributes['id'] - int - contains the card primary key (id)
     * $this->attributes['name'] - string - contains the card name
     * $this->attributes['description'] - string - contains the card description
     * $this->attributes['image'] - string - contains the card image
     * $this->attributes['price'] - float - contains the card price
     * $this->attributes['quantity'] - int - contains the card stock
     * $this->attributes['created_at'] - DateTime - contains the date and time of the Card creation
     * $this->attributes['updated_at'] - DateTime - contains the date and time of the Card last update
     * $this->items - Item[] - contains the associated Items
     */
    protected $fillable = ['name', 'description', 'image', 'price', 'quantity'];

    public static function validate(Request $request): void
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
        ]);
    }

    public static function sumPricesByQuantities(Collection $cards, array $cardsInSession): float
    {
        $total = 0;
        foreach ($cards as $card) {
            $total += $card->getPrice() * $cardsInSession[$card->getId()];
        }

        return $total;
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

    public function setPrice(float $price): void
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
}
