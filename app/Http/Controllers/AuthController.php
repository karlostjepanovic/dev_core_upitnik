<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AuthController extends Controller
{
    // sučelje za prijavu
    public function index()
    {
        if(Auth::check()){
            $user = Auth::user();
            if($user->is_admin){
                return redirect('admin/schools');
            }else{
                return redirect('main/set-school');
            }
        }else{
            return Inertia::render('Login');
        }
    }

    /**
     * Prijava korisnika
     */
    public function login(Request $request)
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
    public function logout()
    {
        session()->flush();
        Auth::logout();
        return redirect()->route('login');
    }
}
