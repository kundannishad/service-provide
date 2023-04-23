<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Category;
use DB;

class CategoryController extends Controller
{


    function __construct()
    {
        $this->middleware('permission:category-list|category-create|category-edit|category-delete', ['only' => ['index','show']]);
        $this->middleware('permission:category-create', ['only' => ['create','store']]);
        $this->middleware('permission:category-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:category-delete', ['only' => ['destroy']]);

       
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::orderBy('id','DESC')->paginate(5);
          return view('category.category_list',compact('categories'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title'] = "category Subcategory";
        return view('category.category_create',compact('data'));
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
            'name' => 'required|unique:categories,name',
            "image.*" => 'required|mimes:png,jpg,jpeg,gif',
        ]);
        if($request->hasFile('image')) {

            $image = $request->file('image');
            $filename = 'category_'.time().'.'.$image->getClientOriginalExtension();
            $location = 'public/public/uploads/category/';
            $image->move($location, $filename);
            $image = $filename;
        }
        $category = Category::create(['name' => $request->input('name'),'icon_image'=>$image]);
        session()->flash('message','Category Created Successfully.');
        session()->flash('title','Success');
        session()->flash('type','success');
        return redirect('categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        if($category->status==1)
        {
            $category->status = 0;
        }
        else
        {
            $category->status = 1;
        }
        $category->save();
        session()->flash('message','category Updated Successfully.');
        session()->flash('title','Success');
        session()->flash('type','success');
        return redirect('categories');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $catgory = new Category();
        $category = $catgory->getCategoryById($id);
        return view('category.category_edit',compact('category'));
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
        $this->validate($request, [
            'name' => 'required|unique:categories,name,'.$id,
        ]);
        $category = Category::find($id);
        if($request->hasFile('image')) {

            $image = $request->file('image');
            $filename = 'category_'.time().'.'.$image->getClientOriginalExtension();
            $location = 'public/public/uploads/category/';
            $image->move($location, $filename);
            $image = $filename;
            $category->icon_image = $image;
        }
    
        
        $category->name = $request->input('name');
        $category->save();
        session()->flash('message','category Updated Successfully.');
        session()->flash('title','Success');
        session()->flash('type','success');
        return redirect('categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("categories")->where('id',$id)->delete();
        session()->flash('message','Category Deleted Successfully.');
        session()->flash('title','Success');
        session()->flash('type','success');
        return redirect('categories');
    }
}
