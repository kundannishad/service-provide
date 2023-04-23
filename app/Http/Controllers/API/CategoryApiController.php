<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Category;
use App\Service;


class CategoryApiController extends Controller
{

    public $successResponse = 200;
    public $createdResponse = 201;
    public $unauthorized = 401;
    public $badRequest = 400;

    public function getCategories()
    {
        $categories=Category::all();

        return response()->json(['error_code' =>0,'message' => 'Category retrived successfully!','data'=>$categories],$this->successResponse);
    }

    public function getServices()
    {
        $categories=Service::all();
        return response()->json(['error_code' =>0,'message' => 'Category retrived successfully!','data'=>$categories],$this->successResponse);
    }

    public function getServiceByCategoryId(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category_id' =>    'required|numeric'
        ]);
        if ($validator->fails()) {
            $errorString = implode(",",$validator->messages()->all());
            return response()->json(['error_code' =>1,"message" => $errorString], 401);
        }
        $service = new Service();
        $serviceDetails = $service->getServiceByCategoryId($request->category_id);
        return response()->json(['error_code' =>0,'message' => 'Service retrived successfully!','data'=>$serviceDetails],$this->successResponse); 
    }
    
    
}
