<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    /**
     * ORDER ATTRIBUTES

     * $this->attributes['id'] - int - contains the card primary key (id)
     * $this->attributes['item'] - string - contains the card name
     * $this->attributes['total'] - double - contains the card total
     * $this->attributes['address'] - string - contains the card description
     * $this->attributes['paymentMethod'] - string - contains the user payment method
     * $this->attributes['created_at'] - DateTime - contains the date and time of the card creation
     * $this->attributes['updated_at'] - DateTime - contains the date and time of the card last update
     * $this->['user_id'] - int - contains the associated User id
     * $this->user - User - contains the associated User
     * $this->items - Item[] - contains the associated Items
     */
    protected $fillable = ['total', 'address', 'paymentMethod'];

    public static function validate($request): void
    {
        $request->validate([
            'item' => 'required|string|min:5',
            'total' => 'required|numeric',
            'address' => 'required|string',
            'paymentMethod' => 'required|string',
            'user_id' => 'required|integer|exists:users,id',
        ]);
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }

    public function getItems(): ?Collection
    {
        return $this->items;
    }

    public function setItems(string $items): void
    {
        $this->attributes['items'] = $items;
    }

    public function getTotal(): float
    {
        return $this->attributes['total'];
    }

    public function setTotal(float $total): void
    {
        $this->attributes['total'] = $total;
    }

    public function getAddress(): string
    {
        return $this->attributes['address'];
    }

    public function setAddress(string $address): void
    {
        $this->attributes['address'] = $address;
    }

    public function getPaymentMethod(): string
    {
        return $this->attributes['paymentMethod'];
    }

    public function setPaymentMethod(string $paymentMethod): void
    {
        $this->attributes['paymentMethod'] = $paymentMethod;
    }

    public function getUserId(): string
    {
        return $this->attributes['user'];
    }

    public function setUserId(string $userId): void
    {
        $this->attributes['user'] = $userId;
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getUser(): User
    {
        return $this->attributes['user'];
    }

    public function setUser(User $user): void
    {
        $this->attributes['user'] = $user;
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }
}
