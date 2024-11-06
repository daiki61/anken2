<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AuthenticatedSessionController extends Controller
{

    public function showLoginForm(){
            
        return view('user.login');

    }


    public function login(RegisterRequest $request)
    {
        $request->validate([
            
            'name' => ['required', 'string', 'max:191'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required,min:8', 'max:191'],
        ]);
        $userData->request([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($request->only('email', 'password')))

      Auth::user(); 

      //return redirect()->back()->withErrors(['message' => 'ログインに失敗しました。']);
    
    }


    
    

    public function store(Request $request)
    {
         $userData = $request->only([ 'email', 'password']);
         $userData['password'] = bcrypt($userData['password']);
        User::create($userData);
        return view('login');
       
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }

}

















