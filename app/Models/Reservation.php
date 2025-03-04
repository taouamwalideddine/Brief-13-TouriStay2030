<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    // Fields that can be mass-assigned
    protected $fillable = [
        'listing_id',
        'user_id',
        'check_in',
        'check_out',
        'total_price',
        'status',
    ];

    // Relationship: A reservation belongs to a listing
    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }

    // Relationship: A reservation belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
