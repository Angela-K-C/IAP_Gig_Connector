<?php

namespace App\Models;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
=======
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
>>>>>>> NewProduction

class Notification extends Model
{
    use HasFactory;
<<<<<<< HEAD
    
    // Disable timestamps as only 'created_at' is used
    public $timestamps = false;

    protected $fillable = [
        'user_id', 'title', 'message', 'is_read', 'created_at'
    ];

    /**
     * Get the user who the notification belongs to. (Belongs To)
     */
    public function user(): BelongsTo
=======

    protected $fillable = [
        'user_id', 
        'title', 
        'message', 
        'is_read',
    ];

    protected $casts = [
        'is_read' => 'boolean',
    ];

    /**
     * Get the user this notification is intended for.
     */
    public function user()
>>>>>>> NewProduction
    {
        return $this->belongsTo(User::class);
    }
}