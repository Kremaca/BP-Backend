<?php

namespace App\Http\Controllers;

use App\Models\Season;
use App\Models\PuzzleHeader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServerController extends Controller
{
    public function getSeasons() {
        return response()->json(DB::select(
            "SELECT s.id, s.title, s.flavorText, COALESCE(h.solvedPuzzles, 0) AS 'solvedPuzzles' 
             FROM seasons AS s
             LEFT JOIN (
                SELECT puzzleSeason, COUNT(id) AS 'solvedPuzzles' 
                FROM puzzle_header 
                WHERE puzzleState = 3
                GROUP BY puzzleSeason
             ) AS h ON s.id = h.puzzleSeason"
        ));
    }

    public function getSeasonName(Request $request) {
        return response()->json(Season::select('title')->where('id', $request->seasonID ?? 1)->get());
    }

    public function getSeasonPuzzles(Request $request) {
        return response()->json(PuzzleHeader::select('puzzleID', 'name', 'image', 'puzzleState')->where('puzzleSeason', $request->seasonID)->get());
    }

    public function getPuzzleContent(Request $request) {
        return response()->json(DB::select(
            "SELECT h.name, h.puzzleState, h.puzzleSeason AS 'seasonID', p.flavorText, p.content, d.gridSize AS 'difficulty' 
             FROM puzzle_header AS h
             JOIN puzzles AS p ON h.id = p.id
             JOIN puzzle_difficulty AS d ON d.id = p.difficulty WHERE h.puzzleID = '" . $request->puzzleID . "'"
        ));
    }
}
