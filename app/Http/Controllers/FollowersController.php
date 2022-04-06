<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * @group Follow
 *
 * API endpoints for all followers functional
 */
class FollowersController extends Controller
{
    /**
     * Return list of authenticated user followers
     * @authenticated
     */
    public function show_followers(Request $request)
    {
        return Follow::with(['follower'])
            ->where('following', \Auth::id())
            ->get('follower')
            ->toArray();
    }

    /**
     * Return list of users, which authenticated user following
     * @authenticated
     */
    public function show_following(Request $request)
    {
        return Follow::with(['following'])
            ->where('follower', \Auth::id())
            ->get('following')
            ->toArray();
    }

    /**
     * Endpoint for follow user
     *
     * @authenticated
     */

    public function store($id)
    {
        User::query()->findOrFail($id);

        $exists_subscription = Follow::notDouble(\Auth::id(), $id);

        if (!$exists_subscription) {
            return response("You're already follow user with id $id", 400);
        }

        Follow::query()->create([
            'follower' => \Auth::id(),
            'following' => $id
        ]);

        return response(['success' => true]);
    }

    /**
     * Endpoint for unfollow user
     *
     * @authenticated
     */
    public function destroy($id)
    {
        User::query()->findOrFail($id);

        $exists_subscription = Follow::query()
            ->where('follower', \Auth::id())
            ->where('following', $id)
            ->first();

        if (!$exists_subscription) {
            return response("You're not follow user with id $id", 400);
        }

        return response(['status' => 'success']);
    }
}
