<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TSItemStockResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'stock_code'=>$this->stock_code,
            'item_id'=>$this->item_id,
            'meas_unit'=>$this->meas_unit,
            'qty_unit'=>$this->qty_unit,
            'meas'=>$this->meas,
            'qty'=>$this->qty,
            'sell_price'=>$this->sell_price,
            'buy_price'=>$this->buy_price,
            'status'=>$this->status,
            'create_by'=>$this->create_by,
            'create_date'=>$this->create_date,
            'update_by'=>$this->update_by,
            'update_date'=>$this->update_date,
        ];
    }
}
