<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request): Response
    {

        if(Auth::attempt(['email' => 'test@test', 'password' => 'test'])) {
            dd($request);

        }

        return response()->view('welcome');
    }

    public function login(): Response
    {

        return response()->view('auth.index');
    }
}
