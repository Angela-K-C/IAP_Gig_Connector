<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Application extends Model
{
    use HasFactory;
    
    // Disable timestamps as only 'applied_at' is used
    public $timestamps = false; 

    protected $fillable = [
        'job_id', 'student_id', 'status', 'applied_at', 'notes'
    ];

    /**
     * Get the job (gig) the application belongs to. (Belongs To)
     */
    public function gig(): BelongsTo
    {
        return $this->belongsTo(Gig::class, 'job_id');
    }

    /**
     * Get the student who made the application. (Belongs To)
     */
    public function student(): BelongsTo
    {
        // applications.student_id refers to student_profiles.user_id
        return $this->belongsTo(StudentProfile::class, 'student_id', 'user_id');
    }
}