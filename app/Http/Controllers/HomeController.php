<?php

namespace App\Http\Controllers;

use Session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request)
    {

        if(Auth::attempt(['email' => 'test@test', 'password' => 'test'])) {
            dd($request);

        }

        return response()->view('welcome');
    }
}
