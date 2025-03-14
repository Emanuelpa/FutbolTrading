<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Item;

class Order extends Model
{
    use HasFactory;

    /**
     * ORDER ATTRIBUTES

     * $this->attributes['id'] - int - contains the card primary key (id)
     * $this->attributes['item'] - string - contains the card name
     * $this->attributes['total'] - float - contains the card total
     * $this->attributes['address'] - string - contains the card description
     * $this->attributes['payment_method'] - string - contains the user payment method
     * $this->attributes['created_at'] - DateTime - contains the date and time of the card creation
     * $this->attributes['updated_at'] - DateTime - contains the date and time of the card last update
     * $this->['user_id'] - int - contains the associated User id
     * $this->user - User - contains the associated User
     * $this->items - Item[] - contains the associated Items
     */
    protected $fillable = ['item', 'total', 'address', 'payment_method'];

    public static function validate($request)
    {
        $request->validate([
            'item' => 'required|string|min:5',
            'total' => 'required|numeric',
            'address' => 'required|string',
            'payment_method' => 'required|string',
            'user_id' => 'required|integer|exists:users,id'
        ]);
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function getItem(): string
    {
        return $this->attributes['item'];
    }

    public function setItem(string $item): void
    {
        $this->attributes['item'] = $item;
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
        return $this->attributes['payment_method'];
    }

    public function setPaymentMethod(string $paymentMethod): void
    {
        $this->attributes['payment_method'] = $paymentMethod;
    }

    public function getUserId(): int
    {
        return $this->attributes['user_id'];
    }

    public function setUserId(int $userId): void
    {
        $this->attributes['user_id'] = $userId;
    }

    public function user()
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