<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TSItemSizeResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'status'=>$this->status,
            'create_by'=>$this->create_by,
            'create_date'=>$this->create_date,
            'update_by'=>$this->update_by,
            'update_date'=>$this->update_date,
        ];
    }
}
