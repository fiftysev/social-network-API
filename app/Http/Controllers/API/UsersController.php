<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * @group Users
 *
 * API endpoints for users data
 */

// TODO: Вынести логику из контроллера в сервис

class UsersController extends Controller
{
    /**
     * All users list
     *
     * @queryParam   page int  Current page number Example: 3
     * @queryParam   per_page int Page size Example: 12
     *
     */
    public function index(Request $request)
    {
        return UserResource::collection(User::query()->paginate(
            $perPage = (int)$request->query('per_page', 15)
        ));
    }

    /**
     * Get user by id
     */
    public function show($id)
    {
        return new UserResource(User::query()->findOrFail($id));
    }

}
