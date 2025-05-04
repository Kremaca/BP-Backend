<?php

namespace Database\Seeders;

use App\Models\Puzzle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class addPuzzles extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $puzzles = array();

        for($i = 0; $i < 24; $i++) {
            $rngShort = substr(md5(mt_rand()), 0, 5);
            $rngLong = substr(md5(mt_rand()), 0, 50);
            $puzzles[] = [$rngShort, $rngShort, $rngShort, $rngLong, $rngLong, (floor($i / 6) + 1), ($i % 6 == 0) ? 2 : 1, rand(1, 3)];
        }

        foreach ($puzzles as $puzzle) {
            Puzzle::insert([
                "puzzleID" => $puzzle[0],
                "name" => $puzzle[1],
                "image" => $puzzle[2],
                "flavorText" => $puzzle[3],
                "content" => $puzzle[4],
                "puzzleSeason" => $puzzle[5],
                "puzzleState" => $puzzle[6],
                "difficulty" => $puzzle[7]
            ]);
        }
    }
}
