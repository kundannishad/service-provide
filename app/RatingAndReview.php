<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RatingAndReview extends Model
{

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'provider_id',
        'service_id',
        'star_count',
        'message'
    ];


    public function getRatingAndReviewByProviderId($provider_id) 
    {
        $userData = RatingAndReview::where('provider_id',$provider_id)->get();
        return $userData;
    }
}
