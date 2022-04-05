<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        return UserResource::collection(User::query()->paginate(
            $perPage = $request->query('per_page', 15)
        ));
    }

    public function show($id)
    {
        return new UserResource(User::findOrFail($id));
    }
}
