<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyProviders extends Model
{
    protected $fillable = [
        'user_id',
        'company_id',
        'booking_id',
    ];


    public function assignServiceProvider($input) 
    {
        $userData = CompanyProviders::create($input);
        return $userData->id;
    }
}
