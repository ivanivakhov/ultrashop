<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthController extends Controller
{

    public function login(): Response
    {

        return response()->view('auth.index');
    }


    public function signUp(): Response
    {

        return response()->view('auth.sign-up');
    }
}
