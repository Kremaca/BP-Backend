<?php

namespace Database\Seeders;

use App\Models\PuzzleDifficulty;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class addPuzzleDifficulty extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $difficulties = array();

        $diffNames = ["EASY", "MEDIUM", "HARD"];
        $diffNums = [12, 16, 20];

        for($i = 0; $i < 3; $i++) {
            $difficulties[] = [$diffNames[$i], $diffNums[$i]];
        }

        foreach($difficulties as $difficulty) {
            PuzzleDifficulty::insert([
                "name" => $difficulty[0],
                "gridSize" => $difficulty[1]
            ]);
        }
    }
}
