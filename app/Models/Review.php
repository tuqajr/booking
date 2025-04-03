<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;
    //
    protected $fillable = [
        'user_id',
        'hotel_id',
        'review',
        'rating',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function hotel() {
        return $this->belongsTo(Hotel::class, 'hotel_id');
    }
}