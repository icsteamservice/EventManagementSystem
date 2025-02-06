<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    use HasFactory;

    protected $table = 'venues'; // Ensuring correct table name

    protected $fillable = [
        'name', 
        'venue_type', 
        'description', 
        'address', 
        'city', 
        'state', 
        'country', 
        'postal_code', 
        'capacity', 
        'phone', 
        'email', 
        'active_status'
    ];
}
