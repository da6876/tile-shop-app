<?php

namespace App\Http\Controllers;

use App\Http\Resources\TSCategoryResource;
use App\Http\Resources\TSItemStockResource;
use App\Models\TSCategory;
use App\Models\TSItemStock;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TSItemStockController extends Controller
{

    public function index():JsonResponse{
        $rowData = TSItemStock::where('status', '1')->get();
        return $this->sendResponse(TSItemStockResource::collection($rowData),"Stock Get Successfully");
    }

    public function store(Request $request):JsonResponse{
        $validator = Validator::make($request->all(),[
            'stock_code' => 'required',
            'item_id' => 'required',
            'meas_unit' => 'required',
            'qty_unit' => 'required',
            'meas' => 'required',
            'qty' => 'required',
            'sell_price' => 'required',
            'buy_price' => 'required',
            'status' => 'required|integer',
        ]);
        if ($validator->fails()){
            return  $this->sendError('Validation Error.',$validator->errors());
        }
        $userId = auth()->user()->id;
        $inArr= [
            'stock_code'=>$request['stock_code'],
            'item_id'=>$request['item_id'],
            'meas_unit'=>$request['meas_unit'],
            'qty_unit'=>$request['qty_unit'],
            'meas'=>$request['meas'],
            'qty'=>$request['qty'],
            'sell_price'=>$request['sell_price'],
            'buy_price'=>$request['buy_price'],
            'status'=>$request['status'],
            'create_by' => $userId,
            'create_date' => $this->getCurrentDateTime(),
        ];
        $rowData = TSItemStock::create($inArr);
        return $this->sendResponse(new TSItemStockResource($rowData),"Stock Added Successfully");
    }

    public function show(Request $request):JsonResponse{
        $validator = Validator::make($request->all(),[
            'id' => 'required|integer',
        ]);
        if ($validator->fails()){
            return  $this->sendError('Validation Error.',$validator->errors());
        }
        $id=$request['id'];

        $rowData = TSItemStock::find($id);
        if($rowData){
            return $this->sendResponse(new TSItemStockResource($rowData),"Stock Get Successfully");
        }else{
            return $this->sendResponse([],"Stock Not Found");
        }
    }

    public function update(Request $request):JsonResponse{
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer',
            'stock_code' => 'required',
            'item_id' => 'required',
            'meas_unit' => 'required',
            'qty_unit' => 'required',
            'meas' => 'required',
            'qty' => 'required',
            'sell_price' => 'required',
            'buy_price' => 'required',
            'status' => 'required|integer',
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $userId = auth()->user()->id;
        $inArr = [
            'id'=>$request['id'],
            'stock_code'=>$request['stock_code'],
            'item_id'=>$request['item_id'],
            'meas_unit'=>$request['meas_unit'],
            'qty_unit'=>$request['qty_unit'],
            'meas'=>$request['meas'],
            'qty'=>$request['qty'],
            'qty_unit'=>$request['qty_unit'],
            'sell_price'=>$request['sell_price'],
            'buy_price'=>$request['buy_price'],
            'update_by' => $userId,
            'update_date' => $this->getCurrentDateTime(),
        ];
        $rowData = TSItemStock::find($request->input('id'));
        if ($rowData) {
            $rowData->update($inArr);
            return $this->sendResponse(new TSItemStockResource($rowData), "Stock Updated Successfully");
        }
        else {
            return $this->sendError('Stock not found.');
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
        $rowData = TSItemStock::find($id);
        if ($rowData) {
            $rowData->update($inArr);
            // $rowData->delete();
            return $this->sendResponse([], "Stock Deleted Successfully");
        } else {
            return $this->sendError("Stock Not Found", []);
        }
    }
}
