<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LogoutController extends Controller
{
    /**
     * Log out account user.
     *
     * @return \Illuminate\Routing\Redirector
     */
    public function perform()
    {
        $name = auth()->user()->username ?? '';

        // User logout logs 
        \Log::channel('logoutlogs')->info('User "'.$name.'" logged out successfully.');

        // Login Logout credentials
        \Log::channel('authtlogs')->info('User "'.$name.'" logged out successfully.');

        // Removing session data
        Session::flush();
        
        // log out by using outh
        Auth::logout();

        // redirecting agai to login page
        return redirect('login');
    }
}
