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
            'status' => $this->status,
            'followed' => $this->when(auth()->check(), $this->followed),
            'avatar' =>
                $this
                    ->when(
                        $this->avatar,
                        \Storage::disk('s3')->url("avatars/$this->id/$this->avatar")
                    ),
            'profile_background' =>
                $this
                    ->when(
                        $this->profile_background,
                        \Storage::disk('s3')
                            ->url("profile_backgrounds/$this->id/$this->profile_background")
                    ),
        ];
    }
}
