<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use DateTime;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
     * $this->attributes['remember_token'] - string - the remember me field
     * $this->attributes['created_at'] - DateTime - contains the date and time of the user creation
     * $this->attributes['updated_at'] - DateTime - contains the date and time of the user last update
     * $this->tradeItems - TradeItem[] - contains the associated TradeItems
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'budget',
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

    public function getRememberToken(): string
    {
        return $this->attributes['remember_token'];
    }

    public function getCreatedAt(): DateTime
    {
        return $this->attributes['created_at'];
    }

    public function getUpdatedAt(): DateTime
    {
        return $this->attributes['updated_at'];
    }

    public function tradeItems(): HasMany
    {
        return $this->hasMany(TradeItem::class);
    }

    public function getTradeItems(): ?Collection
    {
        return $this->tradeItems;
    }

    public function setTradeItems(Collection $tradeItems): void
    {
        $this->tradeItems = $tradeItems;
    }
}
