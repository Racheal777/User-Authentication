<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'id'=>$this->id,
            //'name'=>$this->firstname . ' ' . $this->lastname,
            'name'=> "{$this->firstname} {$this->lastname}",
            // 'firstname'=>$this->firstname,
            // 'lastname'=>$this->lastname,
            'email'=>$this->email,
            'role'=>$this->role->role ?? ''
        ];
    }
}
