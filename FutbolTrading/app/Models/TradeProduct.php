<?php

// Emanuel Patiño

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;

class TradeProduct extends Model
{
    /*  TRADEITEM ATTRIBUTES
        $this->attributes['id'] - int - contains the product primary key (id)
        $this->attributes['name'] - string - contains the TradeProduct name
        $this->attributes['type'] - string - contains the TradeProduct type (card, clothes, virtual content...)
        $this->attributes['offerType'] - string - contains the type of offer for TradeProduct (To trade, To sell or Any)
        $this->attributes['offerDescription'] - string - contains more info about the TradeProduct (To trade, To sell or Any)
        $this->attributes['image'] - string - image path
        $this->attributes['created_at'] - string - contains the date and time of the TradeProduct creation
        $this->attributes['updated_at'] - string - contains the date and time of the TradeProduct last update
        $this->user - User - contains the associated User
    */

    protected $fillable = ['name', 'type', 'offerType', 'offerDescription', 'image', 'user'];

    public static function validate(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:5',
            'type' => 'required|string',
            'offerType' => 'required|string',
            'offerDescription' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
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
        return $this->belongsTo(User::class, 'user');
    }

    public function getUser(): User
    {
        return User::findOrFail($this->attributes['user']);
    }

    public function setUser(string $user): void
    {
        $this->attributes['user'] = $user;
    }
}
