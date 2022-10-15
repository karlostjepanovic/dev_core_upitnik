<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class SetSchoolController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Main/SetSchool', [
            'schools' => \Illuminate\Support\Facades\Auth::user()->mySchools
        ]);
    }

    public function setSchool(School $school): \Illuminate\Http\RedirectResponse
    {
        return redirect()->route('setSchoolClass', $school->id);
    }
}
