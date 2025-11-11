<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provider extends Model
{
    use HasFactory, SoftDeletes;

    // Turn off auto-incrementing since the primary key is a foreign key
    public $incrementing = false;
    protected $primaryKey = 'user_id'; // Match migration

    protected $fillable = [
        'user_id', 
        'organization_name', 
        'contact_number', 
        'about_provider'
    ];
    
    /**
     * Get the parent User record. (One-to-One Inverse)
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the gigs posted by this provider. (One-to-Many)
     */
    public function gigs(): HasMany
    {
        // gigs.provider_id refers to providers.user_id
        return $this->hasMany(Gig::class, 'provider_id', 'user_id');
    }
}