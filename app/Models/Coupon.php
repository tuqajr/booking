<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Coupon extends Model
{
    use HasFactory;
    //
    protected $fillable = [
        'code',
        'discount',
        'expiry_date',
        'status',
        "created_at"
    ];

    public function getCreatedAtAttribute($value) {

    return \Carbon\Carbon::parse($value)->format('Y-m-d'); 

    }


    public function bookings() {
        return $this->hasMany(Booking::class);
    }
}