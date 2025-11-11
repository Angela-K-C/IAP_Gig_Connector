<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notification extends Model
{
    use HasFactory;
    
    // Disable timestamps as only 'created_at' is used
    public $timestamps = false;

    protected $fillable = [
        'user_id', 'title', 'message', 'is_read', 'created_at'
    ];

    /**
     * Get the user who the notification belongs to. (Belongs To)
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}