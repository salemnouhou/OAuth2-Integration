<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\OauthProvider;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

class OauthController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->stateless()->redirect();
    }
  
    public function handleProviderCallback($provider)
    {
        try {
            $oauthUser = Socialite::driver($provider)->stateless()->user();
            
            $oauthProvider = OauthProvider::where('provider', $provider)
                                          ->where('provider_id', $oauthUser->getId())
                                          ->first();

            
            if ($oauthProvider) {
                $user_id = $oauthProvider->user_id;
                $user = User::findOrFail($user_id);
                
                $token = $user->createToken('auth_token')->plainTextToken;
                return response()->json([
                    
                    'success' => true,
                    'user logged with oauth 2 token and token is ' => $token], 200);
            } else {
                $user = User::where('email', $oauthUser->getEmail())->first();

                if (!$user) {
                    $user = User::create([
                        'name' => $oauthUser->getName(),
                        'email' => $oauthUser->getEmail(),
                        'password' => bcrypt(Str::random(16)), 
                        'oauth_provider' => $provider,
                    ]);
                }

                $user->oauthProviders()->create([
                    'provider' => $provider,
                    'provider_id' => $oauthUser->getId(),
                ]);
            }

            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                
                'success' => true,
                'user registered with OAUTH2' => $token], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'Authentication failed.'], 500);
        }
    }

}
