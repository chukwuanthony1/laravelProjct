<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\product;

class UserOrder extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'orderid' =>$this->orderid,
            'productdetails' => [
                product::find($this->product_id)
                ]

            // 'productid' => $this->name,
            // 'email' => $this->email,
            // 'image' => $this->image,
        ];
    }
}
