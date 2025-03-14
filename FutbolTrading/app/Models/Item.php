<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    /**
     * ITEM ATTRIBUTES
     * $this->attributes['id'] - int - contains the item primary key (id)
     * $this->attributes['quantity'] - int - contains the item quantity
     * $this->attributes['subtotal'] - decimal - contains the item subtotal
     * $this->attributes['order_id'] - int - contains the associated Order id
     * $this->attributes['card_id'] - int - contains the associated Card id
     * $this->attributes['created_at'] - DateTime - contains the date and time of the item creation
     * $this->attributes['updated_at'] - DateTime - contains the date and time of the item last update
     * $this->order - Order - contains the associated Order
     * $this->card - Card - contains the associated Card
     */
    protected $fillable = ['quantity', 'subtotal', 'order_id', 'card_id'];

    public static function validate($request)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
            'subtotal' => 'required|numeric|min:0',
            'order_id' => 'required|integer|exists:orders,id',
            'card_id' => 'required|integer|exists:cards,id',
        ]);
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function getQuantity(): int
    {
        return $this->attributes['quantity'];
    }

    public function setQuantity(int $quantity): void
    {
        $this->attributes['quantity'] = $quantity;
    }

    public function getSubtotal(): float
    {
        return $this->attributes['subtotal'];
    }

    public function setSubtotal(float $subtotal): void
    {
        $this->attributes['subtotal'] = $subtotal;
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function getOrderId(): int
    {
        return $this->attributes['order_id'];
    }

    public function setOrderId(int $orderId): void
    {
        $this->attributes['order_id'] = $orderId;
    }

    public function getOrder(): Order
    {
        return $this->order;
    }

    public function setOrder(Order $order): void
    {
        $this->order = $order;
    }

    public function card()
    {
        return $this->belongsTo(Card::class);
    }

    public function getCardId(): int
    {
        return $this->attributes['card_id'];
    }

    public function setCardId(int $cardId): void
    {
        $this->attributes['card_id'] = $cardId;
    }

    public function getCard(): Card
    {
        return $this->card;
    }

    public function setCard(Card $card): void
    {
        $this->card = $card;
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
