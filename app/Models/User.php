<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable 
{
    use HasFactory;

    protected $fillable = [
         'pin', 'user_role', 'is_active'
    ];

    /**
     * Get the user profile associated with the user.
     */
    public function profile()
    {
        return $this->hasOne(UserProfile::class, 'user_id');
    }

    /**
     * Get the transaction history for the user.
     */
    public function transactions()
    {
        return $this->hasMany(TransactionHistory::class, 'user_id');
    }
}
