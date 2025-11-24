<?php

namespace App\Models;

<<<<<<< HEAD
=======
use Illuminate\Database\Eloquent\Factories\HasFactory;
>>>>>>> NewProduction
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
<<<<<<< HEAD
    //
}
=======
    use HasFactory;

    protected $fillable = [
        'sender_id', 
        'receiver_id', 
        'message_content', 
        'is_read',
    ];
    
    protected $casts = [
        'is_read' => 'boolean',
    ];

    /**
     * Get the user who sent the message.
     */
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    /**
     * Get the user who received the message.
     */
    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }
}
>>>>>>> NewProduction
