<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PuzzleHeader extends Model
{
    protected $table = 'puzzle_header';
    protected $fillable = ['puzzleID', 'name', 'image', 'puzzleState'];
    public $timestamps = false;
}
