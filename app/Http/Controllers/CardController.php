<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Deck;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'front' => 'required|max:1024',
            'back' => 'required|max:1024'
        ]);

        Card::create([
            'uuid' => Str::uuid(),
            'user_id' => Auth::id(),
            'deck_id' => $request->deck_id,
            'front' => $request->front,
            'back' => $request->back
        ]);

        $deck = DB::table('decks')->where('deck_id', $request->deck_id)->first();
        
        return redirect()->route('decks.show', ['deck' => $deck->uuid]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Card $deck)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Card $card): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Card $card): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Deck $deck, Card $card)
    {
        if($card->user_id != Auth::id()){
            return abort(403);
        }

        DB::table('cards')->where('card_id', $card->card_id)->delete();
        
        return redirect()->route('decks.show', ['deck' => $deck->uuid]);
    }
}
