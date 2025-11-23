<?php

namespace App\Models;

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
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}