<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

/**
 * @property mixed id
 * @property mixed color
 * @property mixed product
 * @property mixed count
 * @property mixed total_amount
 */
class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'product' => new ProductResource($this->product),
            'color' => new ColorResource($this->color),
            'count' => $this->count,
            'total_price' => $this->total_amount,
        ];
    }
}
