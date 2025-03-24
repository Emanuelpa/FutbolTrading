<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use DateTime;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * USER ATTRIBUTES
     * $this->attributes['id'] - int - contains the product primary key (id)
     * $this->attributes['name'] - string - contains the user name
     * $this->attributes['email'] - string - contains the user email, unique
     * $this->attributes['emailVerifiedAt'] - DateTime - date and time of the email verification
     * $this->attributes['password'] - string - contain the user password
     * $this->attributes['role'] - string - contain the user role (admin, user)
     * $this->attributes['budget'] - float - contain the user budget
     * $this->attributes['phone'] - string - contain the user phone number
     * $this->attributes['city'] - string - contain the user main city to be set as the default orders city
     * $this->attributes['address'] - string - contain the user default address
     * $this->attributes['remember_token'] - string - the remember me field
     * $this->attributes['created_at'] - DateTime - contains the date and time of the user creation
     * $this->attributes['updated_at'] - DateTime - contains the date and time of the user last update
     * $this->tradeProducts - TradeProduct[] - contains the associated TradeProducts
     * $this->orders - Order[] - contains the associated Orders
     * $this->wishlist - Wishlist - contains the associated Wishlist
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'city',
        'address',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'emailVerifiedAt' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function getId(): int
    {
        return $this->attributes['id'];
    }

    public function setName(string $name): void
    {
        $this->attributes['name'] = $name;
    }

    public function getName(): string
    {
        return $this->attributes['name'];
    }

    public function setEmail(string $email): void
    {
        $this->attributes['email'] = $email;
    }

    public function getEmail(): string
    {
        return $this->attributes['email'];
    }

    public function getEmailVerifiedAt(): DateTime
    {
        return $this->attributes['emailVerifiedAt'];
    }

    public function setPassword(string $password): void
    {
        $this->attributes['password'] = $password;
    }

    public function getPassword(): string
    {
        return $this->attributes['password'];
    }

    public function setRole(string $role): void
    {
        $this->attributes['role'] = $role;
    }

    public function getRole(): string
    {
        return $this->attributes['role'];
    }

    public function setBudget(float $budget): void
    {
        $this->attributes['budget'] = $budget;
    }

    public function getBudget(): float
    {
        return $this->attributes['budget'];
    }

    public function setPhone(string $phone): void
    {
        $this->attributes['phone'] = $phone;
    }

    public function getPhone(): string
    {
        return $this->attributes['phone'];
    }

    public function setCity(string $city): void
    {
        $this->attributes['city'] = $city;
    }

    public function getCity(): string
    {
        return $this->attributes['city'];
    }

    public function setAddress(string $address): void
    {
        $this->attributes['address'] = $address;
    }

    public function getAddress(): string
    {
        return $this->attributes['address'];
    }

    public function getRememberToken(): ?string
    {
        return $this->attributes['remember_token'];
    }

    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }

    public function tradeProducts(): HasMany
    {
        return $this->hasMany(TradeProduct::class, 'user');
    }

    public function getTradeProducts(): ?Collection
    {
        return $this->tradeProducts;
    }

    public function setTradeProducts(Collection $tradeProducts): void
    {
        $this->tradeProducts = $tradeProducts;
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function getOrders(): ?Collection
    {
        return $this->orders;
    }

    public function setOrders(Collection $orders): void
    {
        $this->orders = $orders;
    }

    public function wishlist(): HasOne
    {
        return $this->hasOne(Wishlist::class);
    }

    public function getWishlist(): Wishlist
    {
        return $this->attributes['wishlist'];
    }

    public function setWishlist(int $wishlist): void
    {
        $this->attributes['wishlist'] = $wishlist;
    }
}
