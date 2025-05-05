<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Train extends Model
{
    // 
    use HasFactory;
    protected $fillable = [
        'train_no','name', 'route', 'departure_time', 'arrival_time', 
        'date', 'from_city', 'to_city', 'prize','available seat','status'
    ];
    
}
