<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignInFormRequest;
use App\Http\Requests\SignUpFormRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthController extends Controller
{

    public function login(): Response
    {

        return response()->view('auth.index');
    }


    public function signIn(SignInFormRequest $request)
    {

        if (!auth()->attempt($request->validated())) {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        }

        $request->session()->regenerate();

        return redirect()->intended(route('home'));
    }
    public function signUp(SignUpFormRequest $request): Response
    {

        return response()->view('auth.sign-up');
    }
    public function store(SignUpFormRequest $request): Response
    {
        $user = User::query()->create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
        ]);

        event(new Registered($user));

        auth()->login($user);

        return response()->view('home');
    }
}
