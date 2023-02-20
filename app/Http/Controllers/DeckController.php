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

class DeckController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $decks = Deck::where('user_id', Auth::id())->latest()->paginate(10);

        // Show the decks index, pass through our decks
        return view('decks.index')->with('decks', $decks);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('decks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255'
        ]);

        Deck::create([
            'uuid' => Str::uuid(),
            'user_id' => Auth::id(),
            'name' => $request->name
        ]);

        return to_route('decks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Deck $deck)
    {
        if($deck->user_id != Auth::id()){
            return abort(403);
        }

        $cards = DB::table('cards')->where('deck_id', $deck->deck_id)->latest()->paginate(10);

        return view('decks.show')->with('deck', $deck)->with('cards', $cards);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Deck $deck)
    {
        if($deck->user_id != Auth::id()){
            return abort(403);
        }

        return view('decks.edit')->with('deck', $deck);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Deck $deck)
    {

        if($deck->user_id != Auth::id()){
            return abort(403);
        }

        $request->validate([
            'name' => 'required|max:255'
        ]);

        $deck->name = $request->name;

        $deck->save();

        return to_route('decks.show', $deck);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Deck $deck)
    {
        if($deck->user_id != Auth::id()){
            return abort(403);
        }

        DB::table('cards')->where('deck_id', $deck->deck_id)->delete();
        DB::table('decks')->where('deck_id', $deck->deck_id)->delete();

        return to_route('decks.index');
    }
}
