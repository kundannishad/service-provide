<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use App\User;
use App\BasicSettings;
use Auth; 
use Hash;

class BasicSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public  function userProfile()
    {
     $user = Auth::user();
     return view('dashboard.profile',compact('user'));
    }

   /**
     * Update User Profile
     * @param Accestoken
     * @return message
     * author:Kundan Kuamr
     * Date:16/04/2021
     */

    public function updateProfile(Request $request)
    {

        $admin = User::findOrFail(Auth::user()->id);
        
        $request->validate([
            'first_name' => 'required',
            'email' => 'required|email|unique:users,email,'.$admin->id,
            'phone_no' => 'required|numeric|unique:users,phone_no,'.$admin->id,
            //'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=350,min_height=600',
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = 'user_'.time().'.'.$image->getClientOriginalExtension();
            $location = 'public/uploads/user/';
            $image->move($location, $filename);
            $image = $filename;
        }
        $data = [
                'first_name' =>$request->first_name,
                'last_name' =>$request->last_name,
                 'phone_no' =>$request->phone_no,
                'image' =>isset($image)?$image:"",
            ];

        $update = $admin->updateProfile($admin->id,$data);

        session()->flash('message','Profile Updated Successfully.');
        session()->flash('title','Success');
        session()->flash('type','success');
        return redirect()->back();
    }

    public function changePassword(Request $request)
    {
        $userId = Auth::user()->id;

        $request->validate([
            'old_password' => 'required',
            'password' => 'required|string|min:8',
            'confirm_password' => 'required|min:8|same:password',
        ]);

        $user = new User();
        $userDetails = $user->getUserById($userId);
        
        if($userDetails) {
            $singleUser = User::findOrFail($userDetails->id);
             if(Hash::check($request->old_password, $singleUser->password)){

                $singleUser->password = $request->input('password');
                $singleUser->save();
                session()->flash('message', 'Password Changes Successfully.');
                session()->flash('title','Success');
                Session::flash('type', 'success');
                return redirect()->back();
            } else {

                session()->flash('message', 'Current Password Not Match');
                Session::flash('type', 'warning');
                session()->flash('title','Opps');
                return redirect()->back();
            }

        } else{
            session()->flash('message', $e->getMessage());
            Session::flash('type', 'warning');
            session()->flash('title','Opps');
            return redirect()->back();
        }
    }


    public function cmsPageContent() 
    {
        $basicSetting =  BasicSettings::all();
        return response()->json(['error_code' =>0,'message' =>'Cms Page content retrive successfully !','data'=>$basicSetting]);
    }

    /**
     * Display a listing of the resource.
     *About Us Page Content
     * @return \Illuminate\Http\Response
     */

    public function aboutPage()
    {
        $basicSettings = BasicSettings::where('id',1)->select('id as about_id','about_title','about_image','about_description','created_at','updated_at')->first();
          return view('cms.about_list',compact('basicSettings'));      
    }

    public function editAboutPage($id)
    {

        $basicSettings = BasicSettings::where('id',$id)->select('id as about_id','about_title','about_image','about_description','created_at','updated_at')->first();
          return view('cms.about_edit',compact('basicSettings'));
    }
    public function aboutContent(Request $request,$id)
    {
        $basicSetting =  BasicSettings::where('id', $id)->first();
        $this->validate($request, [
            'about_title' => 'required',
            'about_description' => 'required',
        ]);

           $data['about_title'] = $request->about_title;
           $data['about_description'] = $request->about_description;
           if($request->hasFile('about_image')) {
    
                $image = $request->file('about_image');
                $filename = 'about'.time().'.'.$image->getClientOriginalExtension();
                $location = 'public/uploads/about/';
                $image->move($location, $filename);
    
                $path = '.public/uploads/about/';
    
                $link = $path.isset($basicSetting->about_image)?$basicSetting->about_image:" "; 
                if (file_exists($link)){
                    unlink($link);
                }
                 $data['about_image'] = $filename;
            }
           
            BasicSettings::whereId($id)->update($data);
    
            session()->flash('message','About Content Updated Successfully.');
            session()->flash('title','Success');
            session()->flash('type','success');
            return redirect('about-list');
    }


     /**
     * Display a listing of the resource.
     *Term And Conditions Page Content
     * @return \Illuminate\Http\Response
     */

    public function termAndConditionPage()
    {
        $basicSettings = BasicSettings::where('id', 1)->select('id as term_and_condition_id','term_and_condition','created_at','updated_at')->first();
          return view('cms.term_and_condition_list',compact('basicSettings'));      
    }

    public function editTermAndConditionPage($id)
    {

        $basicSettings = BasicSettings::where('id', $id)->select('id as term_and_condition_id','term_and_condition','created_at','updated_at')->first();
          return view('cms.term_and_condition_edit',compact('basicSettings'));
    }
    public function termAndConditionUpdate(Request $request,$id)
    {
        $basicSetting =  BasicSettings::where('id', $id)->first();
        $this->validate($request, [
            'term_and_condition' => 'required',
        ]);
        $data['term_and_condition'] = $request->term_and_condition;
           
        BasicSettings::whereId($id)->update($data);
    
        session()->flash('message','Term And Condition Content Updated Successfully.');
        session()->flash('title','Success');
        session()->flash('type','success');
        return redirect('term-and-condition-list');
    }



     /**
     * Display a listing of the resource.
     *Privacy And Policy Page Content
     * @return \Illuminate\Http\Response
     */

    public function privacyPolicyPage()
    {
        $basicSettings = BasicSettings::where('id', 1)->select('id as privacy_policy_id','privacy_policy','created_at','updated_at')->first();
          return view('cms.privacy_and_policy_list',compact('basicSettings'));      
    }

    public function editPrivacyPolicy($id)
    {
        $basicSettings = BasicSettings::where('id', $id)->select('id as privacy_policy_id','privacy_policy','created_at','updated_at')->first();
          return view('cms.privacy_and_policy_edit',compact('basicSettings'));
    }
    public function privacyPolicyUpdate(Request $request,$id)
    {
        $basicSetting =  BasicSettings::where('id', $id)->first();
        $this->validate($request, [
            'privacy_policy' => 'required',
        ]);
        $data['privacy_policy'] = $request->privacy_policy;
           
        BasicSettings::whereId($id)->update($data);
    
        session()->flash('message','Term And Condition Content Updated Successfully.');
        session()->flash('title','Success');
        session()->flash('type','success');
        return redirect('term-and-condition-list');
    }



     /**
     * Display a listing of the resource.
     *Privacy And Policy Page Content
     * @return \Illuminate\Http\Response
     */

    public function ourStoryPage()
    {
        $basicSettings = BasicSettings::where('id', 1)->select('id as our_story_id','our_story','created_at','updated_at')->first();
          return view('cms.our_story_list',compact('basicSettings'));      
    }

    public function editOurStory($id)
    {
        $basicSettings = BasicSettings::where('id', $id)->select('id as our_story_id','our_story','created_at','updated_at')->first();
          return view('cms.our_story_edit',compact('basicSettings'));
    }
    public function ourStoryUpdate(Request $request,$id)
    {
        $basicSetting =  BasicSettings::where('id', $id)->first();
        $this->validate($request, [
            'our_story' => 'required',
        ]);
        $data['our_story'] = $request->our_story;
           
        BasicSettings::whereId($id)->update($data);
    
        session()->flash('message','our_story Content Updated Successfully.');
        session()->flash('title','Success');
        session()->flash('type','success');
        return redirect('our-story-list');
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ourStory(Request $request)
    {
        $basicSetting =  BasicSettings::where('id', $request->our_story_id)->first();
        
        if($basicSetting) {
            $validator = Validator::make($request->all(), [
                'our_story' => 'required|min:100',
                'our_story_id' => 'required|numeric',
            ]);
    
            if($validator->fails()) {
                return response()->json($validator->errors()->toJson(), 400);
            }
    
            $data['our_story'] = $request->our_story;

            BasicSettings::whereId($request->our_story_id)->update($data);
            $BasicSettings = BasicSettings::where('id', $request->our_story_id)->select('id as our_story_id','our_story','created_at','updated_at')->first();
    
            return response()->json(['error_code' =>0,'message' =>'Our Story content updated successfully !','data'=>$BasicSettings]);
 
        } else {

            return response()->json(['error_code' =>1,'message' =>' There are not avalible content for this id !','data'=>array()],401);
        }
    }

    public function settings()
    {
        $basicSettings = BasicSettings::where('id', 1)->select('id','mail_driver','mail_host','mail_port','mail_encryption','mail_username','mail_password','mail_from_name','mail_from_address')->first();
          return view('cms.settings_edit',compact('basicSettings'));
    }

    public function settingsUpdate(Request $request,$id)
    {
        $basicSetting =  BasicSettings::where('id', $id)->first();

        $data['mail_driver'] = $request->mail_driver;
        $data['mail_host'] = $request->mail_host;
        $data['mail_port'] = $request->mail_port;
        $data['mail_encryption'] = $request->mail_encryption;
        $data['mail_username'] = $request->mail_username;
        $data['mail_password'] = $request->mail_password;
        $data['mail_from_name'] = $request->mail_from_name;
        $data['mail_from_address'] = $request->mail_from_address;
           
        BasicSettings::whereId($id)->update($data);
    
        session()->flash('message','Settings Updated Successfully.');
        session()->flash('title','Success');
        session()->flash('type','success');
        return redirect('setings-edit');
    }
    
}
