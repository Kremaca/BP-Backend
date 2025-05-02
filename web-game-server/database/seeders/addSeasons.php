<?php

namespace Database\Seeders;

use App\Models\Season;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class addSeasons extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seasons = array();
        $titles = ["Jarní", "Letní", "Podzimní", "Zimní"];
        $flavorTexts = ["Nový cyklus přináší nové poznatky", "Čas ideální pro cestování", "Spadané listy je třeba sehrabat", "Vrstvy sněhu mnoho skrývají"];

        for($i = 0; $i < 4; $i++) {
            $seasons[] = [$titles[$i], $flavorTexts[$i]];
        }

        foreach ($seasons as $season) {
            Season::insert([
                "title" => $season[0],
                "flavorText" => $season[1]
            ]);
        }
    }
}
