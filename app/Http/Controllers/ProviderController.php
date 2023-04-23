<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Service;
use App\CompanyProviders;
use App\Category;
use App\BookingRequest;


class ProviderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getProviders(Request $request)
    {
        //$users = User::where('user_type','1')->paginate(10);
        $users = User::select('*')->where(['user_type'=>1])->paginate(10);
        return view('providers.providers_list',compact('users'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    // public function getBookings(Request $request)
    // {
    //     //$users = User::where('user_type','1')->paginate(10);
    //     $users = User::select('*')->where(['user_type'=>1])->paginate(10);
    //     return view('providers.booking_list',compact('users'))
    //         ->with('i', ($request->input('page', 1) - 1) * 10);
    // }


    public function getBookings(Request $request)
    {
        $bookings = BookingRequest::select('*')->where(['status'=>4])->paginate(10);
        foreach ($bookings as $row)
        {
           $users = User::select('*')->where(['id'=>$row->user_id])->first();
           $service = Service::select('*')->where(['id'=>$row->services_id])->first();
           $category = Category::select('*')->where(['id'=>$row->category_id])->first();
           $provider = User::select('*')->where(['id'=>$row->provider_id])->first();
           $row->name=$category->name;
           $row->service_name=$service->service_name;
           $row->first_name=$users->first_name;
           $row->provider_name=$provider->first_name;
        }

        return view('providers.booking_list',compact('bookings'))
        ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    public function ontheway(Request $request)
    {
        $bookings = BookingRequest::select('*')->where(['status'=>2])->paginate(10);
        foreach ($bookings as $row)
        {
           $users = User::select('*')->where(['id'=>$row->user_id])->first();
           $service = Service::select('*')->where(['id'=>$row->services_id])->first();
           $category = Category::select('*')->where(['id'=>$row->category_id])->first();
           $provider = User::select('*')->where(['id'=>$row->provider_id])->first();
           $row->name=$category->name;
           $row->service_name=$service->service_name;
           $row->first_name=$users->first_name;
           $row->provider_name=$provider->first_name;
        }

        return view('providers.on_the_way',compact('bookings'))
        ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    public function cancelservice(Request $request)
    {
        $bookings = BookingRequest::select('*')->where(['status'=>5])->paginate(10);
        foreach ($bookings as $row)
        {
           $users = User::select('*')->where(['id'=>$row->user_id])->first();
           $service = Service::select('*')->where(['id'=>$row->services_id])->first();
           $category = Category::select('*')->where(['id'=>$row->category_id])->first();
           $provider = User::select('*')->where(['id'=>$row->provider_id])->first();
           $row->name=$category->name;
           $row->service_name=$service->service_name;
           $row->first_name=$users->first_name;
           $row->provider_name=$provider->first_name;
        }

        return view('providers.cancel_service',compact('bookings'))
        ->with('i', ($request->input('page', 1) - 1) * 10);
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCompanies(Request $request)
    {
        $users = User::where('user_type','2')->paginate(10);
        return view('providers.company_list',compact('users'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }


    public function serviceprovidercompany(Request $request)
    {
        $companys = CompanyProviders::paginate(10);
        foreach ($companys as $crow)
        {
            $bookings = BookingRequest::select('*')->where(['id'=>$crow->booking_id])->paginate(10);

            foreach ($bookings as $row)
            {
               $users = User::select('*')->where(['id'=>$row->user_id])->first();
               $service = Service::select('*')->where(['id'=>$row->services_id])->first();
               $category = Category::select('*')->where(['id'=>$row->category_id])->first();
               $provider = User::select('*')->where(['id'=>$row->provider_id])->first();
               $row->name=$category->name;
               $row->service_name=$service->service_name;
               $row->first_name=$users->first_name;
               $row->provider_name=$provider->first_name;
            }
        }

        return view('providers.service_provider_company',compact('bookings'))
        ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    public function getBookingscompany(Request $request)
    {
        $bookings = BookingRequest::select('*')->where(['status'=>4])->paginate(10);
        foreach ($bookings as $row)
        {
           $users = User::select('*')->where(['id'=>$row->user_id])->first();
           $service = Service::select('*')->where(['id'=>$row->services_id])->first();
           $category = Category::select('*')->where(['id'=>$row->category_id])->first();
           $provider = User::select('*')->where(['id'=>$row->provider_id])->first();
           $row->name=$category->name;
           $row->service_name=$service->service_name;
           $row->first_name=$users->first_name;
           $row->provider_name=$provider->first_name;
        }

        return view('providers.booking_list_company',compact('bookings'))
        ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    public function onthewaycompany(Request $request)
    {
        $bookings = BookingRequest::select('*')->where(['status'=>2])->paginate(10);
        foreach ($bookings as $row)
        {
           $users = User::select('*')->where(['id'=>$row->user_id])->first();
           $service = Service::select('*')->where(['id'=>$row->services_id])->first();
           $category = Category::select('*')->where(['id'=>$row->category_id])->first();
           $provider = User::select('*')->where(['id'=>$row->provider_id])->first();
           $row->name=$category->name;
           $row->service_name=$service->service_name;
           $row->first_name=$users->first_name;
           $row->provider_name=$provider->first_name;
        }

        return view('providers.on_the_way_company',compact('bookings'))
        ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    public function cancelservicecompany(Request $request)
    {
        $bookings = BookingRequest::select('*')->where(['status'=>5])->paginate(10);
        foreach ($bookings as $row)
        {
           $users = User::select('*')->where(['id'=>$row->user_id])->first();
           $service = Service::select('*')->where(['id'=>$row->services_id])->first();
           $category = Category::select('*')->where(['id'=>$row->category_id])->first();
           $provider = User::select('*')->where(['id'=>$row->provider_id])->first();
           $row->name=$category->name;
           $row->service_name=$service->service_name;
           $row->first_name=$users->first_name;
           $row->provider_name=$provider->first_name;
        }

        return view('providers.cancel_service_company',compact('bookings'))
        ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    public function bookingcompleteusers(Request $request)
    {
        $bookings = BookingRequest::select('*')->where(['status'=>4])->paginate(10);
        foreach ($bookings as $row)
        {
           $users = User::select('*')->where(['id'=>$row->user_id])->first();
           $service = Service::select('*')->where(['id'=>$row->services_id])->first();
           $category = Category::select('*')->where(['id'=>$row->category_id])->first();
           $provider = User::select('*')->where(['id'=>$row->provider_id])->first();
           $row->name=$category->name;
           $row->service_name=$service->service_name;
           $row->first_name=$users->first_name;
           $row->provider_name=$provider->first_name;
        }

        return view('providers.booking_list_users',compact('bookings'))
        ->with('i', ($request->input('page', 1) - 1) * 10);
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getUsers(Request $request)
    {
        $users = User::where('user_type','0')->paginate(10);
        return view('providers.users_list',compact('users'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }
}
