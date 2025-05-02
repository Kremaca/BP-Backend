<?php

namespace Database\Seeders;

use App\Models\PuzzleHeader;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class addPuzzleHeaders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $puzzleHeaders = array();

        for($i = 0; $i < 24; $i++) {
            $random = substr(md5(mt_rand()), 0, 5);
            $puzzleHeaders[] = [$random, $random, $random, (floor($i / 6) + 1), ($i % 6 == 0) ? 2 : 1];
        }

        foreach ($puzzleHeaders as $puzzleHeader) {
            PuzzleHeader::insert([
                "puzzleID" => $puzzleHeader[0],
                "name" => $puzzleHeader[1],
                "image" => $puzzleHeader[2],
                "puzzleSeason" => $puzzleHeader[3],
                "puzzleState" => $puzzleHeader[4]
            ]);
        }
    }
}
