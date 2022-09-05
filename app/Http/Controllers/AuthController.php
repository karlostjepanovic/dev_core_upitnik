<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class AuthController extends Controller
{
    // sučelje za prijavu
    public function index(): Redirector|Response|RedirectResponse|Application
    {
        if(Auth::check()){
            $user = Auth::user();
            if(count($user->myQuestionnaires()->get()->toArray())){
                return redirect()->route('myQuestionnaires');
            }else{
                return redirect()->route('setSchool');
            }
        }else{
            return Inertia::render('Login');
        }
    }

    /**
     * Prijava korisnika
     */
    public function login(Request $request): Redirector|Application|RedirectResponse
    {
        $request->validate([
            'username'  => 'required',
            'password'   => 'required',
        ]);
        $credentials = array(
            'username'  => $request->username,
            'password'  => $request->password
        );

        if(Auth::attempt($credentials)) {
            return redirect('/');
        }else{
            return redirect()->back()->with([
                'error' => 'Krivo korisničko ime ili lozinka.'
            ]);
        }
    }

    /**
     * Odjava korisnika
     */
    public function logout(): RedirectResponse
    {
        Auth::logout();
        session()->flush();
        return redirect()->route('login');
    }
}
