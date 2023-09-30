<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

/**
 * @property mixed products
 * @property mixed color
 * @property mixed count
 * @property mixed total_amount
 */
class ProductCartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'product' => ProductResource::collection($this->products),
            'color' => ColorResource::collection($this->color),
            'count' => $this->count,
            'total_amount' => $this->total_amount,
        ];
    }
}
