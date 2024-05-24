<?php

namespace App\Http\Controllers;

use App\Http\Resources\TSItemSizeResource;
use App\Models\TSItemSize;
use App\Models\TSSubCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TSItemSizeController extends Controller
{
    public function index():JsonResponse{
        $rowData = TSItemSize::all();
        return $this->sendResponse(TSItemSizeResource::collection($rowData),"Category Get Successfully");
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
        $rowData = TSItemSize::create($inArr);
        return $this->sendResponse(new TSItemSizeResource($rowData),"Item Size Added Successfully");
    }

    public function show(Request $request):JsonResponse{
        $validator = Validator::make($request->all(),[
            'id' => 'required|integer',
        ]);
        if ($validator->fails()){
            return  $this->sendError('Validation Error.',$validator->errors());
        }
        $id=$request['id'];

        $rowData = TSItemSize::find($id);
        if($rowData){
            return $this->sendResponse(new TSItemSizeResource($rowData),"Item Size Get Successfully");
        }else{
            return $this->sendResponse([],"Item Size Not Found");
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
        $rowData = TSItemSize::find($request->input('id'));
        if ($rowData) {
            $rowData->update($inArr);
            return $this->sendResponse(new TSItemSizeResource($rowData), "Item Size Updated Successfully");
        }
        else {
            return $this->sendError('Item Size not found.');
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
        $rowData = TSItemSize::find($id);
        if ($rowData) {
            $rowData->delete();
            return $this->sendResponse([], "Item Size Deleted Successfully");
        } else {
            return $this->sendError("Item Size Not Found", []);
        }
    }
}
