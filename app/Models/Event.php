<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
	protected $fillable = ['title', 'vendor_id', 'description', 'short_description', 'start_date', 'end_date', 'venue_id', 'category_id', 'artist_id', 'event_status', 'featured', 'meta_title', 'meta_description', 'age_limit', 'terms_conditions', 'refund_policy', 'total_tickets', 'min_tickets_per_order', 'max_tickets_per_order', 'ticket_price', 'contact_email', 'contact_phone', 'banner'];
    
	public function vendor() { return $this->belongsTo(Vendor::class); }
	public function venue() { return $this->belongsTo(Venue::class); }
	public function category() { return $this->belongsTo(Category::class); }
	public function artist() { return $this->belongsTo(Artist::class); }

}
