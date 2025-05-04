<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ServerController;

Route::get('/getSeasons', [ServerController::class, 'getSeasons'])->name('getSeasons');

Route::get('/getSeasonName', [ServerController::class, 'getSeasonName'])->name('getSeasonName');

Route::get('/getSeasonPuzzles', [ServerController::class, 'getSeasonPuzzles'])->name('getSeasonPuzzles');

Route::get('/getPuzzleContent', [ServerController::class, 'getPuzzleContent'])->name('getPuzzleContent');

Route::post('/getConstellationCheck', [ServerController::class, 'getConstellationCheck'])->name('getConstellationCheck');

Route::get('/getConstellationData', [ServerController::class, 'getConstellationData'])->name('getConstellationData');