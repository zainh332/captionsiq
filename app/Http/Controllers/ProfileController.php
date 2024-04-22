<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{


    public function getProfile(Request $request){

        $user = User::find($request->user()->id);
        if(!$user){
            //throw error
        }

        return $user;

    }



    public function update(Request $request){
    
        $validate = Validator::make($request->all(), [
            'name' => 'required|string|max:250',
            'user_name' => 'required|string|max:50|unique:users,user_name',
            'email' => 'required|string|email:rfc,dns|max:250|unique:users,email',
            'password' => 'required|string|min:8|confirmed'
        ]);

        if($validate->fails()){
            return response()->json([
                'status' => 'failed',
                'message' => 'Validation Error!',
                'data' => $validate->errors(),
            ], 403);
        }

        $user = User::find($request->user()->id);
        $user->update([
            'name' => $request->name,
            'user_name' => $request->user_name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $response = [
            'status' => 'success',
            'message' => 'Profile upadated successfully.',
            'data' => $user,
        ];
        return response()->json($response, 200);

    }
}
