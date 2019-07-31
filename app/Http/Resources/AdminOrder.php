<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\User;
use App\product;

class AdminOrder extends JsonResource
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
            'userdetails' => [
                User::find($this->user_id)
            ],
            'productdetails' => [
                product::find($this->product_id)
                ]

            // 'productid' => $this->name,
            // 'email' => $this->email,
            // 'image' => $this->image,
        ];
    }
}
