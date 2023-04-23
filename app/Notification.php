<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'message',
        'deep_link',
        'is_read',
        'description',
    ];


    public function getNotificationByUserId($user_id)
    {
       $notifications =  Notification::where('user_id',$user_id)->get();
       return $notifications;
    }
}
