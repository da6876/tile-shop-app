<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TSSubCategoryResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'categoryid'=>$this->categoryid,
            'name'=>$this->name,
            'status'=>$this->status,
            'create_by'=>$this->create_by,
            'create_date'=>$this->create_date,
        ];
    }
}
