<?php

namespace App\Http\Controllers;

use App\Http\Resources\TSItemResource;
use App\Http\Resources\TSItemSizeResource;
use App\Models\TSItem;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TSItemController extends Controller
{
    public function index():JsonResponse{
        $rowData = TSItem::where('status', '1')->get();
        if ($rowData->count() > 0) {
            return $this->sendResponse(TSItemResource::collection($rowData),"Item Get Successfully");
        }else{
            return $this->sendError("Item Not Found", []);
        }
    }

    public function store(Request $request):JsonResponse{
        $validator = Validator::make($request->all(),[
            'type_id' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'size_id' => 'required',
            'name' => 'required',
            'details' => 'required',
            'item_code' => 'required',
            'grade' => 'required',
            'status' => 'required|integer',
        ]);
        if ($validator->fails()){
            return  $this->sendError('Validation Error.',$validator->errors());
        }
        $userId = auth()->user()->id;
        $inArr= [
            'type_id'=>$request['type_id'],
            'category_id'=>$request['category_id'],
            'subcategory_id'=>$request['subcategory_id'],
            'size_id'=>$request['size_id'],
            'name'=>$request['name'],
            'details'=>$request['details'],
            'item_code'=>$request['item_code'],
            'grade'=>$request['grade'],
            'status'=>$request['status'],
            'create_by' => $userId,
            'create_date' => $this->getCurrentDateTime(),
        ];
        $rowData = TSItem::create($inArr);
        return $this->sendResponse(new TSItemResource($rowData),"Item Added Successfully");
    }

    public function show(Request $request):JsonResponse{
        $validator = Validator::make($request->all(),[
            'id' => 'required|integer',
        ]);
        if ($validator->fails()){
            return  $this->sendError('Validation Error.',$validator->errors());
        }
        $id=$request['id'];

        $rowData = TSItem::find($id);
        if($rowData){
            return $this->sendResponse(new TSItemResource($rowData),"Item Get Successfully");
        }else{
            return $this->sendResponse([],"Item Not Found");
        }
    }

    public function update(Request $request):JsonResponse{
        $validator = Validator::make($request->all(),[
            'id' => 'required',
            'type_id' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'size_id' => 'required',
            'name' => 'required',
            'details' => 'required',
            'item_code' => 'required',
            'grade' => 'required',
            'status' => 'required|integer',
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $userId = auth()->user()->id;
        $inArr = [
            'type_id'=>$request['type_id'],
            'category_id'=>$request['category_id'],
            'subcategory_id'=>$request['subcategory_id'],
            'size_id'=>$request['size_id'],
            'name'=>$request['name'],
            'details'=>$request['details'],
            'item_code'=>$request['item_code'],
            'grade'=>$request['grade'],
            'status'=>$request['status'],
            'update_by' => $userId,
            'update_date' => $this->getCurrentDateTime(),
        ];
        $rowData = TSItem::find($request->input('id'));
        if ($rowData) {
            $rowData->update($inArr);
            return $this->sendResponse(new TSItemResource($rowData), "Item Updated Successfully");
        }
        else {
            return $this->sendError('Item not found.');
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
        $rowData = TSItem::where('id', $id)->whereNotIn('status', ['3'])->first();
        if ($rowData) {
            $rowData->update($inArr);
            // $rowData->delete();
            return $this->sendResponse([], "Item Deleted Successfully");
        } else {
            return $this->sendError("Item Not Found", []);
        }
    }
}
