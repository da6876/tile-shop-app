<?php

namespace App\Http\Controllers;

use App\Http\Resources\TSItemTypeResource;
use App\Models\TSItemType;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TSItemTypeController extends Controller
{
    public function index():JsonResponse{
        $rowData = TSItemType::where('status', '1')->get();
        if ($rowData->count() > 0) {
            return $this->sendResponse(TSItemTypeResource::collection($rowData),"Item Type Get Successfully");
        }
        else {
            return $this->sendError('Item Type not found.');
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
        $rowData = TSItemType::create($inArr);
        return $this->sendResponse(new TSItemTypeResource($rowData),"Item Type Added Successfully");
    }

    public function show(Request $request):JsonResponse{
        $validator = Validator::make($request->all(),[
            'id' => 'required|integer',
        ]);
        if ($validator->fails()){
            return  $this->sendError('Validation Error.',$validator->errors());
        }
        $id=$request['id'];

        $rowData = TSItemType::find($id);
        if($rowData){
            return $this->sendResponse(new TSItemTypeResource($rowData),"Item Type Get Successfully");
        }else{
            return $this->sendResponse([],"Item Type Not Found");
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
        $rowData = TSItemType::find($request->input('id'));
        if ($rowData) {
            $rowData->update($inArr);
            return $this->sendResponse(new TSItemTypeResource($rowData), "Item Type Updated Successfully");
        }
        else {
            return $this->sendError('Item Type not found.');
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
        $rowData = TSItemType::where('id', $id)->whereNotIn('status', ['3'])->first();
        if ($rowData) {
            $rowData->update($inArr);
            // $rowData->delete();
            return $this->sendResponse([], "Item Type Deleted Successfully");
        } else {
            return $this->sendError("Item Type Not Found", []);
        }
    }
}
