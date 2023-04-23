<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['cors']], function() {
    Route::post('login', 'API\Providers\UserApiController@login')->name('login')->middleware('api');//Updated 
    Route::post('register', 'API\Providers\UserApiController@register')->name('register');
    Route::post('otp_verify', 'API\Providers\UserApiController@otpVerify')->name('otp_verify');
    Route::post('resend_otp', 'API\Providers\UserApiController@resendOtp')->name('resend_otp');
    Route::post('forgot_password', 'API\Providers\UserApiController@forgotPassword')->name('forgot_password');
});

Route::group(['middleware' => ['api','cors']], function ($router) {

    Route::group(['middleware' => ['jwt.verify']], function ($router) {  
         Route::post('me', 'API\Providers\UserApiController@me');
         Route::post('reset_password', 'API\Providers\UserApiController@changeUserPassword');
         Route::post('update_profile', 'API\Providers\UserApiController@profileUpdate');
         Route::post('logout', 'API\Providers\UserApiController@logout');
         Route::post('refresh', 'API\Providers\UserApiController@refresh');
         Route::get('categories', 'API\CategoryApiController@getCategories');
         Route::get('services', 'API\CategoryApiController@getServices');
         Route::get('get_service_by_category_id', 'API\CategoryApiController@getServiceByCategoryId');

         Route::post('service_providers', 'API\Providers\UserApiController@serviceProviders');  //Services
         Route::post('update_service', 'API\Providers\UserApiController@serviceUpdateByProviderId');  //Edit Services
         Route::get('my_dashboard', 'API\Providers\UserApiController@myDashboard');  //Services
         Route::post('booking_details', 'API\Providers\UserApiController@bookingDetailByProviderId');  //Services
         Route::post('change_booking_status', 'API\Providers\UserApiController@UpdateBookingStatusByProviderId');  //Services
         Route::get('booking_complete', 'API\Providers\UserApiController@bookingCompletedByProviderId');  //Services
         Route::get('provider_rating_review', 'API\Providers\UserApiController@providerRatingAndReview');  //Services
         Route::post('submit_quote_request', 'API\Providers\UserApiController@submitQuoteRequest');  //Services
         Route::post('revised_service', 'API\Providers\UserApiController@revisedService');  //Services

         ##########################  Company Module ############################################
         Route::post('add_service_provider_by_company_id', 'API\Providers\UserApiController@AddServiceProviderByCompanyId');  //Add Service Provider
         Route::post('get_company_service_provider', 'API\Providers\UserApiController@getCompanyServiceProviderById');
         Route::post('update_service_provider_by_company_id', 'API\Providers\UserApiController@updateServiceProviderByCompanyID');
         Route::post('delete_service_providers', 'API\Providers\UserApiController@deleteServiceProvider');
         Route::get('get_service_providers_by_company_id', 'API\Providers\UserApiController@getServiceProvidersByCompanyId');
         Route::post('assign_booking_to_service_provider', 'API\Providers\UserApiController@assignBookingToServiceProvider');
         ##########################  Company Module ############################################
         
         Route::get('cms_page','API\BasicSetingsApiController@cmsPageContent');//CMS
         Route::get('about_us','API\BasicSetingsApiController@aboutContent');//CMS
         Route::get('terms_and_condition','API\BasicSetingsApiController@termAndCondition');//CMS
         Route::get('privacy_policy','API\BasicSetingsApiController@privacyPolicy');//CMS
         Route::get('our_story','API\BasicSetingsApiController@ourStory');//CMS

         Route::get('notifications', 'API\Providers\UserApiController@getNotifications'); 
      });
});


