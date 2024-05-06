<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;

class SocialiteController extends Controller
{
    public function loginSocial(Request $request, string $provider)
    {
        $this->validateProvider($request);
        return Socialite::driver($provider)->redirect()->getTargetUrl();
    }
 
    public function callbackSocial(Request $request, string $provider)
    {  
        try{

            $this->validateProvider($request);
 
            $response = Socialite::driver($provider)->stateless()->user();
    
            $user = User::where('email', $response->email)->orWhere($provider . '_id',$response->id)->first();
    
            $data = [
                'name' => $response->name,
                'user_name' => $response->nickname,
                'email' => $response->email,
                'password' => $response->password ?? Hash::make('12345678'),
                $provider . '_id' => $response->id
            ];
    
            if(!$user){
                
                $user = User::create($data);
            }
            else{
                $user->update($data);
            }
     
            Auth::login($user, remember: true);
     
            return redirect()->intended(RouteServiceProvider::HOME);
        }
         catch (Exception $e) {
            dd($e->getMessage());
        }
       
    }
 
    protected function validateProvider(Request $request): array
    {
        return $this->getValidationFactory()->make(
            $request->route()->parameters(),
            ['provider' => 'in:facebook,google,instagram']
        )->validate();
    }
}
