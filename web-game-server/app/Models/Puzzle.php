<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Puzzle extends Model
{
    protected $table = 'puzzles';
    protected $fillable = ['puzzleID', 'name', 'image', 'flavorText', 'content', 'coordCheck', 'constellationData', 'puzzleSeason', 'puzzleState', 'difficulty'];
    public $timestamps = false;
}
