<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;

class Dues_category extends Model
{
    protected $fillable = [
        'period',
        'nominal',
        'status'
    ];

    /**
     * Get the dues members for the dues category.
     */
    public function duesMembers(): HasMany
    {
        return $this->hasMany(Dues_member::class);
    }

    /**
     * Scope a query to only include active categories.
     */
    public function scopeActive(Builder $query): void
    {
        $query->where('status', 'aktif');
    }

    /**
     * Get the display name for the category.
     */
    public function getDisplayNameAttribute(): string
    {
        return "{$this->period} - Rp " . number_format($this->nominal, 0, ',', '.');
    }
}
