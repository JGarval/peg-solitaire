<?php

namespace App\Http\Controllers;

use App\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\NotFoundHttpException;

class GameController extends Controller
{

    public function index() {
        $games = Game::all();

        if (!$games) {
            throw new NotFoundHttpException;
        }

        return response()->json([
            'games' => $games
        ], 200);
    }

    public function create() {}

    public function store(Request $request) {
        $game = new Game;

        $game->user_id = $request->input('user_id');
        $game->time = $request->input('time');
        $game->score = $request->input('score');
        $game->isFinished = $request->input('isFinished');
        $game->board = $request->input('board');

        if ($game->save()) {
            return response()->json([
                'game' => $game
            ], 200);
        } else {
            return response()->json([
                'message' => 'Game not found'
            ], 404);
        }
    }

    public function show($id) {
        $game = Game::find($id);

        if ($game) {
            return response()->json([
                'game' => $game
            ], 200);
        }
    }

    public function edit($id) {}

    public function update(Request $request, $id) {
        $game = Game::findOrFail($id);

        if (!$game) {
            throw new NotFoundHttpException;
        }

        if ($request->input('user_id') != null) {
            $game->user_id = $request->input('user_id');
        }

        if ($request->input('time') != null) {
            $game->time = $request->input('time');
        }

        if ($request->input('score') != null) {
            $game->score = $request->input('score');
        }

        if ($request->input('isFinished') != null) {
            $game->isFinished = $request->input('isFinished');
        }

        if ($request->input('board') != null) {
            $game->board = $request->input('board');
        }

        if ($game->save()) {
            return response()->json([
                'game' => $game
            ], 200);
        } else {
            return response()->json([
                'message' => 'Game not found'
            ], 400);
        }
    }

    public function destroy($id) {
        $game = Game::findOrFail($id);

        if (!$game) {
            throw new NotFoundHttpException;
        }

        if ($game->delete()) {
            return response()->json([
                'id' => $id
            ], 200);
        } else {
            return response()->json([
                'message' => 'Game not found',
            ], 400);
        }
    }

    public function play() {
        return view('game.play');
    }

    public function place() {
        return view('game.place');
    }

    public function score() {
        return view('game.score');
    }

    public function topScores() {
        $games = DB::select('SELECT user_id, time, score FROM `games` WHERE isFinished = 1 ORDER BY `score` DESC');
        if ($games) {
            return response()->json([
                'games' => $games,
                'message' => 'Top Scores'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Error'
            ], 400);
        }
    }

    public function myGames() {
        return view('game.my-games');
    }

}