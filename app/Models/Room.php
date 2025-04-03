<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
    use HasFactory;
    //
    protected $fillable = [
        'hotel_id',
        'room_type',
        'capacity',
        'price',
        'description',
    ];

    public function setRoomTypeAttribute($value) {
        $allowedTypes = ['Single room', 'Double room', 'Twin room', 'Suite'];
        $this->attributes['room_type'] = in_array($value, $allowedTypes) ? $value : 'Single room';
    }

    public function hotel() {
        return $this->belongsTo(Hotel::class);
    }

    public function bookings() {
        return $this->hasMany(Booking::class);
    }
}
