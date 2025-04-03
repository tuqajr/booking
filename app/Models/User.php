<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory;
    use SoftDeletes;
    use HasApiTokens;
    use Notifiable;

    /** @use HasFactory<\Database\Factories\UserFactory> */
    // use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name', 'email', 'password', 'role', 'image'
    ];

    public function setRoleAttribute($value) {
        $allowedRoles = ['user', 'admin'];
        $this->attributes['role'] = in_array($value, $allowedRoles) ? $value : 'user';
    }

    /**
     * The attributes that should be hidden for serialization.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Get the user's wishlist.
     */
    public function wishlist() {
        return $this->hasOne(Wishlist::class);
    }

    /**
     * Get the user's reviews.
     */
    public function reviews() {
        return $this->hasMany(Review::class);
    }

    /**
     * Get the user's bookings.
     */
    public function bookings() {
        return $this->hasMany(Booking::class);
    }

    /**
     * Get the URL to the user's profile photo.
     *
     * @return string
     */
    public function getProfilePhotoUrlAttribute() {
        return $this->image ? asset('storage/' . $this->image) : asset('images/default-profile.png');
    }
}