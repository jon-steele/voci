<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Deck;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class StudyController extends Controller
{
        /**
     * 
     */
    public function prime(Deck $deck){
        
        if($deck->user_id != Auth::id()){
            return abort(403);
        }

        return view('study.prepare')->with('deck', $deck);
    }

    public function initialize(Deck $deck){
        
        if($deck->user_id != Auth::id()){
            return abort(403);
        }

        $cards = (DB::table('cards')->select('front', 'back')->where('deck_id', $deck->deck_id)->get())->toArray();
        shuffle($cards);

        session(['study_deck' => $cards]);
        session(['index' => count($cards) - 1]);
        session(['side' => 1]);

        return to_route('study.show', $deck);
    }

    public function show(Deck $deck){

        if($deck->user_id != Auth::id()){
            return abort(403);
        }

        $cards = session('study_deck');
        $index = session('index');

        $side = (session('side') == 0) ? 1 : 0;
        session(['side' => $side]);

        if (session('index') >= 0){
            return view('study.show')->with('cards', $cards)->with('index', $index)->with('deck', $deck);
        }
        else {
            return view('study.end')->with('deck', $deck);
        }
    }
}
