<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Import the Authenticatable class
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory,Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];


    // Define the relationship to the Comment model
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // Other methods or properties can go here
}
