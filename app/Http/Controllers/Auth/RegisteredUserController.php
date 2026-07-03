<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
   public function create() {
       return view('auth.register');
   }
   public function store(Request $request) {
       $request->validate([
           'name' => ['required' , 'string' ,'min:2' , 'max:255'],
           'email' => ['required' , 'string' , 'email' , 'unique:users,email'],
           'password' => ['required' , Password::default()],
       ]);

       $user = User::create([
           'name' => $request->name,
           'email' => $request->email,
           'password' => Hash::make($request->password)
       ]);
       Auth::login($user);

       return redirect('/ideas');
   }
}
