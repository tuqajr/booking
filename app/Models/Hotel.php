<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hotel extends Model
{
    use HasFactory;

    public function rooms() {
        return $this->hasMany(Room::class);
    }

    public function reviews() {
        return $this->hasMany(Review::class);
    }

    public function bookings() {
        return $this->hasManyThrough(Booking::class, Room::class);
    }
    public function region()
    {
        return $this->belongsTo(Region::class);
    }
    
    public function images()
    {
        return $this->hasMany(HotelImage::class);
    }

    public function amenities()
    {
        return $this->belongsToMany(Amenity::class);
    }
    public function scopeByRegion($query, $regionId)
   {
       return $query->where('region_id', $regionId);
   }
   
   // Filter scope by stars
   public function scopeByStars($query, $stars)
   {
       return $query->where('stars', $stars);
   }
   
}
