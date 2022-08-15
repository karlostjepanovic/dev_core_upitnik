<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;
use Inertia\Response;

class PasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        return Inertia::render('Profile/ChangePassword', [
            'initial_password' => Auth::user()->initial_password
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'current_password'   => 'required|current_password',
            'new_password'       => 'required|min:6',
            'repeat_password'    => 'required|same:new_password'
        ]);
        try {
            Auth::user()->update([
                'password' => Hash::make($request->new_password),
                'initial_password' => false
            ]);
        }catch (QueryException $e){
            return redirect()->back()->with([
                'error' => 'Dogodila se greška.'
            ]);
        }
        return redirect()->back()->with('success', 'Lozinka je uspješno promjenjena.');
    }
}
