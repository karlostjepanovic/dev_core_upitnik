<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\StudentQuestionnaire;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnswerController extends Controller
{
    public function submit(Request $request, StudentQuestionnaire $studentQuestionnaire)
    {
        if(!$studentQuestionnaire->is_done){
            $request->validate([
                'answers'           => 'required|array',
                'answers.*.item.id' => 'required',
                'answers.*.value'   => 'required|integer|between:0,4',
            ]);
            DB::beginTransaction();
            try {
                foreach ((array)($request->answers) as $answer){
                    try {
                        // ovdje staviti da se računaju rezultati
                        Answer::create([
                            'student_questionnaire_id' => $studentQuestionnaire->id,
                            'item_id' => $answer['item']['id'],
                            'points' => $answer['value'],
                        ]);
                    }catch (QueryException $e){
                        return redirect()->back()->with('error', 'Dogodila se greška.');
                    }
                }
                try {
                    $studentQuestionnaire->update([
                        'is_done' => true,
                    ]);
                }catch (QueryException $e){
                    return redirect()->back()->with('error', 'Dogodila se greška.');
                }
            } catch(QueryException $e) {
                DB::rollback();
                return redirect()->route('myQuestionnaires')->with('error', 'Dogodila se greška.');
            }
            DB::commit();
            return redirect()->route('myQuestionnaires')->with('success', 'Odgovori su uspješno spremljeni.');
        }else{
            return redirect()->route('myQuestionnaires')->with('error', 'Dogodila se greška.');
        }
    }
}
