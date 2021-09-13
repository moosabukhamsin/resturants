<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Table as TableResource;

class Restaurant extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'address' => $this->address,
            'tables' => TableResource::collection($this->tables),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
