<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Service;
use App\Category;

class ServiceController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:service-list|service-create|service-edit|service-delete', ['only' => ['index','show']]);
        $this->middleware('permission:service-create', ['only' => ['create','store']]);
        $this->middleware('permission:service-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:service-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $services = Service::orderBy('id','DESC')->paginate(5);
        return view('service.service_list',compact('services'))
          ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title'] = "Product Subcategory";
        $categories =Category::pluck('name', 'id');  
        return view('service.service_create',compact('data','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'service_name' => 'required|unique:services,service_name',
            'price' => 'required',
            'discount_price' => 'required',
            'time_duration' => 'required',
            'description' => 'min:20',
            "image.*" => 'required|mimes:png,jpg,jpeg,gif',
        ]);

        if($request->hasFile('image')) {

            $image = $request->file('image');
            $filename = 'service_'.time().'.'.$image->getClientOriginalExtension();
            $location = 'public/uploads/service/';
            $image->move($location, $filename);
            $image = $filename;
        }

        $data = [
                'category_id' => $request->input('category_id'),
                'service_name' => $request->input('service_name'),
                'discount_price' => $request->input('discount_price'),
                'service_image' => @$image?@$image:"",
                'time_duration' => $request->input('time_duration'),
                'description' => $request->input('description'),
            ];
    
        $service = Service::create($data);
        session()->flash('message','Service Created Successfully.');
        session()->flash('title','Success');
        session()->flash('type','success');
        return redirect('services');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = Service::find($id);
        if($service->status==1)
        {
            $service->status = 0;
        }
        else
        {
            $service->status = 1;
        }
        $service->save();
        session()->flash('message','service Updated Successfully.');
        session()->flash('title','Success');
        session()->flash('type','success');
        return redirect('services');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
   
        $service = Service::find($id);
        $categories =Category::pluck('name', 'id');  
        return view('service.service_edit',compact('service','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);
        $this->validate($request, [
            'service_name' => 'required|unique:services,service_name,'.$service->id,
            'price' => 'required',
            'discount_price' => 'required',
            'time_duration' => 'required',
            'description' => 'min:20',
            'image' => 'mimes:png,jpg,jpeg,gif',
        ]);


        if($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = 'service_'.time().'.'.$image->getClientOriginalExtension();
            $location = 'public/uploads/service/';
            $image->move($location, $filename);

            if($service->service_image) {
                $link = $location.$service->service_image;
                if (file_exists($link)){
                    unlink($link);
                }
            }
            $image = $filename;
        }

        $data = [
                'category_id' => $request->input('category_id'),
                'service_name' => $request->input('service_name'),
                'price' => $request->input('price'),
                'discount_price' => $request->input('discount_price'),
                'service_image' => isset($image)?$image:$service->service_image,
                'time_duration' => $request->input('time_duration'),
                'description' => $request->input('description'),
            ];
          
            $service = new Service();
            $service->saveServiceData($id,$data);

        session()->flash('message','Service Created Successfully.');
        session()->flash('title','Success');
        session()->flash('type','success');
        return redirect('services');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    
        $service = Service::findOrFail($id);
        $path = './assets/images/user/'.$service->service_image;
        if ($service->service_image){
            File::delete($path);
        }
        $service->delete();
        session()->flash('message','Service Deleted Successfully.');
        session()->flash('title','Success');
        session()->flash('type','success');
        return redirect('services');
    }
}
