<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;
	protected $fillable = ['name', 'genre', 'bio', 'contact_email', 'contact_phone', 'website', 'facebook', 'twitter', 'instagram', 'youtube', 'profile_image'];

}
