<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceProvider extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'category_id',
        'service_id',
    ];

    public function addServiceProvider($data)
    {
       $serviceProvider =  ServiceProvider::create($data);
        return $serviceProvider->id;
    }

    public function getServiceProviderByid($id)
    {
       $serviceProvider =  ServiceProvider::where('id',$id)->first();
        return $serviceProvider;
    }

    public function updateServiceByProviderId($userId,$data)
    {
        ServiceProvider::where('id', $userId)->update($data); 
        return $userId;
    }

    public function getServiceProviderByUserId($userId)
    {
       $serviceProvider =  ServiceProvider::where('user_id',$userId)->first();
        return $serviceProvider;
    }

    public function updateServiceByProviderUserID($userId,$data)
    {
        ServiceProvider::where('user_id', $userId)->update($data); 
        return $userId;
    }

    

    
}
