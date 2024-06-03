<?php

namespace App\Http\Controllers;

use App\Http\Resources\TSItemSalesResource;
use App\Http\Resources\TSItemStockResource;
use App\Models\TSItemSales;
use App\Models\TSItemStock;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TSItemSalesController extends Controller
{


    public function index():JsonResponse{
        $rowData = TSItemSales::where('status', '1')->get();
        return $this->sendResponse(TSItemSalesResource::collection($rowData),"Sales Get Successfully");
    }

    public function store(Request $request):JsonResponse{
        $validator = Validator::make($request->all(),[
            'invoice_no' => 'required',
            'stock_id' => 'required',
            'item_id' => 'required',
            'meas_unit' => 'required',
            'qty_unit' => 'required',
            'meas' => 'required',
            'qty' => 'required',
            'price' => 'required',
            'pay_status' => 'required',
            'status' => 'required|integer',
        ]);
        if ($validator->fails()){
            return  $this->sendError('Validation Error.',$validator->errors());
        }
        $userId = auth()->user()->id;
        $inArr= [
            'invoice_no'=>$request['invoice_no'],
            'stock_id'=>$request['stock_id'],
            'item_id'=>$request['item_id'],
            'meas_unit'=>$request['meas_unit'],
            'qty_unit'=>$request['qty_unit'],
            'meas'=>$request['meas'],
            'qty'=>$request['qty'],
            'price'=>$request['price'],
            'vat'=>$request['vat'],
            'tax'=>$request['tax'],
            'discount'=>$request['discount'],
            'others'=>$request['others'],
            'pay_status'=>$request['pay_status'],
            'status'=>$request['status'],
            'create_by' => $userId,
            'create_date' => $this->getCurrentDateTime(),
        ];
        $rowData = TSItemSales::create($inArr);
        return $this->sendResponse(new TSItemSalesResource($rowData),"Sales Added Successfully");
    }

    public function show(Request $request):JsonResponse{
        $validator = Validator::make($request->all(),[
            'id' => 'required|integer',
        ]);
        if ($validator->fails()){
            return  $this->sendError('Validation Error.',$validator->errors());
        }
        $id=$request['id'];

        $rowData = TSItemSales::find($id);
        if($rowData){
            return $this->sendResponse(new TSItemSalesResource($rowData),"Sales Get Successfully");
        }else{
            return $this->sendResponse([],"Sales Not Found");
        }
    }

    public function update(Request $request):JsonResponse{
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer',
            'invoice_no' => 'required',
            'stock_id' => 'required',
            'item_id' => 'required',
            'meas_unit' => 'required',
            'qty_unit' => 'required',
            'meas' => 'required',
            'qty' => 'required',
            'price' => 'required',
            'pay_status' => 'required',
            'status' => 'required|integer',
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $userId = auth()->user()->id;
        $inArr = [
            'id'=>$request['id'],
            'invoice_no'=>$request['invoice_no'],
            'stock_id'=>$request['stock_id'],
            'item_id'=>$request['item_id'],
            'meas_unit'=>$request['meas_unit'],
            'qty_unit'=>$request['qty_unit'],
            'meas'=>$request['meas'],
            'qty'=>$request['qty'],
            'price'=>$request['price'],
            'vat'=>$request['vat'],
            'tax'=>$request['tax'],
            'discount'=>$request['discount'],
            'others'=>$request['others'],
            'pay_status'=>$request['pay_status'],
            'status'=>$request['status'],
            'update_by' => $userId,
            'update_date' => $this->getCurrentDateTime(),
        ];
        $rowData = TSItemSales::find($request->input('id'));
        if ($rowData) {
            $rowData->update($inArr);
            return $this->sendResponse(new TSItemSalesResource($rowData), "Sales Updated Successfully");
        }
        else {
            return $this->sendError('Sales not found.');
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
        $rowData = TSItemSales::find($id);
        if ($rowData) {
            $rowData->update($inArr);
            // $rowData->delete();
            return $this->sendResponse([], "Sales Deleted Successfully");
        } else {
            return $this->sendError("Sales Not Found", []);
        }
    }
}
