<?php

namespace App\Models;

<<<<<<< HEAD
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
        'payment_type', 'payment_amount', 'duration', 'application_deadline', 'status',
        'location',
        'category_id',
    ];

    
    protected $casts = [
        'application_deadline' => 'date',
        'payment_amount' => 'decimal:2',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

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

    public function savedByUsers()
    {
        return $this->belongsToMany(User::class, 'saved_gigs')->withTimestamps();
    }

=======
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gig extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'title', 'description', 'required_skills',
        'payment_type', 'payment_amount', 'duration',
        'location', 'is_remote', 'application_deadline', 'status'
    ];

    protected $casts = [
        'required_skills' => 'array',
        'is_remote' => 'boolean',
        'application_deadline' => 'date',
    ];

    /**
     * Get the User (Provider) that posted the gig.
     */
    public function provider()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get all applications for this gig.
     */
    public function applications()
    {
        return $this->hasMany(Application::class);
    }
>>>>>>> NewProduction
}