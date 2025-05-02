<?php

namespace Database\Seeders;

use App\Models\PuzzleState;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class addPuzzleStates extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $puzzleStates = ["LOCKED", "UNLOCKED", "SOLVED"];

        foreach($puzzleStates as $puzzleState) {
            PuzzleState::insert([
                "name" => $puzzleState
            ]);
        }
    }
}
