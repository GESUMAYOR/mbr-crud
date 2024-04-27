<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use \Carbon\Carbon;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array
     */
    public function toArray(Request $request): array
    {
        //return parent::toArray($request);
        return [
            'id' => $this->id,
            'surname' => $this->surname,
            'othername' => $this->othername,
            'email' => $this->email,
            'gender' => $this->gender,
            'phone_no' => $this->phone_no,
            'created_at' => $this->created_at,
            // 'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }

}
