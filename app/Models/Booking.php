<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'room_id',
        'coupon_id',
        'check_in',
        'check_out',
        'price',
        'status'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function room() {
        return $this->belongsTo(Room::class, 'room_id');
    }

    public function coupon() {
        return $this->belongsTo(Coupon::class, 'coupon_id');
    }
}