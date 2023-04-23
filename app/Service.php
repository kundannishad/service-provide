<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id',
        'service_name',
        'price',
        'discount_price',
        'service_image',
        'time_duration',
        'description',
    ];


    public function getServiceById($id)
    {

       $service =  Service::where('id',$id)->first();

       return $service;
    }
    
    public function getServiceByCategoryId($id)
    {

       $service =  Service::where('category_id',$id)->first();

       return $service;
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public  function saveServiceData($id,$data)
    {
        Service::where('id',$id)->update($data);
        return true;
    }

    
}
