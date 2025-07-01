<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PublicRegistrationController extends Controller
{
    /**
     * Show the public registration form.
     */
    public function create()
    {
        return view('request-user');
    }

    /**
     * Handle the submission of the public registration form.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'client', // default role for public sign-ups
        ]);

        return redirect()->route('request-user.confirm');
    }
}
