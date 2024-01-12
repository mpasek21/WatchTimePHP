<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;


class UserController extends Controller
{
    // poka formularz
    public function create() {
        return view('users.register');
    }

    //Nowy user
    public function store(Request $request) {
        $formFields = $request->validate([
            'name' =>  ['required', 'min:5', Rule::unique('users', 'name')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);

        // hashowanie
        $formFields['password'] = bcrypt($formFields['password']);

        // stworz
        $user = User::create($formFields);

        // login
        auth()->login($user);

        return redirect('/')->with('message', 'Utworzono konto');
    }

    // wyloguj
    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'Wylogowano!');

    }

    // formularz login
    public function login() {
        return view('users.login');
    }

    // autentykacja
    public function authenticate(Request $request) {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'Zalogowano!');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }
}
