<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;

class PlayersController extends Controller
{
    public function show($id){

        $player = Player::find($id);
        $team = Team::find($player->id);

        return view('teams.player', compact('team', 'player'));
    }
}
