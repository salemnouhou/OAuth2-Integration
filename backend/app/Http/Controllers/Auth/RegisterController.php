<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Validator;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
      

        $validator =  Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
        ]);

        if($validator->fails()){
            return response()->json(['error in form' => 500]);
        }else {


            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'oauth_provider' => 'EMAIL & PASSWORD',
            ]);
            return response()->json([
                'success' => true,
                'user registered' => 200]);
        }

       

       
    }
}
