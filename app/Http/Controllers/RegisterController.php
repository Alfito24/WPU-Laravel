<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
   public function index(){
        return view('register.index', [
            'title' => "Register",
            'active' => 'register'
        ]);
   }
   public function store(Request $request){
       $validatedData=  $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:8|max:12|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|max:20'
        ]);
        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);
        $request->session()->flash('success', 'Registration was successful! Please Login to your account');
        return redirect('/login');
   }
}
