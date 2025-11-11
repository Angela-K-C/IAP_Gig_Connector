<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gig extends Model
{
    use HasFactory, SoftDeletes;
    
    // Maps to 'gigs' table, uses default 'id' PK

    protected $fillable = [
        'provider_id', 'title', 'description', 'required_skills', 
        'payment_type', 'payment_amount', 'duration', 'application_deadline', 'status'
    ];
    
    protected $casts = [
        'application_deadline' => 'date',
        'payment_amount' => 'decimal:2',
    ];

    /**
     * Get the provider (organization) that posted the gig. (Belongs To)
     */
    public function provider(): BelongsTo
    {
        // gigs.provider_id refers to providers.user_id
        return $this->belongsTo(Provider::class, 'provider_id', 'user_id');
    }

    /**
     * Get all applications for this gig. (One-to-Many)
     */
    public function applications(): HasMany
    {
        return $this->hasMany(Application::class, 'job_id');
    }
}