<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Item extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'item_name',
        'description',
        'category',
        'price',
        'image',
        'location',
        'status',
        'views',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'price' => 'decimal:2',
        'views' => 'integer',
    ];

    /**
     * Get the user that owns the item.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the favorites for the item.
     */
    public function favorites(): HasMany
    {
        return $this->hasMany(Favorite::class);
    }

    /**
     * Get the comments for the item.
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Get the reports for the item.
     */
    public function reports(): HasMany
    {
        return $this->hasMany(Report::class);
    }

    /**
     * Increment the view count for the item.
     */
    public function incrementViews(): void
    {
        $this->increment('views');
    }

    /**
     * Check if the item is favorited by a user.
     */
    public function isFavoritedBy(?User $user): bool
    {
        if (!$user) {
            return false;
        }

        return $this->favorites()->where('user_id', $user->id)->exists();
    }

    /**
     * Get the favorite count for the item.
     */
    public function favoritesCount(): int
    {
        return $this->favorites()->count();
    }

    /**
     * Scope a query to only include active items.
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    /**
     * Scope a query to filter by category.
     */
    public function scopeCategory($query, $category)
    {
        return $query->where('category', $category);
    }
}
