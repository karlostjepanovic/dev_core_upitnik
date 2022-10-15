<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\SchoolClass;
use App\Models\Student;
use App\Models\StudentQuestionnaire;
use Illuminate\Http\Request;

class SetStudentQuestionnaireController extends Controller
{
    public function setStudentQuestionnaire(School $school, SchoolClass $schoolClass, Student $student, StudentQuestionnaire $studentQuestionnaire)
    {
        return redirect()->route('showResults', [
            'school' => $school->id,
            'schoolClass' => $schoolClass->id,
            'student' => $student->id,
            'studentQuestionnaire' => $studentQuestionnaire->id,
        ]);
    }
}
