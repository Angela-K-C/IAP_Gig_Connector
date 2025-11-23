<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    use HasFactory;
    
    // Explicitly define the table name as it's not the default 'students'
    protected $table = 'student_profiles'; 

    // Define user_id as the primary key and disable auto-incrementing
    protected $primaryKey = 'user_id'; 
    public $incrementing = false;      

    protected $fillable = [
        'user_id', 'university', 'year_of_study', 'field_of_study', 
        'skills', 'interests', 'experience', 'bio', 'cv_path',
        'availability_remote', 'availability_physical', 'preferred_hours',
        'profile_completion'
    ];

    protected $casts = [
        'skills' => 'array',              // Automatically handles JSON storage
        'availability_remote' => 'boolean',
        'availability_physical' => 'boolean',
    ];

    /**
     * Get the User that owns the student profile.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}