<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TSItemSalesResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'invoice_no'=>$this->invoice_no,
            'stock_id'=>$this->stock_id,
            'item_id'=>$this->item_id,
            'meas_unit'=>$this->meas_unit,
            'qty_unit'=>$this->qty_unit,
            'meas'=>$this->meas,
            'qty'=>$this->qty,
            'price'=>$this->price,
            'vat'=>$this->vat,
            'tax'=>$this->tax,
            'discount'=>$this->discount,
            'others'=>$this->others,
            'pay_status'=>$this->pay_status,
            'status'=>$this->status,
            'create_by'=>$this->create_by,
            'create_date'=>$this->create_date,
            'update_by'=>$this->update_by,
            'update_date'=>$this->update_date,
        ];
    }
}
