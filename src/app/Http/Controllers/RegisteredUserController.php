<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('create');
    }

    public function store()
    {
        return view('store');
    }
}
