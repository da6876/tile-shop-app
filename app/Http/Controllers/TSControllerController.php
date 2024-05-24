<?php

namespace App\Http\Controllers;

use App\Http\Resources\TSCategoryResource;
use App\Models\TSCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class TSControllerController extends Controller
{
    public function index():JsonResponse{
        $category = TSCategory::all();
        return $this->sendResponse(TSCategoryResource::collection($category),"Category Get Successfully");
    }

    public function store(Request $request):JsonResponse{
        $input = $request->all();
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'status' => 'required',
            'create_by' => 'required',
            'create_date' => 'required',
        ]);
        if ($validator->fails()){
            return  $this->sendError('Validation Error.',$validator->errors());
        }

        $category = TSCategory::create($input);
        return $this->sendResponse(new TSCategoryResource($category),"Category Created Successfully");
    }

    public function show($tSCategoryId):JsonResponse{
        $category = TSCategory::find($tSCategoryId);
        return $this->sendResponse(new TSCategoryResource($category),"Category Get Successfully");
    }

    public function update(Request $request, TSCategory $tSCategory):JsonResponse{
        $input = $request->all();
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'status' => 'required',
            'create_by' => 'required',
            'create_date' => 'required',
        ]);
        if ($validator->fails()){
            return  $this->sendError('Validation Error.',$validator->errors());
        }
        $tSCategory->name=$input['name'];
        $tSCategory->create_by=$input['create_by'];
        $tSCategory->create_date=$input['create_date'];
        $tSCategory->save();
        return $this->sendResponse(new TSCategoryResource($tSCategory),"Category Updated Successfully");
    }

    public function destroy(TSCategory $tSCategory):JsonResponse{
        $tSCategory->delete();
        return $this->sendResponse([],"Category Delete Successfully");
    }
}
