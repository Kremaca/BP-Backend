<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PuzzleState extends Model
{
    protected $table = 'puzzle_state';
    protected $fillable = ['name'];
    public $timestamps = false;
}
