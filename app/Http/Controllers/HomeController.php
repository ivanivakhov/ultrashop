<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Session;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(Request $request): View
    {
        return view('welcome');
    }

}
