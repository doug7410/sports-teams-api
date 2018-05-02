<?php

namespace App\Http\Controllers;

use App\Player;
use App\Team;
use Illuminate\Http\Request;

class PlayerController extends Controller
{

    public function store(Request $request)
    {
        return Player::create($request->input());
    }

    public function update(Request $request, Player $player)
    {
        $player->first_name = $request->input('first_name');
        $player->last_name = $request->input('last_name');
        $player->save();

        return $player;
    }
}
