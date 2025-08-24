<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Dues_member extends Model
{
    protected $fillable = [
        'user_id',
        'dues_category_id',
        'periode_pembayaran'
    ];

    /**
     * Get the user that owns the dues member.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the dues category that owns the dues member.
     */
    public function duesCategory(): BelongsTo
    {
        return $this->belongsTo(Dues_category::class);
    }
}
