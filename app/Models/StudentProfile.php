<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StudentProfile extends Model
{
    use HasFactory;

    // Turn off auto-incrementing since the primary key is a foreign key
    public $incrementing = false; 
    protected $primaryKey = 'user_id'; // Match migration

    // Turn off timestamps since they are handled on the User model, if preferred
    public $timestamps = false; 

    protected $fillable = [
        'user_id',
        'university',
        'year_of_study',
        'field_of_study',
        'interests',
        'availability',
        'bio',
        'cv_path',
        'phone_number',
        'location',
        'skills',
        'experiences'
    ];

    // Cast JSON field to array automatically
    protected $casts = [
        'skills' => 'array',
        'interests' => 'array',
        'experiences' => 'array'
    ];

    /**
     * Get the parent User record. (One-to-One Inverse)
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the applications made by this student. (One-to-Many)
     */
    public function applications(): HasMany
    {
        // applications.student_id refers to student_profiles.user_id
        return $this->hasMany(Application::class, 'student_id', 'user_id');
    }

    /*
        Experiences for this specific StudentProfile
    */
    public function experiences()
    {
        return $this->hasMany(UserExperience::class);
    }
}