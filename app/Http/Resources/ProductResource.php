<?php

namespace App\Http\Resources;

use App\Models\ProductsColors;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

/**
 * @property mixed id
 * @property mixed brand
 * @property mixed model
 * @property mixed price
 * @property mixed images
 * @property mixed color_id
 * @property mixed size
 * @property mixed colors
 * @property mixed color
 */
class ProductResource extends JsonResource
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
            'id' => $this->id,
            'brand' => $this->brand,
            'model' => $this->model,
            'price' => $this->price,
            'color' => ColorResource::collection($this->color),
            'size' => $this->size,
            'images' => ImagesResource::collection($this->images),
        ];
    }
}
