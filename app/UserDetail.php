<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    protected $fillable = [
        'booking_id',
        'user_id',
        'category_id',
        'services_id',
        'promocode_id',
        'amount',
        'booking_date',
        'booking_time',
        'provider_id',
        'status',
    ];

    // public function getUserDetails($userId) 
    // {
    //     $user_details = UserDetail::where('user_id',$userId)->first();
    //     return $user_details;
    // }

    // public function userDetails() {
    //     return $this->belongsTo(UserDetail::class ,'user_id');
    // }
}
