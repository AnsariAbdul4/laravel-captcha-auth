<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;

class ProfileController extends Controller
{
    /**
     * Display register page.
     * 
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // Show registration page UI
        return view('user.profile');
    }

    /**
     * Handle account update request
     * 
     * @param ProfileRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request, User $user) 
    {
        $avatarName = time().'.'.$request->avtar->getClientOriginalExtension();
        // dd($avatarName);
        $uploaded = $request->avtar->move(public_path('images'), $avatarName);
        // dd($uploaded);
        Auth()->user()->update(['avtar'=>$avatarName]);
  
        // Redirect user to home page
        return back()->with('success', "Profile image updated.");
    }
}
