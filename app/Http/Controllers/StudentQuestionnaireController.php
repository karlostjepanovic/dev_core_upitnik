<?php

namespace App\Http\Controllers;

use App\Models\Questionnaire;
use App\Models\School;
use App\Models\SchoolClass;
use App\Models\Student;
use App\Models\StudentQuestionnaire;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Inertia\Inertia;

class StudentQuestionnaireController extends Controller
{
    public function index()
    {
        return Inertia::render('Main/Questionnaires/Index', [
            'questionnaires' => \Illuminate\Support\Facades\Auth::user()->myQuestionnaires()->where('is_done', false)->get()
        ]);
    }

    public function create(School $school, SchoolClass $schoolClass, Student $student)
    {
        return Inertia::render('Main/SchoolClass/Students/Questionnaires/Create', [
            'school' => $school,
            'schoolClass' => $schoolClass,
            'student' => $student,
            'questionnaires' => Questionnaire::where('is_locked', true)->orderBy('type')->orderBy('name')->with('items')->get()
        ]);
    }

    public function store(Request $request, School $school, SchoolClass $schoolClass, Student $student)
    {
        $request->validate([
            'questionnaire' => 'required',
        ]);

        $user = User::where('id', $request->student->user_id)->first();
        if($user){
            try {
                StudentQuestionnaire::create([
                    'user_id' => $user->id,
                    'questionnaire_id' => $request->questionnaire,
                ]);
            }catch (QueryException $e){
                return redirect()->back()->with('error', 'Dogodila se greška.');
            }
        }else{
            return redirect()->back()->with('error', 'Dogodila se greška.');
        }
        return redirect()->route('student', [
            'school' => $school->id,
            'schoolClass' => $schoolClass->id,
            'student' => $student->id,
        ])->with('success', 'Upitnik je uspješno dodan.');
    }

    public function setQuestionnaire(StudentQuestionnaire $studentQuestionnaire)
    {
        return redirect()->route('showQuestionnaire', [
            'studentQuestionnaire' => $studentQuestionnaire->id
        ]);
    }

    public function showQuestionnaire(StudentQuestionnaire $studentQuestionnaire)
    {
        return Inertia::render('Main/Questionnaires/Show', [
            'studentQuestionnaire' => $studentQuestionnaire
        ]);
    }

    public function getResults(School $school, SchoolClass $schoolClass, Student $student, StudentQuestionnaire $studentQuestionnaire)
    {
        $count = [
            'W' => 0,
            'P' => 0,
            'F' => 0,
            'R' => 0,
        ];

        $total = [
            'W' => 0,
            'P' => 0,
            'F' => 0,
            'R' => 0,
        ];

        $avg = [
            'W' => 0,
            'P' => 0,
            'F' => 0,
            'R' => 0,
        ];

        foreach($studentQuestionnaire->getAnswers->toArray() as $answer) {
            $index = $answer['item']['dimension'];
            $count[$index]++;
            $total[$index] += $answer['points'];
            if($count[$index]) {
                $avg[$index] = $total[$index]/$count[$index];
            }
        }

        $all_total = array_sum($total);
        $all_avg = $all_total/count($studentQuestionnaire->getAnswers->toArray());

        $all_without_R_total = $all_total - $total['R'];
        $all_without_R_avg = $all_without_R_total / (array_sum($count) - $count['R']);

        dd($count, $total, $avg, $all_total, $all_avg, $all_without_R_total, $all_without_R_avg);
    }

    public function showResults(School $school, SchoolClass $schoolClass, Student $student, StudentQuestionnaire $studentQuestionnaire)
    {
        return Inertia::render('Main/SchoolClass/Students/Questionnaires/Results', [
            'school' => $school,
            'schoolClass' => $schoolClass,
            'student' => $student,
            'studentQuestionnaire' => $studentQuestionnaire
        ]);
    }
}
