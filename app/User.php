<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

use DB;
 
class User extends Authenticatable implements JWTSubject
{
   use Notifiable,HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'role_id',
        'email',
        'phone_no',
        'otp',
        'image',
        'api_token',
        'country_code',
        'status',
        'password',
        'country_code',
        'user_type',
        'company_id',
        'experience',
        
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($password)
    {
       if ( !empty($password) ) {
           $this->attributes['password'] = bcrypt($password);
       }
    }


    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }


    public function signupUser($input) 
    {
        $userData = User::create($input);
        return $userData->id;
    }

    public function getUserById($id) 
    {
        $userData = User::findOrFail($id);
        return $userData;
    }

    public function updateOtpOnmobile($phone_no,$otp) 
    {
        User::where('phone_no', $phone_no)->update(array('otp' =>$otp));
        return true;
    }

    public function updateProfile($userId,$data)
    {
        User::where('id', $userId)->update($data); 
        return true;
    }

    public function userAddress() {
        return $this->hasOne(UserDetail::class ,'user_id');
    }

    public function addServiceProvider($input) 
    {
        $userData = User::create($input);
        return $userData->id;
    }

   
}
