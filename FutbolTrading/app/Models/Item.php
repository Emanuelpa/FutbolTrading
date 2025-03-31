<?php
//TomasPineda
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    /**
     * ITEM ATTRIBUTES
     * $this->attributes['id'] - int - contains the item primary key (id)
     * $this->attributes['quantity'] - int - contains the item quantity
     * $this->attributes['subtotal'] - float - contains the item subtotal
     * $this->attributes['order'] - int - contains the associated Order id
     * $this->attributes['card'] - int - contains the associated Card id
     * $this->attributes['created_at'] - DateTime - contains the date and time of the item creation
     * $this->attributes['updated_at'] - DateTime - contains the date and time of the item last update
     * $this->order - Order - contains the associated Order
     * $this->card - Card - contains the associated Card
     */
    protected $fillable = ['quantity', 'subtotal', 'order', 'card'];

    public static function validate($request): void
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
            'subtotal' => 'required|numeric|min:0',
            'order' => 'required|integer|exists:orders,id',
            'card' => 'required|integer|exists:cards,id',
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

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'order');
    }

    public function getOrderId(): int
    {
        return $this->attributes['order'];
    }

    public function setOrderId(int $orderId): void
    {
        $this->attributes['order'] = $orderId;
    }

    public function getOrder(): Order
    {
        return $this->order;
    }

    public function setOrder(Order $order): void
    {
        $this->order = $order;
    }

    public function card(): BelongsTo
    {
        return $this->belongsTo(Card::class, 'card');
    }

    public function getCardId(): string
    {
        return $this->attributes['card'];
    }

    public function setCardId(string $cardId): void
    {
        $this->attributes['card'] = $cardId;
    }

    public function getCard(): Card
    {
        return $this->card()->first();
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
