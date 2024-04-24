<?php

namespace App\Http\Controllers\Auth;

use Validator;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Notifications\SendPasswordResetLink;
use Illuminate\Support\Facades\Notification;

class ForgotPasswordController extends Controller
{
     /**

       * Write code on Method
       *
       * @return response()
      */
       public function forgotPassword(Request $request)
        {
            try{
                $validate = Validator::make($request->all(), [
                    'email' => 'required|email|exists:users',
                ]);
        
                if($validate->fails()){
                    $response = [
                        'status' => 'failed',
                        'message' => 'Validation Error!',
                        'error' => $validate->errors(),
                    ];
                    return response()->json($response, 403);
                }
        
                $token = Str::random(64);
        
                DB::table('password_reset_tokens')->insert([
        
                    'email' => $request->email, 
                    'token' => $token, 
                    'created_at' => Carbon::now()
        
                ]);
            
                $user = User::where('email', $request->email)->first();
        
                // Send the notification
                $user->notify(new SendPasswordResetLink($token));
        
                $response = [
                    'status' => 'success',
                    'message' => 'Password Reset Link Sent Successfully',
                    
                ];
        
                return response()->json($response,200);
            }
            catch (\Exception $e) {
                // Handle the exception
                // You can log the exception, return a custom error response, or perform any other action
                return response()->json(['error' =>  $e->getMessage()], 500);
            }

        }
  
       /**
        * Write code on Method
        *
        * @return response()
        */

       public function resetPassword(Request $request)
 
        {
            try{
                $validate = Validator::make($request->all(), [
                    'email' => 'required|email|exists:users',
                    'password' => 'required|string|min:6|confirmed',
                    'token' =>'required'
                ]);
    
                if($validate->fails()){
                    return response()->json([
                        'status' => 'failed',
                        'message' => 'Validation Error!',
                        'data' => $validate->errors(),
                    ], 403);
                }
    
                $updatePassword = DB::table('password_reset_tokens')->where(['email' => $request->email,'token' => $request->token])->first();  
    
                if(!$updatePassword){
                    return response()->json([
                        'status' => 'failed',
                        'message' => 'Error!',
                        'data' => 'Invalid User Token',
                    ], 403);
                }
    
                $user = User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);
    
                DB::table('password_reset_tokens')->where(['email'=> $request->email])->delete();
    
                //return redirect('/login')->with('message', 'Your password has been changed!');
                $response = [
                'status' => 'success',
                'message' => 'Password has been updated successfully',
                
            ];
            return response()->json($response,200);
            }
            catch (\Exception $e) {
                // Handle the exception
                // You can log the exception, return a custom error response, or perform any other action
                return response()->json(['error' =>  $e->getMessage()], 500);
            }
       }
 
}
