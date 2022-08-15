<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Questionnaire;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Questionnaire $questionnaire
     * @return Response
     */
    public function index(Questionnaire $questionnaire): Response
    {
        return Inertia::render('Admin/Questionnaires/Items/Index', [
            'questionnaire' => $questionnaire->load('items')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Questionnaire $questionnaire
     * @return Response
     */
    public function create(Questionnaire $questionnaire): Response
    {
        return Inertia::render('Admin/Questionnaires/Items/Create', [
            'questionnaire' => $questionnaire
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param Questionnaire $questionnaire
     * @return RedirectResponse
     */
    public function store(Request $request, Questionnaire $questionnaire)
    {
        $request->validate([
            'question'          => 'required',
            'dimension'         => 'required',
            'ascending_order'   => 'required|bool',
        ]);
        try {
            Item::create([
                'question' => $request->question,
                'dimension' => $request->dimension,
                'ascending_order' => $request->ascending_order,
                'questionnaire_id' => $questionnaire->id,
            ]);
        }catch (QueryException $e){
            return redirect()->back()->with('error', 'Dogodila se greška.');
        }
        return redirect()->route('admin.questionnaires.items', $questionnaire)->with('success', 'Nova čestica je uspješno spremljena.');
    }

    /**
     * Display the specified resource.
     *
     * @param Questionnaire $questionnaire
     * @param Item $item
     * @return Response
     */
    public function show(Questionnaire $questionnaire, Item $item): Response
    {
        return Inertia::render('Admin/Questionnaires/Items/Show', [
            'questionnaire' => $questionnaire,
            'item' => $item,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Questionnaire $questionnaire
     * @param Item $item
     * @return RedirectResponse
     */
    public function update(Request $request, Questionnaire $questionnaire, Item $item): RedirectResponse
    {
        $request->validate([
            'question'          => 'required',
            'dimension'         => 'required',
            'ascending_order'   => 'required|bool',
        ]);
        if($questionnaire->items->contains($item)){
            try {
                $item->update([
                    'question' => $request->question,
                    'dimension' => $request->dimension,
                    'ascending_order' => $request->ascending_order,
                ]);
            }catch (QueryException $e){
                return redirect()->back()->with('error', 'Dogodila se greška.');
            }
            return redirect()->back()->with('success', 'Promjene su uspješno spremljene.');
        }
        return redirect()->back()->with('error', 'Dogodila se greška.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Questionnaire $questionnaire
     * @param Item $item
     * @return RedirectResponse
     */
    public function destroy(Questionnaire $questionnaire, Item $item): RedirectResponse
    {
        if($questionnaire->items->contains($item)) {
            try {
                $item->delete();
            } catch (QueryException $e) {
                return redirect()->back()->with('error', 'Dogodila se greška.');
            }
            return redirect()->route('admin.questionnaires.items', $questionnaire)->with('success', 'Čestica je uspješno obrisana.');
        }
        return redirect()->back()->with('error', 'Dogodila se greška.');
    }
}
