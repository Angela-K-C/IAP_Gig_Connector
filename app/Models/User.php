<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
<<<<<<< HEAD
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\SentMessage;
use App\Models\Application;
use App\Models\StudentProfile;


class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, SoftDeletes;
=======
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
>>>>>>> NewProduction

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    /**
     * Get the attributes that should be cast.
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

<<<<<<< HEAD
    // relationships
    public function studentProfile(): HasOne
    {
        return $this->hasOne(StudentProfile::class);
    }

=======
    // --- RELATIONSHIPS ---

    /**
     * Get the Student profile associated with the user.
     */
    public function student(): HasOne
    {
        return $this->hasOne(Student::class);
    }

    /**
     * Get the Provider profile associated with the user.
     */
>>>>>>> NewProduction
    public function provider(): HasOne
    {
        return $this->hasOne(Provider::class);
    }

<<<<<<< HEAD
    public function sentMessages(): HasMany
    {
        return $this->hasMany(Message::class, 'sender_id');
    }

    public function receivedMessages(): HasMany
    {
        return $this->hasMany(Message::class, 'receiver_id');
    }

    public function notifications(): HasMany
    {
        return $this->hasMany(Notification::class);
    }

    // Saved gigs
    public function savedGigs()
    {
        return $this->belongsToMany(Gig::class, 'saved_gigs')->withTimestamps();
    }


    // AUTH ROLE LOGICS --- learnt on 12/11/November/2025
    public function isStudent(): bool {
        return $this->role === 'student';
    }

    public function isProvider(): bool {
        return $this->role === 'provider';
    }

    public function isAdmin(): bool {
        return $this->role === 'admin';
    }

}
=======
    /**
     * Get the gigs posted by this user (if they are a Provider).
     */
    public function gigs(): HasMany
    {
        return $this->hasMany(Gig::class);
    }

    /**
     * Get the applications submitted by this user (if they are a Student).
     */
    public function applications(): HasMany
    {
        return $this->hasMany(Application::class);
    }
    
    // --- HELPER METHODS ---
    
    public function isStudent(): bool 
    {
        return $this->role === 'student';
    }

    public function isProvider(): bool 
    {
        return $this->role === 'provider';
    }
}
>>>>>>> NewProduction
