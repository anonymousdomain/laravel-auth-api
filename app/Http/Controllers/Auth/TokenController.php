<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;

class TokenController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([

            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!auth()->attempt($request->only('email', 'password'))) {
            return new AuthenticationException();
        }

        return [
            'token' => $request->user()->createToken('test')->plainTextToken
        ];
    }


    public function destroy($id)
    {
        //
    }
}
