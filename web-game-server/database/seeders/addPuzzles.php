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
            $random = substr(md5(mt_rand()), 0, 50);
            $puzzles[] = [$random, $random, rand(1, 3)];
        }

        foreach ($puzzles as $puzzle) {
            Puzzle::insert([
                "flavorText" => $puzzle[0],
                "content" => $puzzle[1],
                "difficulty" => $puzzle[2]
            ]);
        }
    }
}
