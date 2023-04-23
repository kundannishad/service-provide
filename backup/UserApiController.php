<?php
/**
 * File name: UserAPIController.php
 * Last modified: 22:04:2021
 * Author: Kundan Kumar -https://adsnurl.com/
 * Copyright (c) 2021
 *
 */

namespace App\Http\Controllers\API\Providers;

use JWTAuth;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\ServiceProvider;
use App\Notification;
use App\RatingAndReview;
use App\BookingRequest;
use App\UserDetail;
use App\Service;
use App\CompanyProviders;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;
use App\Traits\CommonTrait;
use Validator;
use Hash;
use DB;

class UserApiController extends Controller
{

	use CommonTrait;

    public $successResponse = 200;
    public $createdResponse = 201;
    public $unauthorized = 401;
    public $badRequest = 400;

    /**
     * Login User.
     *function name:login
     * @return \Illuminate\Http\JsonResponse
    */
   
    public function login(Request $request)
    {
        $credentials =[];
        if($request->email) {
            $credentials = ['email'=>$request->email,'password'=>$request->password];
        } 
        if($request->phone_no) {
            $credentials = ['phone_no'=>$request->phone_no,'password'=>$request->password];
        }

        if (! $token = auth('api')->attempt($credentials)) {
           return response()->json(['error_code' =>1,'message' => 'Invalid credentials!'],$this->unauthorized);
        }
       $userDetails = auth('api')->user();

       $access_token = $this->respondWithToken($token)->original['access_token'];
       if($userDetails->image) {
            
        $location = 'public/uploads/user/';
        $image_path = $location.$userDetails->image;
        $userDetails->image_url= url($image_path);
       } else {

        $userDetails->image_url = null;
       }
      
        if($userDetails->user_type == 1) {
        $userDetails->login_as = "Service Providers";
        } else if($userDetails->user_type == "2") {
            $userDetails->login_as = "Company";
        } else {
            $userDetails->login_as = "User";
        }
        $userDetails->access_token = $access_token;
        header("access_token:$access_token");

       return response()->json(['error_code' =>0,'message' => 'User retrived successfully!','data'=>$userDetails],$this->successResponse);
    }

   /**
     * Signup User.
     *function name:register
     * @return \Illuminate\Http\JsonResponse
    */

    public function register(Request $request) 
    { 
        $user = new User();

        $validator = Validator::make($request->all(), [
            'first_name' => 'required|between:2,100', 
            'phone_no' => 'required|numeric|min:10|unique:users', 
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:8', 
            'confirm_password' => 'required|min:8|same:password', 
        ]);

        if ($validator->fails()) { 
            $errorString = implode(",",$validator->messages()->all());
            return response()->json(['error_code' =>1,"message" => $errorString], $this->unauthorized);            
        }

        $data = array();
        $randomid = mt_rand(1000,9999); 

        $data = [
            "first_name"=>$request->first_name,
            "last_name"=>$request->last_name,
            "email"=>$request->email,
            "phone_no"=>$request->phone_no,
            "password"=>$request->password,
            "otp"=>$randomid,
            "country_code"=>$request->country_code,
            "user_type"=>$request->user_type,
            "status"=>1,
            "api_token"=>str_random(128),
        ];
       
        $this->sendSmsOnMobile($randomid,$request->phone_no);
        
        $userId = $user->signupUser($data);

        $userData = $user->getUserById($userId);

        if($userData) {
		 	$token = auth('api')->login($userData);
       		$access_token = $this->respondWithToken($token)->original['access_token'];
        	$userData->access_token = $access_token;
        }

        return response()->json(['error_code' =>0,'message' => 'User signup successfully!','data'=>$userData],$this->createdResponse);
    }

    /**
     * Send Otp On Mobile.
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function otpVerify(Request $request) 
    {
        $token=$request->header('Authorization');
        $userDetails = User::where('api_token',$token)->first();

        if(empty($userDetails)) {
            return response()->json(['error_code' =>1,'message' => 'Invalid  Token'],$this->unauthorized);
        } else {

            $validator = Validator::make($request->all(), [
                'otp' => 'required|numeric',
            ]);
    
            if($validator->fails()) {
                $errorString = implode(",",$validator->messages()->all());
                return response()->json(['error_code' =>1,"message" => $errorString], $this->unauthorized);
            }
            $user = User::select('phone_no','otp')->where('otp',$request->otp)->where('phone_no',$userDetails->phone_no)->first();
    
            if($user) {
                return response()->json(['error_code' =>0,'message' => 'Otp matched  successfully !','data'=>$user],$this->successResponse);
            } else {
                return response()->json(['error_code' =>1,'message' => 'Invalid otp!'] ,$this->unauthorized);
    
            }
        }

    }

    /**
     * ReSend Otp On Mobile.
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function resendOtp(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'phone_no' => 'required|numeric'
        ]);

        if($validator->fails()) {
            $errorString = implode(",",$validator->messages()->all());
            return response()->json(['error_code' =>1,"message" => $errorString], $this->unauthorized);
        }

        $userDetails = User::where('phone_no',$request->phone_no)->first();
        if($userDetails) {
            $randomid = mt_rand(1000,9999); 
            $user = new User();
            $user->updateOtpOnmobile($request->phone_no,$randomid);
            $this->sendSmsOnMobile($randomid,$request->phone_no);

            $user = User::select('phone_no','otp','api_token')->where('phone_no',$userDetails->phone_no)->first();
            return response()->json(['error_code' =>0,'message' => 'Otp Send your mobile no !','data'=>$user],$this->successResponse);
        } else {
            return response()->json(['error_code' =>1,'message' => 'Invalid Mobile No !'],$this->badRequest);

        }
    }
 
   /**
    * Get the authenticated User.
    *
    * @return \Illuminate\Http\JsonResponse
    */
   public function me()
   {

    $userDetails = auth('api')->user();

    //dd($userDetails);
    //PlaceRating::where('place_id',$id)->selectRaw('SUM(rating)/COUNT(user_id) AS avg_rating')->first()->avg_rating;
    $rating_review = RatingAndReview::where('provider_id',$userDetails->id)->selectRaw('SUM(star_count)/COUNT(provider_id) AS avg_rating')->first()->avg_rating;

    $userDetails->rating_review = isset($rating_review)?$rating_review:"0";

    if(isset($userDetails->image)) {
        
        $location = 'public/uploads/user/';
        $image_path = $location.$userDetails->image;
        $userDetails->image_url= url($image_path);
    } else {
        $userDetails->image_url= null;
    }

       return response()->json(['error_code' =>0,'message' => 'User retrived successfully!','data'=>$userDetails],$this->successResponse);
   }
 
   /**
    * Log the user out (Invalidate the token).
    *
    * @return \Illuminate\Http\JsonResponse
    */
   public function logout()
   {
       auth('api')->logout();
 
       return response()->json(['error_code' =>0,'message' => 'Successfully logged out'],$this->successResponse);
   }
 
   /**
    * Refresh a token.
    *
    * @return \Illuminate\Http\JsonResponse
    */
   public function refresh()
   {
       return $this->respondWithToken(auth('api')->refresh());
   }
 
   /**
    * Get the token array structure.
    *
    * @param  string $token
    *
    * @return \Illuminate\Http\JsonResponse
    */
   protected function respondWithToken($token)
   {
       return response()->json([
           'access_token' => $token,
           'token_type' => 'bearer',
           'expires_in' => auth('api')->factory()->getTTL() * 60
          // 'expires_in' => auth()->factory()->getTTL() * 60
       ]);
   }

   /**
     * Forgot User Password
     * @param Accestoken
     * @return message
     * author:Kundan Kuamr
     * Date:28/04/2021
     */
    protected function forgotPassword(Request $request)
    {
        if($request->phone_no) {
            $validator = Validator::make($request->all(), [
                'phone_no' => 'required|numeric'
            ]);
    
            if($validator->fails()) {
                $errorString = implode(",",$validator->messages()->all());
                return response()->json(['error_code' =>1,"message" => $errorString], $this->unauthorized);
            }
            $checkMobile = User::select('otp','phone_no','email','api_token')->where('phone_no',$request->phone_no)->first();
            if($checkMobile) {
                $randomid = mt_rand(1000,9999); 
                $user = new User();
                $user->updateOtpOnmobile($request->phone_no,$randomid);
                $this->sendSmsOnMobile($randomid,$request->phone_no);
                $userDetails = User::select('otp','phone_no','email','api_token')->where('phone_no',$request->phone_no)->first();
              return response()->json(['error_code' =>0,'message' => 'Otp Send your mobile no !','data'=>$userDetails],$this->createdResponse);
            } else {
                return response()->json(['error_code' =>1,'message' => 'Invalid Mobile No !'],$this->badRequest);
    
            }
        } else {

            $validator = Validator::make($request->all(), [
                'email' => 'required|email'
            ]);
    
            if($validator->fails()) {
                $errorString = implode(",",$validator->messages()->all());
                return response()->json(['error_code' =>1,"message" => $errorString], $this->unauthorized);
            }
            $userDetails = User::select('otp','phone_no','first_name','email','api_token')->where('email',$request->email)->first();
            if($userDetails) {
                $randomid = mt_rand(1000,9999); 
                $user = new User();
                $user->updateOtpOnmobile($userDetails->phone_no,$randomid);

                $this->sendMail($userDetails->email,$userDetails->first_name,$randomid,$subject="Your Otp");
    
            return response()->json(['error_code' =>0,'message' => 'Otp Send your mobile no !','data'=>$userDetails],$this->createdResponse);
            } else {
                return response()->json(['error_code' =>1,'message' => 'Invalid Email  !'],$this->badRequest);
    
            }
        }
    }
     


   /**
     * Change User Password
     * @param Accestoken
     * @return message
     * author:Kundan Kuamr
     * Date:16/04/2021
     */
    public function changeUserPassword(Request $request) 
    {
        $userId = Auth::user()->id;
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'password' => 'required|string|min:8',
            'confirm_password' => 'required|min:8|same:password',
        ]);

        if ($validator->fails()) {
            $errorString = implode(",",$validator->messages()->all());
            return response()->json(['error_code' =>1,"message" => $errorString], $this->badRequest); 
        }
          
        $user = new User();
        $userDetails = $user->getUserById($userId);
        
        if($userDetails) {
            $singleUser = User::findOrFail($userDetails->id);
             if(Hash::check($request->old_password, $singleUser->password)){

                $singleUser->password = $request->input('password');
                $singleUser->save();
                $response = array('error_code' =>0, 'message' => 'Password Changes Successfully. !');
                return response()->json($response);
            } else {

                $response = array('error_code' =>1, 'message' => 'Old password Does not match !');
                return response()->json($response,$this->badRequest);
            }

        } else{
                $response = array('error_code' =>1, 'message' => 'User Does not match !');
                 return response()->json($response,$this->badRequest);
        }
    }


     /**
     * Update User Profile
     * @param Accestoken
     * @return message
     * author:Kundan Kuamr
     * Date:16/04/2021
     */

    public function profileUpdate(Request $request)
    {
        $userId = Auth::user()->id;

        $validator = Validator::make($request->all(), [
            'image' => 'mimes:png,jpeg,jpg,gif',
            'phone_no' => 'numeric|min:10|unique:users,phone_no,'.$userId,
            'email' =>    'min:10|email|unique:users,email,'.$userId,
        ]);
        if ($validator->fails()) {
            $errorString = implode(",",$validator->messages()->all());
            return response()->json(['error_code' =>1,"message" => $errorString], $this->unauthorized);
        }
       
        $user = new User();
        $userDetails = $user->getUserById($userId);
        
        if($userDetails) {
	    
            if(!empty($request->first_name)) {
                $first_name  = $request->first_name;
            } else {
                $first_name  = $userDetails->first_name;
            }

            if(!empty($request->last_name)) {
                $last_name  = $request->last_name;
            } else {
                $last_name  = $userDetails->last_name;
            }
        
            if(!empty($request->phone_no)) {
                 $phone_no  = $request->phone_no;
            } else {
                 $phone_no  = $userDetails->phone_no;
            }

            if(!empty($request->email)) {
                 $email  = $request->email;
            } else {
                 $email  = $userDetails->email;
            }

            if($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = 'user_'.time().'.'.$image->getClientOriginalExtension();
                $location = 'public/uploads/user/';
                $image->move($location, $filename);
                $image = $filename;
            }
            $data = [
                    'email' =>$email,
                    'first_name' =>$first_name,
                    'last_name' =>$last_name,
                     'phone_no' =>$phone_no,
                    'image' =>isset($image)?$image:"",
                ];

            $update = $user->updateProfile($userId,$data);

            if($update) {
                $userDetails = $user->getUserById($userId);
                $location = 'public/uploads/user/';
                $image_path = $location.$userDetails->image;
                $userDetails->image_url= url($image_path);
                $response = array('error_code' =>0, 'message' => 'Profile update successfully !','data'=>$userDetails);
                 return response()->json($response);  
            } else {
                 $response = array('error_code' =>1, 'message' => 'Profile update successfully !','data'=>0);
              return response()->json($response);     
            }   
	    }  else {

            $response = array('error_code' =>1, 'message' => 'User Does not exist!');
            return response()->json($response,$this->unauthorized);
        }
    }
     /**
     * Update User Profile
     * @param Accestoken
     * @return message
     * author:Kundan Kuamr
     * Date:30/04/2021
     */
    public function getNotifications(){
        $userId = Auth::user()->id;

        $notificatoion = new Notification();

        $notifications = $notificatoion->getNotificationByUserId($userId);

        $response = array('error_code' =>0, 'message' => 'Notification retrived successfully !','data'=>$notifications);
        return response()->json($response,$this->successResponse);  
    }


     /**
     * Update User Profile
     * @param Accestoken
     * @return message
     * author:Kundan Kuamr
     * Date:30/04/2021
     */
    public function serviceProviders(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' =>    'required|numeric',
            'service_id' =>    'required|numeric'
        ]);
        if ($validator->fails()) {
            $errorString = implode(",",$validator->messages()->all());
            return response()->json(['error_code' =>1,"message" => $errorString], $this->unauthorized);
        }

        $userId = Auth::user()->id;
        $data = [
            "user_id"=>$userId,
            "category_id"=>$request->category_id,
            "service_id"=>$request->service_id,
        ];

        $provider = new ServiceProvider();

        $addServiceProvider = $provider->addServiceProvider($data);

        if($addServiceProvider) {
           $serviceProviders =  $provider->getServiceProviderByid($addServiceProvider);
        } else {
            $response = array('error_code' =>1, 'message' => 'Service  Provider Not Added !','data'=>$serviceProviders);
            return response()->json($response,$this->successResponse);  
        }

        $response = array('error_code' =>0, 'message' => 'Service  Provider Added successfully !','data'=>$serviceProviders);
        return response()->json($response,$this->successResponse);  
    }


     /**
     * Update User Profile
     * @param Accestoken
     * @return message
     * author:Kundan Kuamr
     * Date:30/04/2021
     */
    public function serviceUpdateByProviderId(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' =>    'required|numeric',
            'service_id' =>    'required|numeric'
        ]);
        if ($validator->fails()) {
            $errorString = implode(",",$validator->messages()->all());
            return response()->json(['error_code' =>1,"message" => $errorString], $this->unauthorized);
        }

        $userId = Auth::user()->id;
        $data = [
            "user_id"=>$userId,
            "category_id"=>$request->category_id,
            "service_id"=>$request->service_id,
        ];

        $provider = new ServiceProvider();

        $updateServiceByProviderId = $provider->updateServiceByProviderId($userId,$data);

        if($updateServiceByProviderId) {
           $serviceProviders =  $provider->getServiceProviderByid($updateServiceByProviderId);
        } else {
            $response = array('error_code' =>1, 'message' => 'Service  Provider Not Save !','data'=>$serviceProviders);
            return response()->json($response,$this->successResponse);  
        }

        $response = array('error_code' =>0, 'message' => 'Service  Provider Save successfully !','data'=>$serviceProviders);
        return response()->json($response,$this->successResponse);  
    }
    
     /**
     * Update User Profile
     * @param Accestoken
     * @return message
     * author:Kundan Kuamr
     * Date:30/04/2021
     */
    public function myDashboard(Request $request)
    {

        $user= Auth::user();

        if ($user) {

            if($user->user_type == 1) {  //Service Provider
                $userId = $user->id;
                $booking = new BookingRequest();
                $UserDetails = new UserDetail();
                $bookings =  $booking->getBookingByProviderId($userId);
                foreach($bookings as $booking) {
                    
                    $singleUser = User::where('id',$booking->user_id)->with('userAddress')->first();

                    if($singleUser->image) {
                        $location = 'public/uploads/user/';
                        $image_path = $location.$singleUser->image;
                         $singleUser->image_url= url($image_path);
                    } else {
                        $singleUser->image_url= null;
                    }   
                    $booking->user_details = $singleUser;
                    $booking->service_detail = Service::where('id',$booking->services_id)->with('category')->first();
                }
                
                $dashBoard['service_completed'] =BookingRequest::where('provider_id',$userId)->where('status','4')->count();
                $dashBoard['earniings'] =0;
                if($request->duty ==1) {
                    $dashBoard['bookings'] =$bookings;
                } else {
                    $dashBoard['bookings'] = null;
                }
                
                $response = array('error_code' =>0, 'message' => 'Booking retrived successfully !','data'=>$dashBoard);
                return response()->json($response,$this->successResponse);  
            } else if($user->user_type == 2) {  //company
                $userId = $user->id;
                $booking = new BookingRequest();
                $UserDetails = new UserDetail();
                $bookings =  $booking->getBookingByProviderId($userId);

                foreach($bookings as $booking) {
                    $singleUser = User::where('id',$booking->user_id)->with('userAddress')->first();

                    if($singleUser->image) {
                        $location = 'public/uploads/user/';
                        $image_path = $location.$singleUser->image;
                         $singleUser->image_url= url($image_path);
                    } else {
                        $singleUser->image_url= null;
                    }   
                    $booking->user_details = $singleUser;
                    $booking->service_detail = Service::where('id',$booking->services_id)->with('category')->first();
                }
                $dashBoard = array('earniings'=>0,'service_completed'=>0);

                $dashBoard['earniings'] =0;
                $dashBoard['service_completed'] =BookingRequest::where('provider_id',$userId)->where('status','4')->count();
                $dashBoard['total_service_providers'] =User::where('company_id',$userId)->count();
                $dashBoard['bookings'] =$bookings;
                $response = array('error_code' =>0, 'message' => 'Booking retrived successfully !','data'=>$dashBoard);
                return response()->json($response,$this->successResponse);
            }
        
        } else {

             $response = array('error_code' =>1, 'message' => 'user Does not exist !');
             return response()->json($response,$this->badRequest);
        }

        

        
    }


    /**
     * Update User Profile
     * @param Accestoken
     * @return message
     * author:Kundan Kuamr
     * Date:30/04/2021
     */
    public function bookingDetailByProviderId(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'booking_id' =>    'required|numeric'
        ]);

        if ($validator->fails()) {
            $errorString = implode(",",$validator->messages()->all());
            return response()->json(['error_code' =>1,"message" => $errorString], $this->unauthorized);
        }

        $booking = new BookingRequest();
        $UserDetails = new UserDetail();
        $userId = Auth::user()->id;
        $bookingId = $request->booking_id;
        $bookingDetails =  $booking->getBookingById($bookingId);

        $bookingDetails->user_details = User::where('id',$bookingDetails->user_id)->with('userAddress')->first();
        $bookingDetails->service_detail = Service::where('id',$bookingDetails->services_id)->with('category')->first();

        $response = array('error_code' =>0, 'message' => 'Booking retrived successfully !','data'=>$bookingDetails);
        return response()->json($response,$this->successResponse);  
    }


     /**
     * Provider Booking Update Status
     * @param Accestoken
     * @return message
     * author:Kundan Kuamr
     * Date:04/05/2021
     */
    public function UpdateBookingStatusByProviderId(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'status' =>    'required|numeric',
            'booking_id' =>    'required|numeric',
        ]);
        if ($validator->fails()) {
            $errorString = implode(",",$validator->messages()->all());
            return response()->json(['error_code' =>1,"message" => $errorString], $this->unauthorized);
        }

        $providerId = Auth::user()->id;
        $bookingId = $request->booking_id;
        $data = [
            "status"=>$request->status,
        ];

        $bookingStatus = new BookingRequest();

        $bookingId= $bookingStatus->saveBookingStatusByProviderId($providerId,$bookingId,$data);

        if($bookingId) {
           $booking =  $bookingStatus->getBookingById($bookingId);
        } else {
            $response = array('error_code' =>1, 'message' => 'Booking Status Not update Yet !','data'=>$booking);
            return response()->json($response,$this->unauthorized);  
        }

        $response = array('error_code' =>0, 'message' => 'Booking Status  update successfully !','data'=>$booking);
        return response()->json($response,$this->successResponse);  
    }


    /**
     * Update User Profile
     * @param Accestoken
     * @return message
     * author:Kundan Kuamr
     * Date:30/04/2021
     */
    public function bookingCompletedByProviderId(Request $request)
    {
        $booking = new BookingRequest();
        $UserDetails = new UserDetail();
        $providerId = Auth::user()->id;
        $bookings =  $booking->getBookingCompletedByProviderId($providerId);
        foreach($bookings as $booking) {
            $booking->user_details = User::where('id',$booking->user_id)->with('userAddress')->first();
            $booking->service_detail = Service::where('id',$booking->services_id)->with('category')->first();
        }
        $response = array('error_code' =>0, 'message' => 'Completd Booking retrived successfully !','data'=>$bookings);
        return response()->json($response,$this->successResponse);  
    }

    /**
     * Update User Profile
     * @param Accestoken
     * @return message
     * author:Kundan Kuamr
     * Date:30/04/2021
     */
    public function providerRatingAndReview(Request $request)
    {
        $provider_id = Auth::user()->id;

        $rating = new RatingAndReview();
        $user = new User();

        $ratingAndReviews = $rating->getRatingAndReviewByProviderId($provider_id);

        foreach($ratingAndReviews as $key=>$val) {
            $val->user_detail = $user->getUserById($val->user_id);
        }
        $response = array('error_code' =>0, 'message' => 'Rating And Review retrived successfully !','data'=>$ratingAndReviews);
        return response()->json($response,$this->successResponse);  
    }

    

    ############################################## Manage Service Provider ######################################################
    /**
     * Add Service Provider
     * @param Accestoken
     * @return message
     * author:Kundan Kuamr
     * Date:10/05/2021
     */

    public function AddServiceProvider(Request $request) 
    { 
        $user = new User();

        $validator = Validator::make($request->all(), [
            'category_id' => 'required|numeric', 
            'service_id' => 'required|numeric', 
            'first_name' => 'required|between:2,100', 
            'phone_no' => 'required|numeric|min:10|unique:users', 
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|string|min:8', 
            'confirm_password' => 'required|min:8|same:password', 
        ]);

        if ($validator->fails()) { 
            $errorString = implode(",",$validator->messages()->all());
            return response()->json(['error_code' =>1,"message" => $errorString], $this->unauthorized);            
        }
        $company_id = Auth::user()->id;
       // $data = array();
      //  $randomid = mt_rand(1000,9999); 
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = 'user_'.time().'.'.$image->getClientOriginalExtension();
            $location = 'public/uploads/user/';
            $image->move($location, $filename);
            $image = $filename;
        }

        $data = [
            "first_name"=>$request->first_name,
            "last_name"=>$request->last_name,
            "email"=>$request->email,
            "phone_no"=>$request->phone_no,
            "password"=>$request->password,
            "country_code"=>$request->country_code,
            "experience"=>$request->experience,
            "company_id"=>$company_id,
            "image"=>isset($image)?$image:"",
            "status"=>'1',
            "user_type"=>'1',
            "api_token"=>str_random(128),
        ];

        
       // $this->sendSmsOnMobile($randomid,$request->phone_no);
        
        $userId = $user->addServiceProvider($data);

        $data = [
            "user_id"=>$userId,
            "category_id"=>$request->category_id,
            "service_id"=>$request->service_id,
        ];

        $provider = new ServiceProvider();

        $addServiceProvider = $provider->addServiceProvider($data);

        $userData = $user->getUserById($userId);
        if($userData) {
		 	$token = auth('api')->login($userData);
       		$access_token = $this->respondWithToken($token)->original['access_token'];
        	$userData->access_token = $access_token;
        }

        return response()->json(['error_code' =>0,'message' => 'User signup successfully!','data'=>$userData],$this->createdResponse);
    }
       
    /**
     * Get Service Provider
     * @param Accestoken
     * @return message
     * author:Kundan Kuamr
     * Date:10/05/2021
     */
    public function getCompanyServiceProviderById(Request $request)
    {
        $userDetails = auth('api')->user();
        $rating_review = RatingAndReview::where('provider_id',$userDetails->id)->selectRaw('SUM(star_count)/COUNT(provider_id) AS avg_rating')->first()->avg_rating;

        $provider = new ServiceProvider();
        $serviceProviders =  $provider->getServiceProviderByUserId($userDetails->id);
        $userDetails->service_detail = Service::where('id',$serviceProviders->service_id)->with('category')->first();

        $userDetails->rating_review = isset($rating_review)?$rating_review:"0";
        

        if(isset($userDetails->image)) {
            
            $location = 'public/uploads/user/';
            $image_path = $location.$userDetails->image;
            $userDetails->image_url= url($image_path);
        } else {
            $userDetails->image_url= null;
        }

       return response()->json(['error_code' =>0,'message' => 'User retrived successfully!','data'=>$userDetails],$this->successResponse);  
    }


    /**
     * Update Company Service provider
     * @param Accestoken
     * @return message
     * author:Kundan Kuamr
     * Date:16/04/2021
     */

    public function updateCompanyServiceProvider(Request $request)
    {
        $userId = Auth::user()->id;

        $validator = Validator::make($request->all(), [
            'image' => 'mimes:png,jpeg,jpg,gif',
            'phone_no' => 'numeric|min:10|unique:users,phone_no,'.$userId,
            'email' =>    'min:10|email|unique:users,email,'.$userId,
        ]);
        if ($validator->fails()) {
            $errorString = implode(",",$validator->messages()->all());
            return response()->json(['error_code' =>1,"message" => $errorString], $this->unauthorized);
        }
       
        $user = new User();
        $userDetails = $user->getUserById($userId);
        
        if($userDetails) {
	    
            if(!empty($request->first_name)) {
                $first_name  = $request->first_name;
            } else {
                $first_name  = $userDetails->first_name;
            }

            if(!empty($request->last_name)) {
                $last_name  = $request->last_name;
            } else {
                $last_name  = $userDetails->last_name;
            }
        
            if(!empty($request->phone_no)) {
                 $phone_no  = $request->phone_no;
            } else {
                 $phone_no  = $userDetails->phone_no;
            }

            if(!empty($request->email)) {
                 $email  = $request->email;
            } else {
                 $email  = $userDetails->email;
            }

            if(!empty($request->experience)) {
                 $experience  = $request->experience;
            } else {
                 $experience  = $userDetails->experience;
            }

            if(!empty($request->country_code)) {
                 $country_code  = $request->country_code;
            } else {
                 $country_code  = $userDetails->country_code;
            }

            if($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = 'user_'.time().'.'.$image->getClientOriginalExtension();
                $location = 'public/uploads/user/';
                $image->move($location, $filename);
                $image = $filename;
            }
            $data = [
                    'first_name' =>$first_name,
                    'last_name' =>$last_name,
                    'phone_no' =>$phone_no,
                    'email' =>$email,
                    'experience' =>$experience,
                    'country_code' =>$country_code,
                    'image' =>isset($image)?$image:"",
                ];
            $update = $user->updateProfile($userId,$data);

           

            $serviData = [
                "user_id"=>$userId,
                "category_id"=>$request->category_id,
                "service_id"=>$request->service_id,
            ];

            
    
            $provider = new ServiceProvider();
    
            $updateServiceByProviderId = $provider->updateServiceByProviderUserID($userId,$serviData);

            if($update) {
               
                $serviceProviders =  $provider->getServiceProviderByUserId($userDetails->id);
                $userDetails->service_detail = Service::where('id',$serviceProviders->service_id)->with('category')->first();

                $location = 'public/uploads/user/';
                $image_path = $location.$userDetails->image;
                $userDetails->image_url= url($image_path);

                $response = array('error_code' =>0, 'message' => 'Profile update successfully !','data'=>$userDetails);
                 return response()->json($response);  
            } else {
                 $response = array('error_code' =>1, 'message' => 'Profile update successfully !','data'=>0);
              return response()->json($response);     
            }   
	    }  else {

            $response = array('error_code' =>1, 'message' => 'User Does not exist!');
            return response()->json($response,$this->unauthorized);
        }
    }

   /**
     * Delete Service Providers
     * @param Accestoken
     * @return message
     * author:Kundan Kuamr
     * Date:16/04/2021
     */
    public function deleteServiceProvider(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|numeric'
        ]);
        if ($validator->fails()) {
            $errorString = implode(",",$validator->messages()->all());
            return response()->json(['error_code' =>1,"message" => $errorString], $this->unauthorized);
        }
        $companyId = Auth::user()->id;
        $userId = $request->user_id;

        User::where('company_id',$companyId)->where('id',$userId)->delete();
        ServiceProvider::where('user_id',$userId)->delete();
        CompanyProviders::where('user_id',$userId)->delete();
        $response = array('error_code' =>1, 'message' => 'Service Provider Deleted !');
        return response()->json($response,$this->unauthorized);
    }

     /**
     * Get Service Provider By company id
     * @param Accestoken
     * @return message
     * author:Kundan Kuamr
     * Date:16/04/2021
     */
   
    public function getCompanyServiceProviders(Request $request)
    {
        $provider = new ServiceProvider();
        $companyId = Auth::user()->id;
        $userId = $request->user_id;

       $serviceProviders =  User::where('company_id',$companyId)->get();
       
       foreach($serviceProviders as $key=>$serviceProvider) {

        $service = ServiceProvider::where('user_id',$serviceProvider->id)->first();
        $serviceProvider->service_detail = Service::where('id',$service->service_id)->with('category')->first();

        $rating_review = RatingAndReview::where('provider_id',$serviceProvider->id)->selectRaw('SUM(star_count)/COUNT(provider_id) AS avg_rating')->first()->avg_rating;
        $serviceProvider->rating_review = isset($rating_review)?$rating_review:"0";

            if(isset($serviceProvider->image)) {
                
                $location = 'public/uploads/user/';
                $image_path = $location.$serviceProvider->image;
                $serviceProvider->image_url= url($image_path);
            } else {
                $serviceProvider->image_url= null;
            }

       }
       return response()->json(['error_code' =>0,'message' => 'Service provider retrived successfully!','data'=>$serviceProviders],$this->successResponse);  
    }

    /**
     * Get Service Provider By company id
     * @param Accestoken
     * @return message
     * author:Kundan Kuamr
     * Date:16/04/2021
     */
    public function assignBookingToServiceProvider(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|numeric|unique:company_providers', 
            'booking_id' => 'required', 
        ]);

        if ($validator->fails()) {
            $errorString = implode(",",$validator->messages()->all());
            return response()->json(['error_code' =>1,"message" => $errorString], $this->unauthorized);
        }
        $companyId = Auth::user()->id;
        $companyProvider = new CompanyProviders();
            $data = [
                "user_id" =>$request->user_id,
                "booking_id" =>$request->booking_id,
                "company_id" =>$companyId,
            ];
             $assignServiceProvider =  $companyProvider->assignServiceProvider($data);

             $serviceProviderData = CompanyProviders::where('id',$assignServiceProvider)->first();

            if($serviceProviderData) {
                return response()->json(['error_code' =>0,'message' => 'Service provider assign successfully!','data'=>$serviceProviderData],$this->createdResponse);  
            } else {

               return response()->json(['error_code' =>0,'message' => 'Something went wrong','data'=>$serviceProviderData],$this->unauthorized);  
            }
    }
    ############################################## Manage Service Provider ######################################################


    /**
     * Get Service Provider By company id
     * @param Accestoken
     * @return message
     * author:Kundan Kuamr
     * Date:16/04/2021
     */
    public function submitQuoteRequest(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'amount' => 'required', 
            'booking_id' => 'required', 
        ]);

        if ($validator->fails()) {
            $errorString = implode(",",$validator->messages()->all());
            return response()->json(['error_code' =>1,"message" => $errorString], $this->unauthorized);
        }
            $companyId = Auth::user()->id;

            $data = ["amount" =>$request->amount];
            
            BookingRequest::where('provider_id',$companyId)->where('booking_id',$request->booking_id)->update($data);

            $bookingRequest =  BookingRequest::where('provider_id',$companyId)->where('booking_id',$request->booking_id)->first();

            return response()->json(['error_code' =>0,'message' => 'Submit Quote successfully','data'=>$bookingRequest],$this->createdResponse);
    }


    /**
     * Get Service Provider By company id
     * @param Accestoken
     * @return message
     * author:Kundan Kuamr
     * Date:16/04/2021
     */
    public function revisedService(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|numeric|unique:company_providers', 
            'booking_id' => 'required', 
        ]);

        if ($validator->fails()) {
            $errorString = implode(",",$validator->messages()->all());
            return response()->json(['error_code' =>1,"message" => $errorString], $this->unauthorized);
        }
        $companyId = Auth::user()->id;
        $companyProvider = new CompanyProviders();
            $data = [
                "user_id" =>$request->user_id,
                "booking_id" =>$request->booking_id,
                "company_id" =>$companyId,
            ];
             $assignServiceProvider =  $companyProvider->assignServiceProvider($data);

             $serviceProviderData = CompanyProviders::where('id',$assignServiceProvider)->first();

            if($serviceProviderData) {
                return response()->json(['error_code' =>0,'message' => 'Service provider assign successfully!','data'=>$serviceProviderData],$this->createdResponse);  
            } else {

               return response()->json(['error_code' =>0,'message' => 'Something went wrong','data'=>$serviceProviderData],$this->unauthorized);  
            }
    }

   
}
