<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\SchoolClass;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class StudentController extends Controller
{
    public function create(School $school, SchoolClass $schoolClass)
    {
        return Inertia::render('Main/SchoolClass/Students/Create', [
            'school' => $school,
            'schoolClass' => $schoolClass,
        ]);
    }

    public function search(Request $request, School $school, SchoolClass $schoolClass)
    {
        $request->validate([
            'username' => 'required',
        ]);

        $user = User::where('username', $request->username)->first();
        if($user){
            try {
                Student::create([
                    'user_id' => $user->id,
                    'school_class_id' => $schoolClass->id,
                ]);
            }catch (QueryException $e){
                return redirect()->back()->with('error', 'Učenik već postoji u ovom razrednom odjelu.');
            }
        }else{
            return redirect()->back()->with('error', 'Učenik s ovim korisničkim imenom ne postoji.');
        }
        return redirect()->route('setStudent', [
            'school' => $school->id,
            'schoolClass' => $schoolClass->id
        ])->with('success', 'Učenik je uspješno spremljen.');
    }

    public function store(Request $request, School $school, SchoolClass $schoolClass)
    {
        $request->validate([
            'firstname'     => 'required',
            'lastname'      => 'required',
            'username'      => 'required',
            'oib'           => 'required|numeric|digits:11',
            'email'         => 'required|email'
        ]);
        DB::beginTransaction();
        try {
            $user = User::create([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'username' => $request->username,
                'password' => Hash::make("1234"),
                'oib' => $request->oib,
                'email' => $request->email
            ]);
        }catch (QueryException $e){
            DB::rollback();
            return redirect()->back()->with('error', 'Korisnik s ovim korisničkim imenom, adresom e-pošte ili OIB-om već postoji.');
        }
        try {
            Student::create([
                'user_id' => $user->id,
                'school_class_id' => $schoolClass->id,
            ]);
        }catch (QueryException $e){
            DB::rollback();
            return redirect()->back()->with('error', 'Učenik već postoji u ovom razrednom odjelu.');
        }
        DB::commit();
        return redirect()->route('setStudent', [
            'school' => $school->id,
            'schoolClass' => $schoolClass->id
        ])->with('success', 'Učenik je uspješno spremljen.');
    }

    public function showStudent(School $school, SchoolClass $schoolClass, Student $student)
    {
        return Inertia::render('Main/SchoolClass/Students/Show', [
            'school' => $school,
            'schoolClass' => $schoolClass,
            'student' => $student,
            'studentQuestionnaires' => $student->getUserData()->first()->myQuestionnaires()->get()
        ]);
    }
}
