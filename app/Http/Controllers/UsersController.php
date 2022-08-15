<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;
use Inertia\Response;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        return Inertia::render('Admin/Users/Index', [
            'users' => User::orderBy('lastname')->orderBy('firstname')->orderBy('username')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        return Inertia::render('Admin/Users/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'firstname'     => 'required',
            'lastname'      => 'required',
            'username'      => 'required',
            'oib'           => 'required|numeric|digits:11',
            'email'         => 'required|email'
        ]);
        try {
            User::create([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'username' => $request->username,
                'password' => Hash::make("1234"),
                'oib' => $request->oib,
                'email' => $request->email
            ]);
        }catch (QueryException $e){
            return redirect()->back()->with('error', 'Korisnik s ovim korisničkim imenom, adresom e-pošte ili OIB-om već postoji.');
        }
        return redirect()->route('admin.users')->with('success', 'Novi korisnik je uspješno spremljen.');
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return Response
     */
    public function show(User $user): Response
    {
        return Inertia::render('Admin/Users/Show', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(Request $request, User $user): RedirectResponse
    {
        $request->validate([
            'firstname'     => 'required',
            'lastname'      => 'required',
            'username'      => 'required',
            'oib'           => 'required|numeric|digits:11',
            'email'         => 'required|email'
        ]);
        try {
            $user->update([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'username' => $request->username,
                'oib' => $request->oib,
                'email' => $request->email
            ]);
        }catch (QueryException $e){
            return redirect()->back()->with('error', 'Korisnik s ovim korisničkim imenom, adresom e-pošte ili OIB-om već postoji.');
        }
        return redirect()->back()->with('success', 'Promjene su uspješno spremljene.');
    }

    public function resetPassword(User $user)
    {
        try {
            $user->update([
                'password' => Hash::make('1234'),
                'initial_password' => true
            ]);
        }catch (QueryException $e){
            return redirect()->back()->with('error', 'Dogodila se greška.');
        }
        return redirect()->back()->with('success', 'Lozinka je uspješno resetirana.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return RedirectResponse
     */
    public function destroy(User $user): RedirectResponse
    {
        try {
            $user->delete();
        }catch (QueryException $e){
            return redirect()->back()->with('error', 'Korisnika nije moguće obrisati jer za njega postoje vezani podatci.');
        }
        return redirect()->route('admin.users')->with('success', 'Korisnik je uspješno obrisan.');
    }
}
