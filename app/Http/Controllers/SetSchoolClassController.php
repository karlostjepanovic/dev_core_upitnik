<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\SchoolClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

class SetSchoolClassController extends Controller
{
    public function index(School $school): Response
    {
        return Inertia::render('Main/SetSchoolClass', [
            'school' => $school,
            'schoolClasses' => $school->getClasses()->get()->toArray()
        ]);
    }

    public function setClass(School $school, SchoolClass $schoolClass): \Illuminate\Http\RedirectResponse
    {
        return redirect()->route('setStudent', [
            'school' => $school->id,
            'schoolClass' => $schoolClass->id
        ]);
    }
}
