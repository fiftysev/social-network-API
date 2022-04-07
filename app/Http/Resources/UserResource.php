<?php

namespace App\Http\Resources;

use App\Models\Follow;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\User */
class UserResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'username' => $this->username,
            'avatar' => \Storage::disk('s3')->url("avatars/$this->id/$this->avatar"),
            'status' => $this->status,
            'followed' => $this->when(auth()->check(), $this->followed),
        ];
    }
}
