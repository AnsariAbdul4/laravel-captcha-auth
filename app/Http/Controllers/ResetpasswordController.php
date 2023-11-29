<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use DB; 
use Carbon\Carbon; 
use Mail; 
use Hash;
use Illuminate\Support\Str;

class ResetpasswordController extends Controller
{
    public function forgetPassword(Request $request){
        // Show registration page UI
        return view('auth.forgetpassword');
    }

    public function forgetPasswordSendLink(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email, 
            'token' => $token, 
            'created_at' => Carbon::now()
          ]);

        Mail::send('email.forgetPassword', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        // User registration logs 
        \Log::channel('resetpasswordlogs')->info('Reset password link sent successfully to email "'.$request->email.'" .');

        return redirect('/login')->with('success', 'We have e-mailed your password reset link!');
    }

    /**
       * Write code on Method
       *
       * @return response()
       */
      public function showResetPasswordForm($token) { 
        return view('auth.forgetPasswordLink', ['token' => $token]);
     }
 
     /**
      * Write code on Method
      *
      * @return response()
      */
     public function submitResetPasswordForm(Request $request)
     {
         $request->validate([
             'email' => 'required|email|exists:users',
             'password' => 'required|string|min:6|confirmed',
             'password_confirmation' => 'required'
         ]);
         
         $updatePassword = DB::table('password_resets')
                             ->where([
                               'email' => $request->email, 
                               'token' => $request->token
                             ])
                             ->first();

        if(!$updatePassword){
            return redirect('login')->with('success', 'Invalid token!');
        }
 
         $user = User::where('email', $request->email)
                    ->update(['password' => Hash::make($request->password)]);
                    
         DB::table('password_resets')->where(['email'=> $request->email])->delete();

         \Log::channel('resetpasswordlogs')->info('Password has been successfully reset for email "'.$request->email.'" .');
 
         return redirect('/login')->with('success', 'Your password has been changed!');
     }

     public function requestResetPassword(Request $request){
        
        $email = auth()->user()->email;
        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $email, 
            'token' => $token, 
            'created_at' => Carbon::now()
          ]);

        Mail::send('email.forgetPassword', ['token' => $token], function($message) use($email){
            $message->to($email);
            $message->subject('Reset Password');
        });

         // Removing session data
         Session::flush();
        
         // log out by using outh
         Auth::logout();

        return redirect('/')->with('success', 'We have e-mailed your password reset link!');

     }

}
