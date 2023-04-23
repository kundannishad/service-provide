<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookingRequest extends Model
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

    public function getBookingByProviderId($provider_id) 
    {
        $bookingData = BookingRequest::where('provider_id',$provider_id)->whereIn('status', [0,1, 2, 3])->get();
        return $bookingData;
    }

    public function saveBookingStatusByProviderId($providerId,$bookingId,$data)
    {
        BookingRequest::where('provider_id', $providerId)->where('id',$bookingId)->update($data); 
        return $bookingId;
    }

    public function getBookingById($booking_id) 
    {
        $bookingData = BookingRequest::where('id',$booking_id)->first();
        return $bookingData;
    }

    public function getBookingCompletedByProviderId($providerId)
    {
       $bookings = BookingRequest::where('provider_id', $providerId)->where('status','4')->get(); 
        return $bookings;
    }
    
}
