<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'gig_id', 
        'user_id', 
        'status', 
        'notes',
    ];

    /**
     * Get the Gig this application is for.
     */
    public function gig()
    {
        return $this->belongsTo(Gig::class);
    }

    /**
     * Get the Student (User) who submitted the application.
     */
    public function student()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}