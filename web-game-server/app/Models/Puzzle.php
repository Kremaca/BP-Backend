<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Puzzle extends Model
{
    protected $table = 'puzzles';
    protected $fillable = ['flavorText', 'content', 'difficulty'];
    public $timestamps = false;
}
