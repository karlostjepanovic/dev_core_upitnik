<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\SchoolClass;
use App\Models\Student;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class SetStudentController extends Controller
{
    public function index(School $school, SchoolClass $schoolClass): Response
    {
        return Inertia::render('Main/SchoolClass/Students/SetStudent', [
            'school' => $school,
            'schoolClass' => $schoolClass,
            'students' => $schoolClass->getStudents()->with('myDoneQuestionnaires')->orderBy('lastname')->orderBy('firstname')->orderBy('username')->get()
        ]);
    }

    public function setStudent(School $school, SchoolClass $schoolClass, Student $student): \Illuminate\Http\RedirectResponse
    {
        return redirect()->route('student', [
            'school' => $school->id,
            'schoolClass' => $schoolClass->id,
            'student' => $student->id
        ]);
    }
}
