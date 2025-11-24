<?php

namespace App\Models;

<<<<<<< HEAD
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
=======
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Provider extends Model
{
    use HasFactory;

    // Explicitly define the table name as it's not the default 'providers'
    protected $table = 'provider_profiles';

    // Define user_id as the primary key and disable auto-incrementing
    protected $primaryKey = 'user_id';
    public $incrementing = false;

    protected $fillable = [
        'user_id', 'organization_name', 'contact_number', 
        'about_provider', 'logo_path', 'is_verified'
    ];
    
    protected $casts = [
        'is_verified' => 'boolean',
    ];

    /**
     * Get the User that owns the provider profile.
>>>>>>> NewProduction
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
<<<<<<< HEAD

    /**
     * Get the gigs posted by this provider. (One-to-Many)
     */
    public function gigs(): HasMany
    {
        // gigs.provider_id refers to providers.user_id
        return $this->hasMany(Gig::class, 'provider_id', 'user_id');
    }
=======
>>>>>>> NewProduction
}