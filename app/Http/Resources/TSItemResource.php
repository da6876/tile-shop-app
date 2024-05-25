<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TSItemResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'type_id'=>$this->type_id,
            'category_id'=>$this->category_id,
            'subcategory_id'=>$this->subcategory_id,
            'size_id'=>$this->size_id,
            'name'=>$this->name,
            'details'=>$this->details,
            'item_code'=>$this->item_code,
            'grade'=>$this->grade,
            'status'=>$this->status,
            'create_by'=>$this->create_by,
            'create_date'=>$this->create_date,
            'update_by'=>$this->update_by,
            'update_date'=>$this->update_date,
        ];
    }
}
