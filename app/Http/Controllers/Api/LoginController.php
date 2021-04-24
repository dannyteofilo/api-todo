<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Traits\ApiResponser;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use ApiResponser;
    //
    public function login(Request $request)
    {
        $attr=$this->validateLogin($request);
        if (Auth::attempt($attr)) {
            return response()->json([
                'token' => $request->user()->createToken('API Token')->plainTextToken,
                'message' => 'success'
            ]);
        }

        return $this->error('Credentials not match', 401);
    }

    public function register(Request $request)
    {
        $attr = $this->validateRegister($request);
        $user = User::create([
            'name' => $attr['name'],
            'password' => bcrypt($attr['password']),
            'email' => $attr['email']
        ]);

        return $this->success([
            'token' => $user->createToken('API Token')->plainTextToken
        ]);
    }

    public function validateLogin(Request $request)
    {
        return $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    }

    public function validateRegister(Request $request)
    {
        return $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'name' => 'required',
        ]);
    }
}
