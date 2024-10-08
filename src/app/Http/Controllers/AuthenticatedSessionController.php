<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthenticatedSessionController extends Controller
{
    public function store()
    {
        return view('store');
    }

    public function destroy()
    {
        return view ('destroy');
    }
}
