<?php

namespace App\Models;

use App\Casts\ToEnglishMoney;
use App\Models\Market\Auction;
use App\Models\Market\Order;
use App\Models\Market\Product;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'mobile', 'national_code', 'slug', 'profile_photo_path', 'password', 'email_verified_at', 'mobile_verified_at', 'user_type', 'status', 'role_id', 'current_team_id', 'remember_token', 'delivery_time_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'cash' => ToEnglishMoney::class,
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'fullName'
    ];

    public function isAdmin(): bool
    {
        return $this->user_type === 1;
    }

    /**
     * Relations
     */
    public function favoriteSellers(): BelongsToMany
    {
        return $this->belongsToMany(self::class, 'user_favorite_sellers', 'user_id', 'seller_id');
    }

    public function otps(): HasMany
    {
        return $this->hasMany(Otp::class);
    }

    public function deliveryTime(): BelongsTo
    {
        return $this->belongsTo(DeliveryTime::class);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function notifications(): MorphMany
    {
        return $this->morphMany(Notification::class, 'notifiable');
    }

    public function allPermissions(): ?Collection
    {
        $this->load('role');

        return collect()
            ->merge($this->permissions->toArray())
            ->merge(optional(optional($this->role)->permissions)->toArray());
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class);
    }

    public function favoriteProducts(): HasMany
    {
        return $this->hasMany(UserFavoriteProduct::class);
    }

    public function auctionSuggestions(): HasMany
    {
        return $this->hasMany(AuctionSuggestion::class);
    }

    public function followingAuctions(): BelongsToMany
    {
        return $this->belongsToMany(Auction::class, 'auction_follower', 'user_id');
    }

    /**
     * Accessors
     */
    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function cashReadable(): Attribute
    {
        return new Attribute(
            get: fn () => fa_price($this->cash)
        );
    }

    /**
     * Scopes
     */
    public function scopeAdmins($query): Builder
    {
        return $query->where('user_type', 1);
    }

    public function scopeCustomers($query): Builder
    {
        return $query->where('user_type', 0);
    }
}
