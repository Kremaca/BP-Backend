<?php

namespace App\Http\Controllers;

use App\Models\Season;
use App\Models\Puzzle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServerController extends Controller
{
    public function getSeasons() {
        return response()->json(DB::select(
            "SELECT s.id, s.title, s.flavorText, COALESCE(p.solvedPuzzles, 0) AS 'solvedPuzzles' 
             FROM seasons AS s
             LEFT JOIN (
                SELECT puzzleSeason, COUNT(id) AS 'solvedPuzzles' 
                FROM puzzles
                WHERE puzzleState = 3
                GROUP BY puzzleSeason
             ) AS p ON s.id = p.puzzleSeason"
        ));
    }

    public function getSeasonName(Request $request) {
        return response()->json(Season::select('title')->where('id', $request->seasonID ?? 1)->get());
    }

    public function getSeasonPuzzles(Request $request) {
        return response()->json(Puzzle::select('puzzleID', 'name', 'image', 'puzzleState')->where('puzzleSeason', $request->seasonID)->get());
    }

    public function getPuzzleContent(Request $request) {
        return response()->json(DB::select(
            "SELECT p.puzzleID, p.name, p.puzzleState, p.puzzleSeason AS 'seasonID', p.flavorText, p.content, d.gridSize AS 'difficulty' 
             FROM puzzles AS p
             JOIN puzzle_difficulty AS d ON d.id = p.difficulty WHERE p.puzzleID = '" . $request->puzzleID . "'"
        ));
    }

    public function getConstellationCheck(Request $request) {
        $dbCoords = DB::select("SELECT coordCheck FROM puzzles WHERE puzzleID = '" . $request->puzzleID . "'")[0]->coordCheck;
        $correct = $request->coordCheck == $dbCoords;

        if ($correct) {
            $internalID = DB::select("SELECT id FROM puzzles WHERE puzzleID = '" . $request->puzzleID . "'")[0]->id;
            DB::statement("UPDATE puzzles SET puzzleState = 3 WHERE puzzleID = '" . $request->puzzleID . "'");

            if ($internalID % 6 != 0) DB::statement("UPDATE puzzles SET puzzleState = 2 WHERE id = " . ($internalID + 1));
        }
        return response()->json($correct);
    }

    public function getConstellationData(Request $request) {
        return response()->json(DB::select(
            "SELECT p.name, p.puzzleState, p.flavorText, p.content, p.constellationData AS 'constellation', d.gridSize AS 'difficulty' 
             FROM puzzles AS p
             JOIN puzzle_difficulty AS d ON d.id = p.difficulty WHERE p.puzzleID = '" . $request->puzzleID . "'"
        ));
    }
}
