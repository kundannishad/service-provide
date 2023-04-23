<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware' => ['auth']], function() {
    Route::get('dashboard',['as'=>'dashboard','uses'=>'DashboardController@index']);
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('services', ServiceController::class);
    Route::get('edit-profile', 'BasicSettingController@userProfile');
    Route::post('edit-profile',['as'=>'update-profile','uses'=>'BasicSettingController@updateProfile']);
    Route::post('change-password', ['as'=>'change-password', 'uses'=>'BasicSettingController@changePassword']);
    
    Route::get('providers',['as'=>'providers','uses'=>'ProviderController@getProviders']); //Service Proiders
    Route::get('booking-complete',['as'=>'booking-complete','uses'=>'ProviderController@getBookings']); //Service Proiders
    Route::get('booking-complete-users',['as'=>'booking-complete-users','uses'=>'ProviderController@bookingcompleteusers']); //Service Proiders
    Route::get('on-the-way',['as'=>'on-the-way','uses'=>'ProviderController@ontheway']); //Service Proiders
    Route::get('cancel-service',['as'=>'cancel-service','uses'=>'ProviderController@cancelservice']); //Service Proiders
    Route::get('companies',['as'=>'companies','uses'=>'ProviderController@getCompanies']); //Service Proiders
    Route::get('service-provider-company',['as'=>'service-provider-company','uses'=>'ProviderController@serviceprovidercompany']); //Service Proiders

    Route::get('booking-complete-company',['as'=>'booking-complete-company','uses'=>'ProviderController@getBookingscompany']); //Service Proiders
    Route::get('on-the-way-company',['as'=>'on-the-way-company','uses'=>'ProviderController@onthewaycompany']); //Service Proiders
    Route::get('cancel-service-company',['as'=>'cancel-service-company','uses'=>'ProviderController@cancelservicecompany']);


    Route::get('get_users',['as'=>'get_users','uses'=>'ProviderController@getUsers']); //Service Proiders


    Route::get('about-list',['as'=>'about-list','uses'=>'BasicSettingController@aboutPage']);// About Page
    Route::get('about-edit/{id}',['as'=>'about-edit','uses'=>'BasicSettingController@editAboutPage']);// About Page
    Route::put('about-edit/{id}',['as'=>'about-update','uses'=>'BasicSettingController@aboutContent']);// About Page

    Route::get('term-and-condition-list',['as'=>'term-and-condition-list','uses'=>'BasicSettingController@termAndConditionPage']); // Term And Conditions
    Route::get('term-and-condition-edit/{id}',['as'=>'term-and-condition-edit','uses'=>'BasicSettingController@editTermAndConditionPage']); // Term And Conditions
    Route::put('term-and-condition-edit/{id}',['as'=>'term-and-condition-update','uses'=>'BasicSettingController@termAndConditionUpdate']);// Term And Conditions

    Route::get('privacy-policy-list',['as'=>'privacy-policy-list','uses'=>'BasicSettingController@privacyPolicyPage']); // Privacy And Policy
    Route::get('privacy-policy-edit/{id}',['as'=>'policy-edit','uses'=>'BasicSettingController@editPrivacyPolicy']); // Privacy And Policy
    Route::put('privacy-policy-edit/{id}',['as'=>'policy-update','uses'=>'BasicSettingController@privacyPolicyUpdate']);// Privacy And Policy


    Route::get('our-story-list',['as'=>'our-story-list','uses'=>'BasicSettingController@ourStoryPage']); // Our Story
    Route::get('our-story-edit/{id}',['as'=>'our-story-edit','uses'=>'BasicSettingController@editOurStory']); // Our Story
    Route::put('our-story-edit/{id}',['as'=>'our-story-update','uses'=>'BasicSettingController@ourStoryUpdate']);// Our Story


    Route::get('setings-edit',['as'=>'setings_edit','uses'=>'BasicSettingController@settings']); //Settings
    Route::put('setings-edit/{id}',['as'=>'setings-update','uses'=>'BasicSettingController@settingsUpdate']);//Settings
});