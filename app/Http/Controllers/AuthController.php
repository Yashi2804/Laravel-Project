<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    
    public function showLogin()
    {
        return view('LARAVEL_PROJECT.Auth.login'); 
    }

    public function manualLogin(Request $request)
    {
    
        $request->validate([
            'identifier' => 'required|string',
            'password' => 'required|string|min:6',
        ]);
        if($request->identifier=="admin" && $request->password=="admin@12"){
            return view('admin');
        }

      
       $user = User::where('email', $request->identifier)
          ->orWhere('username', $request->identifier)
          ->first();
        if (!$user) {
            return back()->with('error', 'User not found.');
        }
        if (!Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Invalid password.');
        }
        session(['user' => $user]);

        return redirect('/dashboard')->with('success', 'Welcome back, ' . $user->fname . '!');
    }


 public function showRegister()
{
    return view('LARAVEL_PROJECT.Auth.register');
}

public function register(Request $request)
{ 
   $request->validate([
        'fname' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:userss',
        'username'=>'required|string|max:255|unique:userss',
        'password' => 'required|string|min:6|confirmed', 
    ]);
    $user = User::create([
        'fname' => $request->fname,
        'email' => $request->email,
        'username'=>$request->username,
        'password' => Hash::make($request->password),
    ]);
    Auth::login($user);
    return response()->json([
        'status' => 'success',
        'message' => 'Registration successful!',
        'user' => $user
    ]);
}

}