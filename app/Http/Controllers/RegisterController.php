<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    public function index()
    {
        return view('register.index', [
            'title' => 'register',
            'active' => 'register',
        ]);
    }

    // two method below are same result
    // public function store()
    // {
    //     return request()->all();
    // }

    public function store(Request $request)
    {
        // make input validation
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'min:4', 'max:255', 'unique:users'],
            'email' => ['required', 'email:dns', 'unique:users'],
            'password' => ['required', 'min:6', 'max:255'],
        ]);
        // $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        // the return below are return same result
        // $request->session()->flash('success', 'registration successfull.');
        // return redirect('/login');
        return redirect('/login')->with('success', 'Registration successfull.');
    }
}
