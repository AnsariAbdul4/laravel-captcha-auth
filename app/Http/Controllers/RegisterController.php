<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    /**
     * Display register page.
     * 
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // Show registration page UI
        return view('auth.register');
    }

    /**
     * Handle account registration request
     * 
     * @param RegisterRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterRequest $request) 
    {
        // Validate user details
        $user = User::create($request->validated());

        // Login user by auth
        auth()->login($user);

        $name = auth()->user()->username ?? '';

        // User registration logs 
        \Log::channel('registrationlogs')->info('User "'.$name.'" registered his account successfully.');
        
        // Redirect user to home page
        return redirect('/')->with('success', "Account successfully registered.");
    }
}
