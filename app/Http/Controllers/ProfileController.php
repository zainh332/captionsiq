<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function update(Request $request){
        
        $validate = Validator::make($request->all(), [
            'fullname' => 'required|string|max:250',
            'username' => [
                'required',
                'string',
                'max:50',
                Rule::unique('users', 'user_name')->ignore(auth()->id()),
            ],
            'email' => [
                'required',
                'string',
                'email:rfc,dns',
                'max:250',
                Rule::unique('users', 'email')->ignore(auth()->id()),
            ],
            'password' => 'required|string|min:6|confirmed',
            'image' => 'mimes:doc,pdf,docx,zip,jpeg,png,jpg,gif,svg',
        ]);
        

        if($validate->fails()){
            return response()->json([
                'status' => 'failed',
                'message' => 'Validation Error!',
                'data' => $validate->errors(),
            ], 403);
        }

        $user = User::find($request->user_id);
        $user->update([
            'name' => $request->fullname,
            'user_name' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        if($request->hasFile('image')){
          $file = $request->file('image');
          $filename = $file->getClientOriginalName();
          Storage::disk('local')->put('images/'.'/'.$fileName, 'public');
          $user->image = $path;
          $user->save();
        }

        $token = $request->header('Authorization');

        // Token might be prefixed with 'Bearer ', so remove it if necessary
        if (Str::startsWith($token, 'Bearer ')) {
            $token = Str::substr($token, 7); // Remove 'Bearer ' prefix
        }

        $data['token'] = $token;
        $data['user'] = $user;

        $response = [
            'status' => 'success',
            'message' => 'Profile upadated successfully.',
            'data' => $data,
        ];

        return response()->json($response, 200);

    }
}
