<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;
	protected $fillable = ['user_id', 'company_name', 'email', 'phone', 'address', 'city', 'state', 'country', 'postal_code', 'website', 'description', 'logo', 'status'];
	public function user() { return $this->belongsTo(User::class); }

}
