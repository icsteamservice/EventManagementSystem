<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addon extends Model
{
    use HasFactory;
	protected $fillable = ['event_id', 'name', 'price', 'stock', 'image'];
	public function event() { return $this->belongsTo(Event::class); }

}
