<?php

namespace App\Http\Controllers;

use App\Models\Questionnaire;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class QuestionnaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        return Inertia::render('Admin/Questionnaires/Index', [
            'questionnaires' => Questionnaire::orderBy('type')->orderBy('name')->with('items')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        return Inertia::render('Admin/Questionnaires/Create');
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
            'type'          => 'required',
            'target_group'  => 'required',
        ]);
        try {
            Questionnaire::create([
                'name' => $request->name,
                'type' => $request->type,
                'target_group' => $request->target_group,
            ]);
        }catch (QueryException $e){
            return redirect()->back()->with('error', 'Dogodila se greška.');
        }
        return redirect()->route('admin.questionnaires')->with('success', 'Novi upitnik je uspješno spremljen.');
    }

    /**
     * Display the specified resource.
     *
     * @param Questionnaire $questionnaire
     * @return Response
     */
    public function show(Questionnaire $questionnaire): Response
    {
        return Inertia::render('Admin/Questionnaires/Show', [
            'questionnaire' => $questionnaire
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Questionnaire $questionnaire
     * @return RedirectResponse
     */
    public function update(Request $request, Questionnaire $questionnaire): RedirectResponse
    {
        $request->validate([
            'name'          => 'required',
            'type'          => 'required',
            'target_group'  => 'required',
        ]);
        if (!$questionnaire->is_locked) {
            try {
                $questionnaire->update([
                    'name' => $request->name,
                    'type' => $request->type,
                    'target_group' => $request->target_group,
                ]);
            } catch (QueryException $e) {
                return redirect()->back()->with('error', 'Dogodila se greška.');
            }
            return redirect()->back()->with('success', 'Promjene su uspješno spremljene.');
        }
        return redirect()->back()->with('error', 'Dogodila se greška.');
    }

    public function lock(Questionnaire $questionnaire): RedirectResponse
    {
        if (!$questionnaire->is_locked){
            try {
                $questionnaire->update([
                    'is_locked' => true
                ]);
            } catch (QueryException $e) {
                return redirect()->back()->with('error', 'Dogodila se greška.');
            }
            return redirect()->route('admin.questionnaires')->with('success', 'Upitnik je uspješno zaključan.');
        }
        return redirect()->back()->with('error', 'Dogodila se greška.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Questionnaire $questionnaire
     * @return RedirectResponse
     */
    public function destroy(Questionnaire $questionnaire): RedirectResponse
    {
        if (!$questionnaire->is_locked) {
            try {
                $questionnaire->delete();
            } catch (QueryException $e) {
                return redirect()->back()->with('error', 'Dogodila se greška.');
            }
            return redirect()->route('admin.questionnaires')->with('success', 'Upitnik je uspješno obrisan.');
        }
        return redirect()->back()->with('error', 'Dogodila se greška.');
    }
}
