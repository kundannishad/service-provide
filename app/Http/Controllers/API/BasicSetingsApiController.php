<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\BasicSettings;
use App\Http\Controllers\Controller;

class BasicSetingsApiController extends Controller
{
   

    public function cmsPageContent() 
    {
        $basicSetting =  BasicSettings::all();
        return response()->json(['error_code' =>0,'message' =>'Cms Page content retrive successfully !','data'=>$basicSetting]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function aboutContent(Request $request)
    {
        $basicSettings = BasicSettings::select('id as about_id','about_title','about_image','about_description','created_at','updated_at')->first();
        return response()->json(['error_code' =>0,'message' =>'About content retrive successfully !','data'=>$basicSettings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function termAndCondition(Request $request)
    {
        $BasicSettings = BasicSettings::select('id as term_and_condition_id','term_and_condition','created_at','updated_at')->first();
        return response()->json(['error_code' =>0,'message' =>'Term And Condition content retrive successfully !','data'=>$BasicSettings]);
 
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function privacyPolicy(Request $request)
    {
        $data['privacy_policy'] = $request->privacy_policy;
        $basicSettings = BasicSettings::select('id as privacy_policy_id','privacy_policy','created_at','updated_at')->first();
        return response()->json(['error_code' =>0,'message' =>'Privacy And Policy content retrive successfully !','data'=>$basicSettings]);  
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ourStory(Request $request)
    {
        $basicSettings = BasicSettings::select('id as our_story_id','our_story','created_at','updated_at')->first();
    
        return response()->json(['error_code' =>0,'message' =>'Our Story content retrive successfully !','data'=>$basicSettings]);
    }
}
