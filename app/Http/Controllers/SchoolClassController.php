<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\SchoolClass;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Inertia\Inertia;

class SchoolClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Inertia\Response
     */
    public function create(School $school)
    {
        return Inertia::render('Main/SchoolClass/Create', [
            'school' => $school
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(School $school, Request $request)
    {
        $request->validate([
            'name'          => 'required',
        ]);
        try {
            SchoolClass::create([
                'name' => $request->name,
                'school_id' => $school->id,
            ]);
        }catch (QueryException $e){
            return redirect()->back()->with('error', 'Razredni odjel s ovim nazivom već postoji.');
        }
        return redirect()->route('setSchoolClass', $school->id)->with('success', 'Novi razredni odjel je uspješno spremljen.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Inertia\Response
     */
    public function show(School $school, SchoolClass $schoolClass)
    {
        return Inertia::render('Main/SchoolClass/Show', [
            'school' => $school,
            'schoolClass' => $schoolClass
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param School $school
     * @param SchoolClass $schoolClass
     * @return RedirectResponse
     */
    public function update(Request $request, School $school, SchoolClass $schoolClass)
    {
        $request->validate([
            'name'          => 'required',
        ]);
        try {
            $schoolClass->update([
                'name' => $request->name,
            ]);
        }catch (QueryException $e){
            return redirect()->back()->with('error', 'Razredni odjel s ovim nazivom već postoji.');
        }
        return redirect()->back()->with('success', 'Promjene su uspješno spremljene.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param SchoolClass $schoolClass
     * @return RedirectResponse
     */
    public function destroy(School $school, SchoolClass $schoolClass): RedirectResponse
    {
        try {
            $schoolClass->delete();
        }catch (QueryException $e){
            return redirect()->back()->with('error', 'Razredni odjel nije moguće obrisati jer za njega postoje vezani podatci.');
        }
        return redirect()->route('setSchoolClass', $school->id)->with('success', 'Razredni odjel je uspješno obrisan.');
    }
}
