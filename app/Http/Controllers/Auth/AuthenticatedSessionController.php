<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class AuthenticatedSessionController extends Controller
{

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required' , 'string' ,'email' , 'max:255'],
            'password' => ['required' , 'string' , 'max:255', Password::default()]
        ]);

        if(Auth::attempt($request->only('email' , 'password'))){
            session()->regenerate();
            return redirect('/ideas');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Auth::logout();
        return redirect('/login');
    }
}
