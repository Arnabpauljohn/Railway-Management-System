<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'bookings';

    // Mass-assignable attributes
    protected $fillable = [
        'user_id',
        'train_no',
        'from_city',
        'to_city',
        'departure_time',
        'arrival_time',
        'ticket_price',
        'payment_status',
    ];

    // Relationship with User model (one-to-many)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
