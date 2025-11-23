<?php

namespace App\Models;

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
}