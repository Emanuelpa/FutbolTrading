<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TradeItem extends Model
{
    use HasFactory;

    /*  TRADEITEM ATTRIBUTES
        $this->attributes['id'] - int - contains the item primary key (id)
        $this->attributes['name'] - string - contains the TradeItem name
        $this->attributes['type'] - string - contains the TradeItem type (card, clothes, virtual content...)
        $this->attributes['offerType'] - string - contains the type of offer for TradeItem (To trade, To sell or Any)
        $this->attributes['offerDescription'] - string - contains more info about the TradeItem (To trade, To sell or Any)
        $this->attributes['image'] - string - image url
        $this->attributes['created_at'] - string - contains the date and time of the TradeItem creation
        $this->attributes['updated_at'] - string - contains the date and time of the TradeItem last update
        $this->user - User - contains the associated User
    */

    protected $fillable = ['name', 'type', 'offerType', 'offerDescription', 'image', 'user'];

    public static function validate($request)
    {
        $request->validate([
            'name' => 'required|string|min:5',
            'type' => 'required|string',
            'offerType' => 'required|string',
            'offerDescription' => 'required|string',
            'image' => 'required|string',
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

    public function getType(): string
    {
        return $this->attributes['type'];
    }

    public function setType(string $type): void
    {
        $this->attributes['type'] = $type;
    }

    public function getOfferType(): string
    {
        return $this->attributes['offerType'];
    }

    public function setOfferType(string $offerType): void
    {
        $this->attributes['offerType'] = $offerType;
    }

    public function getOfferDescription(): string
    {
        return $this->attributes['offerDescription'];
    }

    public function setOfferDescription(string $offerDescription): void
    {
        $this->attributes['offerDescription'] = $offerDescription;
    }

    public function getImage(): string
    {
        return $this->attributes['image'];
    }

    public function setImage(string $image): void
    {
        $this->attributes['image'] = $image;
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
        return User::findOrFail($this->attributes['user']);
    }

    public function setUser(int $user): void
    {
        $this->attributes['user'] = $user;
    }
}
