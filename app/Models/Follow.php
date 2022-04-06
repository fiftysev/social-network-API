<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $fillable = [
        'follower',
        'following'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function follower()
    {
        return $this->belongsTo(User::class, 'follower');
    }

    public function following()
    {
        return $this->belongsTo(User::class, 'following');
    }

    public function scopeNotDouble(\Illuminate\Database\Eloquent\Builder $query, int $follower_id, int $following_id)
    {
        return $query->where('follower', $follower_id)->where('following', $following_id)->doesntExist();
    }
}
