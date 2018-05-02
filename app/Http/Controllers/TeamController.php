<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::with(['players' => function($query){
            $query->select(['first_name', 'last_name', 'team_id', 'id']);
        }])->get(['name', 'city', 'id']);

        return  response()->json($teams->toArray());
    }


    public function store(Request $request)
    {
        $team = Team::create($request->input());
        return response()->json($team->toArray());
    }

    public function show($id)
    {
        $team = Team::where(['id' => $id])->with(['players' => function($query) {
            $query->select(['first_name', 'last_name', 'team_id', 'id']);
        }])->get(['name', 'city', 'id']);

        return response()->json($team->toArray());
    }
}
