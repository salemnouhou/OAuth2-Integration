<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class ProfileController extends Controller
{

            public function show()
            {
                $user = Auth::user();

                return response()->json([
                    'user' => $user
                ], 200);
            }


            public function definepassword(Request $request){
                $user = Auth::user();

               
                $validator =  Validator::make($request->all(), [
                  
                    'password' => 'required|string|min:8',
            ]);

            if($validator->fails()){
                return response()->json(['password too small' => 500]);
            }else{
                $user->update($request->only(['password']));
        
                return response()->json([
                    'success'=>true,
                    'user password set successfully' => $user], 200);
            }
        
                
            }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'string|max:255',
            'email' => 'string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'required|string|min:8',
            
        ]);

        $user->update($request->only(['name', 'email','password']));

        return response()->json(['user updated' => $user], 200);
    }

    public function listUsers()
    {
        $users = User::with('oauthProviders')->get();

        return response()->json(['users' => $users], 200);
    }
}
