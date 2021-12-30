<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'author' => $this->author,
            'isbn' => $this->isbn,
            'image_url' => $this->image_url,
            'amount' => number_format($this->amount, 2),
            'currency' => '$',
            'seller' => $this->seller ? new UserResource($this->seller) : null,
        ];
    }
}
