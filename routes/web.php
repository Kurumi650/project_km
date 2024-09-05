<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoertuigController;

// Hier zijn get route
Route::get('/', [VoertuigController::class, 'index']);
Route::get('/voertuig_toevogen', [VoertuigController::class, 'voertuig_toevogen']);
Route::get('/rit_toevogen', [VoertuigController::class, 'rit_toevogen']);


// Hier wordt post route 
Route::post('/rit_opslaan', [VoertuigController::class, 'rit_opslaan']);
Route::post('/voertuig_opslaan', [VoertuigController::class, 'voertuig_opslaan']);
