<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Milon\Barcode\Facades\DNS1DFacde as DNS1D;


class UserProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'personal_id', 'first_name', 'last_name', 'barcode',
        'qrcode', 'point', 'check_box', 'date_of_birth', 'bio',
        'profile_picture', 'phone_number', 'address'
    ];
    protected static function booted() {
        static::creating(function($userProfile){
            $userProfile -> barcode = strtoupper (uniqid('USER_'));
        });
    }
    /**
     * Get the user that owns the profile.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

