<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        return Inertia::render('Admin/Schools/Index', [
            'schools' => School::orderBy('name')->with('supervisor')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        return Inertia::render('Admin/Schools/Create', [
            'users' => User::orderBy('lastname')->orderBy('firstname')->orderBy('username')->get()
        ]);
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
            'name'          => 'required',
            'address'       => 'required',
            'place'         => 'required',
            'oib'           => 'required',
            'supervisor'    => 'required',
        ]);
        try {
            School::create([
                'name' => $request->name,
                'address' => $request->address,
                'place' => $request->place,
                'oib' => $request->oib,
                'supervisor_id' => $request->supervisor,
            ]);
        }catch (QueryException $e){
            return redirect()->back()->with('error', 'Škola s ovim nazivom ili OIB-om već postoji.');
        }
        return redirect()->route('admin.schools')->with('success', 'Nova škola je uspješno spremljena.');
    }

    /**
     * Display the specified resource.
     *
     * @param School $school
     * @return Response
     */
    public function show(School $school): Response
    {
        return Inertia::render('Admin/Schools/Show', [
            'school' => $school,
            'users' => User::orderBy('lastname')->orderBy('firstname')->orderBy('username')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param School $school
     * @return RedirectResponse
     */
    public function update(Request $request, School $school): RedirectResponse
    {
        $request->validate([
            'name'          => 'required',
            'address'       => 'required',
            'place'         => 'required',
            'oib'           => 'required',
            'supervisor'    => 'required',
        ]);
        try {
            $school->update([
                'name' => $request->name,
                'address' => $request->address,
                'place' => $request->place,
                'oib' => $request->oib,
                'supervisor_id' => $request->supervisor,
            ]);
        }catch (QueryException $e){
            return redirect()->back()->with('error', 'Škola s ovim nazivom ili OIB-om već postoji.');
        }
        return redirect()->back()->with('success', 'Promjene su uspješno spremljene.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param School $school
     * @return RedirectResponse
     */
    public function destroy(School $school): RedirectResponse
    {
        try {
            $school->delete();
        }catch (QueryException $e){
            return redirect()->back()->with('error', 'Školu nije moguće obrisati jer za nju postoje vezani podatci.');
        }
        return redirect()->route('admin.schools')->with('success', 'Škola je uspješno obrisana.');
    }
}
