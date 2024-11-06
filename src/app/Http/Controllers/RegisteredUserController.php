<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;


class RegisteredUserController extends Controller
{

    public function showRegistrationForm(){
        
        return view('user.register');
    }
    
    public function register(RegisterRequest $request)
    {
       $request ->validate([
            
            'name' => 'required|string|max:191',
            'email' => 'required|string|email|unique:users|max:191',
            'password' => 'required|string|min:8|confirmed|max:191',
        ]);
        $userData = [
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ];
        User::create([
            'name' => $userData->name,
            'email' => $userData->email,
            'password' => Hash::make($userData['password']),
        ]);
         
         return redirect('/login');
    }

    public function create(RegisterRequest $request)
    {
        $form = $request->all();
        member::create($form);
        //return redirect('/');
    }

    public function store(RegisterRequest $request)
    {
        $validatedData = $request->validate([
            
            'name' => ['required', 'string', 'max:191'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required,min:6'],
        ]);
        $userData = $request->only(['name', 'email', 'password']);
        User::create($userData);

        //return view('/');
    }

    public function update(Request $request)
    {
        $form = $request->all();
        unset($form['_token']);
        Author::find($request->id)->update($form);
        //return redirect('/');
    }
}
