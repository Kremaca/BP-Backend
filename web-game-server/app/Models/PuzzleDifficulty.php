<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PuzzleDifficulty extends Model
{
    protected $table = 'puzzle_difficulty';
    protected $fillable = ['name', 'gridSize'];
    public $timestamps = false;
}
