<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
	protected $fillable = ['event_id', 'attendee_id', 'qr_code', 'ticket_type', 'status'];
	public function event() { return $this->belongsTo(Event::class); }
	public function attendee() { return $this->belongsTo(User::class); }

}
