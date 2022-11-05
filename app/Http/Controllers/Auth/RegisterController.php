<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // function __construct()
    // {
    //     $this->middleware('auth:sanctum')->only('destroy');
    // }
    public function store(StoreUserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return response([
            'token' => $user->createToken($request->deviceId)->plainTextToken,
        ], 201);
    }

    public function destroy(User $user, Request $request)
    {
        $user->tokens()->where('name', $request->deviceId)->delete();
        return response('', 204);
    }
}
