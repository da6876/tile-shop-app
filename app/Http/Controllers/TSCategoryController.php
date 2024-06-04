<?php

namespace App\Http\Controllers;

use App\Http\Resources\TSCategoryResource;
use App\Http\Resources\TSItemSizeResource;
use App\Models\TSCategory;
use App\Models\TSItemSize;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class TSCategoryController extends Controller
{
    public function index():JsonResponse{
        $rowData = TSCategory::where('status', '1')->get();
        if ($rowData->count() > 0) {
            return $this->sendResponse(TSCategoryResource::collection($rowData),"Category Get Successfully");
        }else{
            return $this->sendError("Category Not Found", []);
        }
    }

    public function store(Request $request):JsonResponse{
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'status' => 'required|integer',
        ]);
        if ($validator->fails()){
            return  $this->sendError('Validation Error.',$validator->errors());
        }
        $userId = auth()->user()->id;
        $inArr= [
            'name'=>$request['name'],
            'status'=>$request['status'],
            'create_by' => $userId,
            'create_date' => $this->getCurrentDateTime(),
        ];
        $rowData = TSCategory::create($inArr);
        return $this->sendResponse(new TSCategoryResource($rowData),"Category Added Successfully");
    }

    public function show(Request $request):JsonResponse{
        $validator = Validator::make($request->all(),[
            'id' => 'required|integer',
        ]);
        if ($validator->fails()){
            return  $this->sendError('Validation Error.',$validator->errors());
        }
        $id=$request['id'];

        $rowData = TSCategory::find($id);
        if($rowData){
            return $this->sendResponse(new TSCategoryResource($rowData),"Category Get Successfully");
        }else{
            return $this->sendResponse([],"Category Not Found");
        }
    }

    public function update(Request $request):JsonResponse{
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer',
            'name' => 'required',
            'status' => 'required|integer',
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $userId = auth()->user()->id;
        $inArr = [
            'name' => $request->input('name'),
            'status' => $request->input('status'),
            'update_by' => $userId,
            'update_date' => $this->getCurrentDateTime(),
        ];
        $rowData = TSCategory::find($request->input('id'));
        if ($rowData) {
            $rowData->update($inArr);
            return $this->sendResponse(new TSCategoryResource($rowData), "Category Updated Successfully");
        }
        else {
            return $this->sendError('Category not found.');
        }
    }

    public function delete(Request $request): JsonResponse {
        $input = $request->all();
        $validator = Validator::make($input, [
            'id' => 'required|integer',
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $id = $input['id'];
        $userId = auth()->user()->id;
        $inArr = [
            'status' => '3',
            'update_by' => $userId,
            'update_date' => $this->getCurrentDateTime(),
        ];
        $rowData = TSCategory::where('id', $id)->whereNotIn('status', ['3'])->first();
        if ($rowData) {
            $rowData->update($inArr);
            // $rowData->delete();
            return $this->sendResponse([], "Category Deleted Successfully");
        } else {
            return $this->sendError("Category Not Found", []);
        }
    }

}
