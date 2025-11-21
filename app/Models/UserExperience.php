<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserExperience extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_profile_id',
        'title',
        'company',
        'start_date',
        'end_date',
        'description',
    ];

    public function studentProfile()
    {
        return $this->belongsTo(StudentProfile::class);
    }
}
