<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'location', 'rating', 'description'];

    public function users() {
        return $this->belongsToMany(User::class, 'wishlists');
    }
}